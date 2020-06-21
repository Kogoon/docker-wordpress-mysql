from flask import jsonify, request
from flask_restplus import Namespace, Resource, fields
from flask_jwt_extended import (
        jwt_required, create_access_token,
        jwt_refresh_token_required, create_refresh_token,
        get_jwt_identity, set_access_cookies,
        set_refresh_cookies, unset_jwt_cookies
)
from .user_controller import resource_user
#from .user_controller import add_user
from usertable import UserTable
from wp import *


api = Namespace('Auth', description="APIs for Auth")

resource_auth = api.model('Auth', {
    'user_login': fields.String(description='The User ID for SignIn(login)', required=True),
    'user_pass': fields.String(description='Password of user_login', required=True)
    })


uaParser = api.parser()
uaParser.add_argument('user_pass', type=str, help='user password', location='query')

luParser = api.parser()
luParser.add_argument('page', type=int, help='Page number', location='query')
luParser.add_argument('itemsInPage', type=int, help='Number of Items in a page', location='query')


#
@api.route('/users')
class Users(Resource):

    @api.expect(luParser)
    @api.expect(resource_auth)
    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    def get(self):
        ''' admin 계정으로 사용자 정보를 리스트로 보여주며 페이지 기능을 제공한다. '''
        return list_users()


#
@api.route('/signin/<user_login>')
class Signin(Resource):

    @api.expect(uaParser)
    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    def get(self, user_login):
        ''' 사용자 인증정보를 인증한다. '''
        db = UserTable()
        userpass = request.args.get('user_pass')
        db.auth(user_login, user_pass)
        return get_auth(user_login, user_pass)

    @api.expect(resource_auth)
    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    def post(self, user_login):
        ''' 사용자 인증정보를 인증한다. '''
        db = UserTable()
        j = request.get_json()
        return get_auth(user_login, j.get('user_pass'))


#
@api.route('/user/<user_login>')
@api.doc(params={'user_login':'This is a userID for signIn(login'})
class User(Resource):

    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    def get(self, user_login):
        pass

    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    def put(self, user_login):
        pass

    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    def delete(self, user_login):
        pass


#
def list_users():

    page = int(request.args.get('page', "0"))
    np   = int(request.args.get('itemsInPage', "20"))

    db = UserTable()
    res = db.list(page=page, itemsInPage=np)

    result = {
            "users" : "{}".format(res),
            "count" : len(res),
            "page"  : page
        }

    return result
#
def get_user(user_login):

    cache = UserCache()
    result = cache.get_user(user_login)

    if result is not None:
        result = ast.literal_eval(result.decode('utf-8', 'ignore'))
    else:
        db = UserTable()
        result = db.get(user_login)
        cache.set_user(user_login, str(result))

    result['token'] = get_raw_jwt()

    return result


#
def update_user(user_login):

    j = request.get_json()
    db = UserTable()
    result = db.update(user_login, j)
    result = {"message":"ok"} if result is None else result

    return result


#
def delete_user(user_login):

    db = UserTable()
    result = db.delete(user_login)
    result = {"message":"ok"} if result is None else result

    return result


#
def get_auth(user_login, user_pass):

    db = UserTable()
    result = db.auth(user_login, user_pass)

    # Create tokens
    access_token = create_access_token(identity=user_login)
    refresh_token = create_refresh_token(identity=user_login)

    # Set the JWT
    resp = jsonify({'login': result})
    set_access_cookies(resp, access_token)
    set_refresh_cookies(resp, refresh_token)

    return resp


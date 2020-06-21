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

update_user = api.model('Update', {
    'user_nicename': fields.String(description='user_nicename', required=False),
    'user_email'   : fields.String(description='user_email', required=False),
    'display_name' : fields.String(description='dsplay_name', required=False)
    })


uaParser = api.parser()
uaParser.add_argument('user_pass', type=str, help='user password', location='query')

luParser = api.parser()
luParser.add_argument('page', type=int, help='Page number', location='query')
luParser.add_argument('itemsInPage', type=int, help='Number of Items in a page', location='query')

#PaParser = api.parser()
#PaParser.add_argument('password', type=str, help='Password', location='query')

#
@api.route('/users')
class Users(Resource):

    @api.expect(luParser)
    @api.expect(resource_auth)
    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    def get(self):
        ''' 사용자 정보를 리스트로 보여주며 페이지 기능을 제공한다. '''
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
        user_pass = request.args.get('user_pass')
        result = db.get_auth(user_login, user_pass)
        if result:
            return get_user(user_login)
        else:
            return "Please make sure the user name and password are correct"

"""
    @api.expect(resource_auth)
    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    def post(self, user_login):
        ''' 사용자 인증정보를 인증한다. '''
        db = UserTable()
        j = request.get_json()
        return get_auth(user_login, j.get('user_pass'))
"""


#
@api.route('/user/<user_login>')
@api.doc(params={'user_login':'This is a userID for signIn(login)'})
@api.doc(params={'user_pass' :'User Password for signIn(login)'})
class User(Resource):
    
    @api.expect(uaParser)
    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    def get(self, user_login):
        ''' 사용자 상세내역을 조회한다.  '''
        db = UserTable()
        user_pass = request.args.get('user_pass')
        if db.get_auth(user_login, user_pass):
            return get_user(user_login)
        else:
            return "No Permission"

    @api.expect(update_user)
    @api.expect(uaParser)
    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    def put(self, user_login):
        ''' 사용자 정보를 수정한다.  '''
        db = UserTable()
        user_pass = request.args.get('user_pass')
        if db.get_auth(user_login, user_pass):
            return update_user(user_login)
        else:
            return "No Permission"

    @api.expect(uaParser)
    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    def delete(self, user_login):
        ''' 사용자 정보를 삭제한다  '''
        db = UserTable()
        user_pass = request.args.get('user_pass')
        if db.get_auth(user_login, user_pass):
            return delete_user(user_login)
        else:
            return "No Permission"


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

    db = UserTable()
    result = db.get(user_login)

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


"""
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
"""

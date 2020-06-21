from flask import jsonify, request
from flask_restplus import Namespace, Resource, fields
from flask_jwt_extended import (
        jwt_required, create_access_token,
        jwt_refresh_token_required, create_refresh_token,
        get_jwt_identity, set_access_cookies,
        set_refresh_cookies, unset_jwt_cookies
)
from .user_controller import resource_user
from .user_controller import add_user
from usertable import UserTable
from wp import *


api = Namespace('Auth', description="APIs for Auth")

resource_auth = api.model('Auth', {
    'user_login': fields.String(description='The User ID for SignIn(login)', required=True),
    'user_pass': fields.String(description='Password of user_login', required=True)
    })


uaParser = api.parser()
uaParser.add_argument('user_pass', type=str, help='user password', location='query')


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


@api.route('/signup')
class Signup(Resource):

    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    def post(self):
        ''' 사용자 인증정보를 등록한다. '''
        return add_user()


"""
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

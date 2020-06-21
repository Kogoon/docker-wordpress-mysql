from flask import jsonify
from flask import request
from flask_restplus import Namespace, Resource, fields
from flask_jwt_extended import (
    jwt_required, create_access_token,
    jwt_refresh_token_required, create_refresh_token,
    get_jwt_identity, set_access_cookies, get_raw_jwt,
    set_refresh_cookies, unset_jwt_cookies
)
from usertable import UserTable
import ast


api = Namespace('User', description="APIs for Users")

resource_user = api.model('User', {
    #'id': fields.Integer(description='wp_users user id auto_increment'),
    'user_login': fields.String(description='The user_login for signin', required=True),
    'user_pass': fields.String(description='The user_pass for signin', required=True),
    'user_nicename': fields.String(description='The user\'s nickname', required=True),
    'user_email': fields.String(description='The user\'s email', required=True),
    #'user_url': fields.String(description='The url setting by user', required=False),
    #'user_registered': fields.String(description='The registered time yyyy-mm-dd hh-mm-ss', required=False),
    'display_name': fields.String(description='The user visible display name', required=True)
    })


#
#
@api.route('/signup')
class Signup(Resource):

    @api.expect(resource_user, validate=False)
    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    def post(self):
        ''' 사용자를 등록한다. '''
        return add_user()


#
#
def add_user():
    
    j = request.get_json()

    print("DEBUG> input ===>{}".format(j))

    db = UserTable()
    result = db.insert(j)
    result = {"message":"ok"} if result is None else result

    return result

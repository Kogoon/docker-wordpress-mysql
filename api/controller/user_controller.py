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
from user_cache import UserCache
import ast


api = Namespace('User', description="APIs for Users")

resource_user = api.model('User', {
    'id': fields.Integer(description='wp_users user id auto_increment'),
    'user_login': fields.String(description='The user_login for signin', required=True),
    'user_pass': fields.String(description='The user_pass for signin', required=True),
    'user_nicename': fields.String(description='The user\'s nickname', required=True),
    'user_email': fields.String(description='The user\'s email', required=True),
    'user_url': fields.String(description='The url setting by user', required=False),
    'user_registered': fields.String(description='The registered time yyyy-mm-dd hh-mm-ss', required=False),
    'display_name': fields.String(description='The user visible display name', required=True)
    })

luParser = api.parser()
luParser.add_argument('page', type=int, help='page number', location='query')
luParser.add_argument('itemsInPage', type=int, help='Number of Items in a page', location='query')


#
#
#
@api.route('/users')
class Users(Resource):

    @api.expect(luParser)
    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    def get(self):
        ''' 사용자 정보를 리스트로 보여주며 페이지 기능을 제공한다.  '''
        return list_users()



#
#
#
@api.route('/user/<user_login>')
@api.doc(params={'id':'This is a userID.'})
class User(Resource):

    @jwt_required
    @api.response(200, 'Success')
    def get(self, user_login):
        ''' comment'''
        pass

    @jwt_required
    @api.response(200, 'Success')
    @api.expect(resource_user, validate=False)
    def put(self, user_login):
        ''' comment '''
        pass

    @jwt_required
    @api.response(200, 'Success')
    def delete(self, user_login):
        ''' comment '''
        pass


#
#
def add_user():
    
    j = request.get_json()

    print("DEBUG> input ===>{}".format(j))

    db = UserTable()
    result = db.insert(j)
    result = {"message":"ok"} if result is None else result

    response = app.response_class(
            response=json.dumps(result),
            status=200,
            mimetype='application/json'
    )

    return response


#
#LIST 예제
#@app.route('/users', methods=['GET'])
def list_users():
    page = int(request.args.get('page', "0"))
    np = int(request.args.get('itemsInPage', "20"))

    db = UserTable()
    res = db.list(page=page, itemsInPage=np)

    result = {
            "users" : "{}".format(res),
            "count" : len(res),
            "page"  : page
    }

    return result

# Get user from user by ID example
def get_user(id):

    cache = UserCache()
    result = cache.get_user(id)

    if result is not None:
        result = ast.literal_eval(result.decode('utf-8','ignore'))
    else:
        db = UserTable()
        result = db.get(id)
        cache.set_user(id, str(result))
        
    result['token'] = get_raw_jwt()
    
    return result


def update_user(id):

    j = request.get_json()
    db = UserTable()
    result = db.update(id, j)
    result = {"message":"ok"} if result is None else result

    response = app.response_class(
            response=json.dumps(result),
            status=200,
            mimetype='application/json'
    )
    return response


def delete_user(id):

    db = UserTable()
    result = db.delete(id)
    result = {"message":"ok"} if result is None else result

    response = app.response_class(
            response=json.dumps(result),
            status = 200,
            mimetype='application/json'
    )

    return response

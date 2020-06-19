from flask import jsonify
from flask_restplus import Namespace, Resource, fields
from flask import request
from usertable import UserTable
from flask_jwt_extended import (
    jwt_required, create_access_token,
    jwt_refresh_token_required, create_refresh_token,
    get_jwt_identity, set_access_cookies, get_raw_jwt,
    set_refresh_cookies, unset_jwt_cookies
)


api = Namespace('User', description="APIs About Users")

resource_user = api.model('User', {

    })

luParser = api.parser()
luParser.add_argument('page', type=int, help='page number', location='query')
loParser.add_argument('itemsInPage', type=int, help='Number of Items in a page', location='query')


#
#
#
@api.route('/users')
class Users(Resource):

    @api.expect(luParser)
    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    def get(self):
        ''' comment '''
        pass


#
#
#
@api.route('/user')
class UserAdd(Resource):

    @api.expect(resource_user, validate=False)
    @api.response(200, 'Success')
    def post(self):
        pass


#
#
#
@api.route('/user/<id>')
@api.doc(params={'id':'This is a userID.'})
class User(Resource):

    @jwt_required
    @api.response(200, 'Success')
    def get(self, id):
        ''' comment'''
        pass

    @jwt_required
    @api.response(200, 'Success')
    @api.expect(resource_user, validate=False)
    def put(self, id):
        ''' comment '''
        pass

    @jwt_required
    @api.response(200, 'Success')
    def delete(self, id):
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

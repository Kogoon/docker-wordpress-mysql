from flask import jsonify
from flask import request
from flask_restplus import Namespace, Resource, fields
from randomtable import RandomTable


api = Namespace('Random', description='APIs for random algorithms')

resource_random = api.model('Random', {
    #'id': fields.Integer(description='id is ID'),
    'random': fields.Integer(description='random number here', required=True)
    })

luParser = api.parser()
luParser.add_argument('page', type=int, help='page number', location='query')
luParser.add_argument('itemsInPage', type=int, help='Number of Items in a page', location='query')


# paging wp_random table data 
@api.route('/randoms')
class Randoms(Resource):

   @api.expect(luParser)
   @api.response(200, 'Success')
   @api.response(400, 'Validation Error')
   def get(self):
       ''' wp_random 테이블의 정보를 리스트로 보여주며 페이지기능을 제공한다.  '''
       return list_randoms()


# Post Random data ( Create random )
@api.route('/random')
class randomAdd(Resource):

    @api.expect(resource_random, validate=False)
    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    def post(self):
        ''' random 정보를 등록한다. '''
        return add_random()


# Managing random data ( lookup, update, delete )
@api.route('/random/<id>')
@api.doc(params={'id':'This is a randomID'})
class Random(Resource):

    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    def get(self, id):
        ''' random 정보의 내역을 조회한다. '''
        return get_random(id)

    @api.expect(resource_random, validate=False)
    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    def put(self, id):
        ''' random 정보를 변경한다. '''
        return update_random(id)

    @api.response(200, 'Success')
    @api.response(400, 'Validation Error')
    def delete(self, id):
        ''' random 정보를 삭제한다. '''
        return delete_random(id)


# INSERT
def add_random():
    
    j = request.get_json()

    print("DEBUG > input ===> {}".format(j))

    db = RandomTable()
    result = db.insert(j)
    result = {"message":"ok"} if result is None else result
    
    return result


# LIST
def list_randoms():
    
    page = int(request.args.get('page', "0"))
    np   = int(request.args.get('itemsInPage', "20"))

    db = RandomTable()
    res = db.list(page=page, itemsInPage=np)

    result = {
            "randoms" : "{}".format(res),
            "count"   : len(res),
            "page"    : page
        }
    print("DEBUG > {}".format(result))

    return result


# GET
def get_random(id):
    
    db = RandomTable()
    result = db.get(id)

    return result


# UPDATE
def update_random(id):
    
    j  = request.get_json()
    db = RandomTable()

    result = db.update(id, j)
    result = {"message":"ok"} if result is None else result

    return result


# DELETE
def delete_random(id):
    
    db = RandomTable()
    result = db.delete(id)
    result = {"message":"ok"} if result is None else result

    return result


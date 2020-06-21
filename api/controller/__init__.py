from flask import Blueprint
from flask_restplus import Api

from .user_controller import api as ns1
from .auth_controller import api as ns2
from .random_controller import api as ns3


blueprint =  Blueprint('api', __name__, url_prefix='')
api = Api(blueprint,
        title='CCIT2 Final Exam - Gordon(tuxxon) Ahn',
        version='0.1',
        description='API, SWAGGER for Final Exam \
                \n 91514634 고준성',
        doc='/api/doc/'
)

api.add_namespace(ns1, path='/api')
api.add_namespace(ns2, path='/api')
api.add_namespace(ns3, path='/api')

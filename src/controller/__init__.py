from flask import Blueprint
from flask_restplus import Api

from user_controller import api as ns1

blueprint =  Blueprint('api', __name__, url_prefix='')
api = Api(blueprint,
        title='CCIT2 Final Exam - tuxxon Ahn',
        version'0.1',
        description='APIs for Final Exam',
        doc='/api/doc/'
)

api.add_namespace(ns1, path'/api/v1')

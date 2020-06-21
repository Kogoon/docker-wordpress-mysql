from controller import blueprint as api
from flask import Flask
from flask_jwt_extended import JWTManager


app = Flask(__name__)
app.register_blueprint(api)


# for JWT
app.config['JWT_SECRET_KEY'] = 'jwt-secret-string'
app.config['JWT_TOKEN_LOCATION'] = ['cookies']
app.config['JWT_SCRF_CHECK_FORM'] = True


if __name__ == "__main__":
    app.run(host="0.0.0.0", debug=True)

FROM ubuntu:18.04

MAINTAINER Kogoon <gojs712@gmail.com>

# 필요한 S/W 설치
RUN apt update -y
RUN apt install -y python3-pip python-dev
RUN apt install -y mysql-client
RUN apt install -y libffi-dev

# Setup Workdirectory
COPY . /api
WORKDIR /api

# /app to Python
ENV PYTHONPATH=/api
ENV TZ=Asia/Seoul

EXPOSE 5000

# install Flask and pymysql ( for mysql in flask)
RUN pip3 install flask flask_restplus pymysql requests Werkzeug==0.16.1 \
        cffi cryptography Flask-Bcrypt flask_jwt_extended redis pytz

ENTRYPOINT ["python3"]

# Start with main.py
CMD ["main.py"]

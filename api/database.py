import pymysql
import os


#
# 기말 과제를 위한.
# Database 클래스. 
#
class Database():

    # db연동. db 생성자. 
    # 각 내용들은 python의 os.getenv를 이용해서 환경변수를 이용하여 사용.
    def __init__(self):
        self.db= pymysql.connect(
                host=os.getenv('PYTHON_DB_HOST'),
                user=os.getenv('PYTHON_DB_USER'),
                password=os.getenv('PYTHON_DB_PASSWORD'),
                db=os.getenv('PYTHON_DB_DATABASE'),
                charset='utf8'
                )
        self.cursor = self.db.cursor(pymysql.cursors.DictCursor)

    # db와의 연결을 종료. 소멸자
    def __del__(self):
        self.db.close()
        self.cursor.close()
    
    # 쿼리 
    def execute(self, query, args={}):
        self.cursor.execute(query, args)
    
    # 하나의 row쿼리를 가져오기 위한. 
    def executeOne(self, query, args={}):
        self.cursor.execute(query, args)
        row = self.cursor.fetchone()
        return row
    
    # 다수의 row쿼리를 가져오기 위한.
    def executeAll(self, query, args={}):
        self.cursor.execute(query, args)
        row = self.cursor.fetchall()
        return row
    
    # 변경한 내용 커밋을 위한.
    def commit(self):
        self.db.commit()

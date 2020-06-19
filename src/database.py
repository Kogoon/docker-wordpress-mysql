import pymysql
import os

#
# 
#
class Database():

    #
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

    #
    def __del__(self):
        self.db.close()
        self.cursor.close()
    
    #
    def execute(self, query, args={}):
        self.cursor.execute(query, args)
    
    #
    def executeOne(self, query, args={}):
        self.cursor.execute(query, args)
        row = self.cursor.fetchone()
        return row
    
    #
    def executeAll(self, query, args={}):
        self.cursor.execute(query, args)
        row = self.cursor.fetchall()
        return row
    
    #
    def commit(self):
        self.db.commit()

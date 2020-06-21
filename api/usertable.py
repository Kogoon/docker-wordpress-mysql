from database import Database
from datetime import datetime
import bcrypt
import json
import pytz
import time
import utils
import wp


#
#
#
class UserTable(Database):
    
    #
    def get(self, user_login):
        
        sql =  "SELECT ID, user_login, user_pass, "
        sql += "user_nicename, user_email, display_name FROM wp_users "
        sql += "WHERE user_login={};".format(user_login)

        print("DEBUG SQL ===> {}".format(sql))
        
        result = ()
        try:
            self.cursor.execute(sql)
            result = self.cursor.fetchall()
        except Exception as e:
            return {"error":"{}".format(e)}
        
        result = {} if len(result) == 0 else result[0]

        return result

    
    """
    #
    def get_passwd(self, user_login):
        
        sql  = "SELECT user_pass from wp_users "
        sql += "WHERE user_login='{}';".format(user_login)
        print("DEBUG SQL ===> {}".format(sql))
        
        result = ()
        try:
            self.cursor.execute(sql)
            result = self.cursor.fetchone()
        except Exception as e:
            return {"error" : "{}".format(e)}

        result = {} if len(result) == 0 else result[0]

        return result
    """

    #
    def hashPasswd(self, passwd):
        
        salt   = bcrypt.gensalt()
        hashed = wp.crypt_private(passwd.encode('utf-8'), salt)
        print(hashed)
        return hashed


    #
    def get_auth(self, user_login, passwd):
        
        sql  = "SELECT user_pass "
        sql += "FROM wp_users WHERE user_login=\'{}\';".format(user_login)
        print("DEBUG SQL ===> {}".format(sql))
        
        result = False
        try:
            onerow = self.executeOne(sql)
            print("DEBUG row = {}".format(onerow))
            result = wp.check(passwd, onerow)
            return result
        except Exception as e:
            return {"error" : "{}".format(e)}

        return result

        
    #
    def list(self, page=0, itemsInPage=20):
        
        page = page * itemsInPage # 얼마나 많은 데이터를 볼 것인가. 한 page에.
        # 많은 정보를 보게 되니 비슷한 값은 줄여서 표시
        sql =  "SELECT ID, user_login, user_pass, user_email, user_registered, display_name "
        sql += "FROM wp_users "
        sql += "LIMIT {p}, {IIP}".format(p=page, IIP=itemsInPage)

        print("DEBUG SQL ===> {}".format(sql))

        self.cursor.execute(sql)
        result = self.cursor.fetchall()

        return result

    #
    def insert(self, j):

        KST = pytz.timezone('Asia/Seoul')
        set_time = datetime.now(KST)
        fmt = '%Y-%m-%d %H:%M:%S'

        sql = "INSERT INTO wp_users(user_login, user_pass, user_nicename, user_email, user_registered, display_name) "
        sql = sql + "values('{user_login}','{user_pass}','{user_nicename}','{user_email}','{user_registered}','{display_name}');".format(
            user_login = utils.addslashes(j.get("user_login","")),
            user_pass = self.hashPasswd(j.get("user_pass","")),
            user_nicename = utils.addslashes(j.get("user_nicename","")),
            user_email = utils.addslashes(j.get("user_email","")),
            user_registered = set_time.strftime(fmt),
            display_name = utils.addslashes(j.get("display_name",""))
            )

        print("DEBUG SQL ===>{}".format(sql))
        result = None
        try:
            self.cursor.execute(sql)
            self.db.commit()
        except Exception as e:
            result = {"error" : "{}".format(e)}

        return result


    #
    def update(self, user_login, j):

        user_nicename = j.get("user_nicename","")
        user_email = j.get("user_email","")
        display_name = j.get("display_name","")

        sql = "UPDATE wp_users SET "
        if len(user_nicename) > 0:
            sql += " user_nicename = '{}', ".format(user_nicename)
        if len(user_email) > 0:
            sql += " user_email = '{}', ".format(user_email)
        if len(display_name) > 0:
            sql += " display_name = '{}'".format(display_name)

        sql += " WHERE user_login = {};".format(user_login)

        print("DEBUG SQL ===>{}".format(sql))        

        result = None
        try:
            self.cursor.execute(sql)
            self.db.commit()
        except Exception as e:
            result = {"error" : "{}".format(e)}

        return result

    #
    #
    def delete(self, user_login):
        
        sql =  "DELETE FROM wp_users "
        sql += "WHERE user_login='{}'".format(user_login)

        print("DEBUG SQL ===> {}".format(sql))
        
        result = None
        try:
            self.cursor.execute(sql)
            self.db.commit()
        except Exception as e:
            result = {"error":"{}".format(e)}

        return result




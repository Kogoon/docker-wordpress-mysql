from database import Database
import json
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
        except:
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
    def get_auth(self, user_login, passwd):
        
        sql  = "SELECT user_pass "
        sql += "FROM wp_users WHERE user_login='{}';".format(user_login)
        print("DEBUG SQL ===> {}".format(sql))
        
        result = False
        try:
            onerow = self.executeOne(sql)
            print("DEBUG row = {}".format(onerow))
            result = wp.check(passwd,onerow)
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
        pass

    #
    def update(self, user_login, j):
        pass

    #
    #
    def delete(self, user_login):
        
        sql =  "DELETE FROM wp_users "
        sql += "WHERE user_login='{}'".format(id)

        print("DEBUG SQL ===> {}".format(sql))
        
        result = None
        try:
            self.cursor.execute(sql)
            self.db.commit()
        except Exception as e:
            result = {"error":"{}".format(e)}

        return result




from database import Database
import json
import utils


#
# For RandomTable
# 
#
class RandomTable(Database):

    # For Get data by ID
    def get(self, id):
    
        sql = "SELECT * FROM wp_random "
        sql += "WHERE id={};".format(id)
        print("DEBUG SQL ==> {}".format(sql))

        result = ()
        try:
            self.cursor.execute(sql)
            result = self.cursor.fetchall()
        except Exception as e:
            return {"error" : "{}".format(e)}

        result = {} if len(result) == 0 else result[0]

        return result


    # For Get All Data
    def list(self, page=0, itemsInPage=20):
        
        page = page * itemsInPage
        sql =  "SELECT id, random FROM wp_random "
        sql += "LIMIT {p}, {item};".format(p=page, item=itemsInPage)
        print("DEBUG SQL ===> {}".format(sql))
        
        self.cursor.execute(sql)
        result = self.cursor.fetchall(sql))

        return result


    # For Insert
    def insert(self, j):
        
        sql =  "INSERT INTO wp_random(id, random) "
        sql += "values('{id}', '{random}')".format(
                id=utils.addslashed(json.dumps(j.get("id", ""))),
                random=utils.addslashed(json.dumps(jget("random", "")))
            )
        print("DEBUG SQL ===> {}".format(sql))
        
        result = None
        try:
            self.cursor.execute(sql)
            self.db.commit()
        except Exception as e:
            result = {"error" : "{}".format(e)}
        
        return result


    # For Update
    def update(self, id, j):
        
        u_random = j.get("random", "")

        sql =  "UPDATE wp_random SET "
        if len(u_random) > 0:
            sql += "random = '{}' ".format(u_random)
        else:
            return "error"
        sql += "WHERE id = {}".format(id)
        print("DEBUG SQL ===> {}".format(sql))

        result = None
        try:
            self.cursor.execute(sql)
            self.db.commit()
        except Exception as e:
            result = {"error" : "{}".format(e)}

        return result


    # For Delete
    def delete(self, id):
        
        sql = "DELETE FROM wp_random "
        sql += "WHERE id='{}'".format(id)
        

        print("DEBUG SQL ==> {}".format(sql))
        result = None
        try:
            self.cursor.execute(sql)
            self.db.commit()
        except Exception as e:
            retult = {"error" : "{}".format(e)}

        return result


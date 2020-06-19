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
            pass

        result = {} if len(result) == 0 else result[0]

        return result


    # For Get All Data
    def list(self, page=0, itemsInPage=20):
        pass

    # For Insert
    def insert(self, j):
        pass

    # For Update
    def update(self, j):
        pass

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


# db query 진행 시 문자열 안에 '와 ''와 같은 문자가 들어 있을때
# 문제를 야기 할 수 있다. 이를 구분해주기 위한 함수이다.
def addslashes(s):

    l = ["\\", '"', "'", "\0", ]
    for i in l:
        if i in s:
            s = s.replace(i, '\\' + i)
    return s

# 이는 수업시간에 사용했던 함수 가져왔다. 

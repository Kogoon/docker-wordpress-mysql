"""
INPUT : N(int) (0 < r <= N)
OUTPUT : list -> Ascending
"""
import random
import sys
import time
input = sys.stdin.readline


# generate random N number less than N
def gen_random(N):

    gen_list = []
    for _ in range(N):
        temp = random.randrange(1, N+1)
        gen_list.append(temp)
    return gen_list


# sorted algorithm.
def sorted_random(A):

    MAX_NUM = 1000
    N = len(A)
    count = [0] * (MAX_NUM+1) #초기화
    countSum = [0] * (MAX_NUM+1)

    for i in range(0, N):
        count[A[i]] += 1

    countSum[0] = count[0]
    for i in range(1, MAX_NUM+1):
        countSum[i] = countSum[i-1] + count[i]

    B = [0] * (N+1)

    for i in range(N-1, -1, -1):
        B[countSum[A[i]]] = A[i]
        countSum[A[i]] -= 1

    result = ""
    for i in range(1, N+1):
        result += str(B[i]) + " "
    
    return result


if __name__=="__main__":

    N = int(input())
    random_gen = gen_random(N)
    print(random_gen)
    print(sorted_random(random_gen))

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


def countingSort(list_of_random, digit):

    n = len(list_of_random)
    output = [0] * (n)
    count = [0] * (10)
    
    for i in range(0, n):
        index = int(list_of_random[i]/digit) 
        count[ (index)%10 ] += 1
  
    for i in range(1,10):
        count[i] += count[i-1]  
        #print(i, count[i])

    i = n - 1
    while i >= 0:
        index = int(list_of_random[i]/digit)
        output[ count[ (index)%10 ] - 1] = list_of_random[i]
        count[ (index)%10 ] -= 1
        i -= 1
 
    for i in range(0,len(list_of_random)): 
        list_of_random[i] = output[i]

# sorted algorithm.
def sort_random(list_of_random):

    maxValue = max(list_of_random)   
    digit = 1
    while int(maxValue/digit) > 0: 
        countingSort(list_of_random, digit)
        digit *= 10


"""
if __name__=="__main__":

    N = int(input())
    random_gen = gen_random(N)
    print(random_gen)
    start = time.time()
    sort_random(random_gen)
    end = time.time()
    for i in range(len(random_gen)):
        print(random_gen[i],end=" ")
    print(end-start)
"""

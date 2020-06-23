"""
INPUT  > N(int) ( 0 < r <= N)
OUTPUT > gen_list, sorted(Ascending)_list
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
def sorted_random(sorting, left, right):
    
    if right <= left:
        return
    a = i = left
    b = right
    pivot = sorting[left]
    while i <= b:
        if sorting[i] < pivot:
            sorting[a], sorting[i] = sorting[i], sorting[a]
            a += 1
            i += 1
        elif sorting[i] > pivot:
            sorting[b], sorting[i] = sorting[i], sorting[b]
            b -= 1
        else:
            i += 1
    sorted_random(sorting, left, a - 1)
    sorted_random(sorting, b + 1, right)



if __name__=="__main__":

    N = int(input())
    random_gen = gen_random(N)
    print(random_gen)
    sorted_random(random_gen, 0, len(random_gen)-1)
    print(random_gen)

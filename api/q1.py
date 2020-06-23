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
def radix_sort(list_of_ints: List[int]) -> List[int]:

    RADIX = 10
    placement = 1
    max_digit = max(list_of_ints)
    while placement < max_digit:

        buckets = [list() for _ in range(RADIX)]
        for i in list_of_ints:
            tmp = int((i / placement) % RADIX)
            buckets[tmp].append(i)

        a = 0
        for b in range(RADIX):
            for i in buckets[b]:
                list_of_ints[a] = i
                a += 1
        placement *= RADIX

    return list_of_ints


"""
if __name__=="__main__":

    N = int(input())
    random_gen = gen_random(N)
    print(random_gen)
    sorted_random(random_gen, 0, len(random_gen)-1)
    print(random_gen)
"""

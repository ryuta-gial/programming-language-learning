# -*- coding: utf-8 -*-


def even_odd(x):
    if x % 2 == 0:
        print("偶数")
    else:
        print("奇数")


even_odd(2)
even_odd(3)


books = {"Dra": "sto", "184": "cst", "fdfd": "kafka"}

del books["fdfd"]

print(books)

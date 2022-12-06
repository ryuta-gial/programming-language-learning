def apply_twice(func,arg):
    return func(func(arg))

def add_fice(x):
    return x + 5

print(apply_twice(add_fice,10))


print((lambda x:x**2+5*x+4)(-4))

triple = lambda x: x * 3
add = lambda x, y: x + y
print(add(triple(3), 4))

def add_five(x):
    return x+5

nums = [11,22,33,44,55]
result = list(map(add_five,nums))
print(result)
nums = [1, 22, 33, 44, 55]
res = list(filter(lambda x: x%2==0, nums))
print(res)

def numbers(x):
  for i in range(x):
    if i % 2 == 0:
      yield i

print(list(numbers(11)))



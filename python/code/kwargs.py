def my_func(x,y,*args, **kwargs):
    print(kwargs)

my_func(2,3,4,5,6,a=7,b=8)

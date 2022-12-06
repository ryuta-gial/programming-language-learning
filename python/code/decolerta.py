def deco(func):
    def wrapper(*args, **kwargs):
        print('--start--')
        func(*args, **kwargs)
        print('--end--')
    return wrapper

@deco
def test():
    print('Hello Decorator')
    
test()

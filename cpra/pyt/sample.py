def test():
    for i in range(10):
        test_var = i
    return test_var


if __name__ == "__main__":
    test_var = 123
    result = test()
    print(result)
    raise Exception(123)  # わざと例外だす
    test_var = 123
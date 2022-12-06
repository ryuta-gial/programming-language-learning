# 素数を100個生成する


def is_prime(n):
    # range 2〜nまで繰り替えす
    for i in range(2, n):
        if n % i == 0:
            return False
    return True


# count個の素数を生成する


def get_primes(count):
    # リスト型
    res = []
    i = 2
    # len は要素の数を取得
    while len(res) < count:
        if is_prime(i):
            res.append(i)
        i += 1
    return res


print(get_primes(100))

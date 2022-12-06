const euclideanAlgorithm = (a, b) => {
    let c = a % b;
    if (c === 0) {
        return b;
    } else {
        return euclideanAlgorithm(b, c);
    }
};

//最大公約数 13
console.log(euclideanAlgorithm(221, 143));

const lcm = (a, b) => {
    let d = (n, m) => (m ? d(m, n % m) : n);
    return (a * b) / d(a, b);
};

//最小公倍数 72
console.log(lcm(24, 18));

function gcd() {
    let f = (a, b) => (b ? f(b, a % b) : a);
    let ans = arguments[0];
    console.log(arguments);
    for (let i = 1; i < arguments.length; i++) {
        ans = f(ans, arguments[i]);
    }
    return ans;
}

//3つ以上の整数の最大公約数 10
console.log(gcd(10, 20, 30, 100));

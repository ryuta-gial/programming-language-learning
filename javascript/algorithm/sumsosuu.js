function sumPrimes(num) {
    let i = 1;
    let sum = 0;
    while (i <= num) {
        if (isPrime(i)) {
            sum += i;
        }
        i++;
    }
    return sum;
}

function isPrime(x) {
    for (let i = 2; i < x; i++) {
        if (x % i === 0) return false;
    }
    return x !== 1 && x !== 0;
}

console.log(sumPrimes(10));

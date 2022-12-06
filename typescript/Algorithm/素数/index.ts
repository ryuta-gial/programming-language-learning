function isPrime(n:number) {
  for (let i = 2; i < n; i++) {
    if (n % i === 0) return 'notPrime';
    return 'prime';
  }
}
console.log(isPrime(18));

function prime(n:number) {
  for (let i = 0; i <= n; i++) {
    let isPrime = false;
    for (let j = 2; j <= i; j++) {
      if (i % j === 0 && j !== i) {
        isPrime = true;
      }
    }
    if (isPrime === false) console.log(i);
  }
}
prime(100);

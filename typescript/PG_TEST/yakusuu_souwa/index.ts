function dub2(n: number): number {
  let sum = 0;
  for (let i = 1; i < n; i++) {
    if (n % i === 0) {
      if (10000 <= i && i <= 99999) {
        sum += i;
      }
    }
  }
  return sum;
}
console.log(dub2(1591349760));

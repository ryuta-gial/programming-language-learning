//双子素数（ふたごそすう、英: twin prime）とは、差が 2 である二つの素数の組を構成する各素数のことである。双子素数の組は、(2, 3) を除いた、最も近い素数の組である。双子素数を小さい順に並べた列は、次のとおりである。
//(3, 5), (5, 7), (11, 13),

function printTwinPrime(n: number) {
  let prime = [];

  for (let i = 0; i <= n; i++) prime[i] = true;

  for (let p = 2; p * p <= n; p++) {
    if (prime[p] == true) {
      for (let i = p * 2; i <= n; i += p) prime[i] = false;
    }
  }
  for (let i = 2; i <= n - 2; i++) {
    if (prime[i] == true && prime[i + 2] == true)
      console.log('(' + i + ',' + (i + 2) + ')');
  }
}

let n = 25;
console.log(printTwinPrime(n));

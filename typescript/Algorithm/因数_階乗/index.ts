/*
	引数:n-素因数分解する整数
	値:nの素因数分解（{num:素因数, r:指数}を持つオブジェクト配列）
*/
function primeFactorization(n) {
  // 平方根を保存
  let s = Math.floor(Math.sqrt(n));

  let r = 0;

  let result = Array();

  // 2から平方根までの素因数を求める
  for (let i = 2; i <= s; i++) {
    if (n % i == 0) {
      r = 0; // 指数カウンタクリア

      do {
        r++; // 指数カウンタプラス

        n = n / i;
      } while (n % i == 0);

      // 素因数iを指数とともに保存
      result.push({ num: i, r: r });
    }
  }

  // 残った素数を追加
  if (n > s) {
    result.push({ num: n, r: 1 });
  }

  return result;
}

console.log(primeFactorization(10));

//階乗は、１からその数までのすべての数をかけます。
//5! = 5 * 4 * 3 * 2 * 1
function factorialize(num, factorial = 1) {
  return num < 0
    ? 1
    : new Array(num)
        .fill(undefined)
        .reduce((product, val, index) => product * (index + 1), 1);
}
console.log(factorialize(5));


function factorialize2(num) {
  if (num === 0) {
    return 1;
  }
  return num * factorialize(num - 1);
}

//5! = 5 * 4 * 3 * 2 * 1
console.log(factorialize2(5));

//
function factorial(num) {
  if (num < 2) return 1;
  return num * factorial(num - 1);
}

console.log(factorial(5));


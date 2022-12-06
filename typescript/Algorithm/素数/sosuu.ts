//http://atomiyama.com/linux/page/javascript-suuretsu/
//１より大きい自然数で、正の約数が１と自分自身のみである数。
//1と自分以外でしか割り切れない数です。自分自身以外に、正の約数を持たないとも言います。

const chk = (a: number, lst: number[]) => {
  //someはtrue or falseを返す
  //xに対して比較演算でsomeをやっている
  return !lst.filter((x) => x <= Math.sqrt(a)).some((v) => a % v === 0);
};

//アロー関数カギカッコなしver
const loop2 = (n: number, lst: number[]) =>
  chk(n, lst) ? lst.concat(n) : loop2(n + 1, lst);
const loop = (n: number, lst: number[], f: Function) =>
  //fは無名関数 関数リテラル
  //渡ってきた関数を実行する
  /* function dispNum(x, y, func){ */
  /*   console.log(func(x, y)); */
  /* } */
  /**/
  /* let calcAverage = function(x, y){ */
  /*   return (x + y) / 2; */
  /* }; */
  /**/
  /* dispNum(10, 8, calcAverage); */
  /* >> 9 */

  f(n, lst) ? lst : loop(n, loop2(lst[lst.length - 1] + 1, lst), f);
const sosu = () => {
  let lst = [2];
  return {
    list: (n: number) => {
      lst = loop(n, lst, (n: number, lst: number[]) => lst.length > n);
      return lst.slice(0, n);
    },
    less: (n: number) => {
      lst = loop(n, lst, (n: number, lst: number[]) => lst[lst.length - 1] > n);
      return lst.filter((x) => x < n);
    },
    nth: (n: number) => {
      lst = loop(n, lst, (n: number, lst: number[]) => lst.length > n);
      return lst[n - 1];
    },
  };
};

const p = sosu();

console.log(p.list(10)); // 素数を10個表示
console.log(p.less(50)); // 50未満の素数を表示
console.log(p.nth(10)); // 10番目の素数を表示

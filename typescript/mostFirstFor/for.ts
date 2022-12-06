//最速のfor文
function tryFirstFor() {
  const arr = new Array(1000).fill(0).map((v, i) => i);

  let sum = 0;
  const len = arr.length | 0;

  for (let j = 0; j < 5; j++) {
    sum = 0;
    console.time("Typed for");
    //|0で数値型を定義
    for (let i = 0; i < len; i = (i + 1) | 0) {
      sum += arr[i];
    }
    console.timeEnd("Typed for");
    console.log(sum);
  }
}
console.log(tryFirstFor());

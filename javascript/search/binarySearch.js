//このプログラムは1万個の乱数を要素とする配列から、ある数を
// 
// 並び順がバラバラの配列からindexOf関数で（「線形探索法」で）
// 昇順に並べ替えられた配列から「二分探索法」で
// 10万回ずつ探してみたときの実行時間を計測するプログラムです。

function rnd(min, max) {
  return Math.floor(Math.random() * (max + 1 - min)) + min;
}

function binarySearch(arr, key) {
  let min = 0,
    max = arr.length - 1,
    guess;
  while (min <= max) {
    guess = Math.floor(min + (max - min) / 2);
    if (arr[guess] === key) {
      return guess;
    } else if (arr[guess] < key) {
      min = guess + 1;
    } else {
      max = guess - 1;
    }
  }
  return -1;
}

const size = 10000;
var arr1 = new Array(size);
var arr2;
var hash1 = {};

// 乱数の配列を作成
var i;
for (i = 0; i < size; i++) {
  arr1[i] = rnd(1, 100000);
}
console.log(arr1.slice(0, 10));

// arr2にarr1をコピーして昇順にソートした配列を作る
arr2 = arr1.slice(0, size);
arr2.sort((a, b) => {
  return a - b;
});
console.log(arr2.slice(0, 10));

// hash1をランダム数値を全て属性名とするオブジェクトに作り変えてみる
// {
//     <数値>: true ,
//     <数値>: true ,
//    <数値>: true
// }
arr1.forEach((n, idx, arr) => {
  hash1[n] = true;
});
console.log(Object.keys(hash1).length);
console.log(Object.keys(hash1).slice(0, 10));

// ランダムに並んだ配列から要素を10万回検索してみる
const count = 100000;
console.time("random");
let found = 0;
for (i = 0; i < count; i++) {
  let key = rnd(1, 100000);
  if (arr1.indexOf(key) >= 0) {
    found++;
  }
}
console.log("found: " + found);
console.timeEnd("random");

// 並べ替え済みの配列から同様に検索してみる
console.time("sorted");
found = 0;
for (i = 0; i < count; i++) {
  let key = rnd(1, 100000);
  if (binarySearch(arr2, key) >= 0) {
    found++;
  }
}
console.log("found: " + found);
console.timeEnd("sorted");

// オブジェクトから同様に検索してみる
console.time("object");
found = 0;
for (i = 0; i < count; i++) {
  let key = rnd(1, 100000);
  if (hash1[key]) {
    found++;
  }
}
console.log("found: " + found);
console.timeEnd("object");

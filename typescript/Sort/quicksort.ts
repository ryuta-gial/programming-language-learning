function quickSort(arr) {
  //再帰処理の無限ループ止め
  if (arr.length < 2) return arr;
  //配列の0番目の要素の値
  let pivot = arr[0];
  // console.log(pivot);
  const left = [];
  const right = [];

  //要素数分ループ
  for (let i = 1; i < arr.length; i++) {
    //0番目と左から順番に比較して基準値より大きかったら格納
    //つまり基準値を中央にして、小さい数値と大きい数値に分ける
    //
    if (pivot > arr[i]) {
      left.push(arr[i]);
    } else {
      right.push(arr[i]);
    }
  }
  //一番最初は4,3,1,2つまり　小さい数値グループ
  //console.log(right);
  //console.log(left + "左");
  //console.log(quickSort(left).concat(pivot, quickSort(right)));
  //concatは配列を結合させる
  //一番最初に行われるのは,4,3,1,2,5,7,6,8,9
  //左のquickSortは1,2でpivotが3になるまでループ、
  return quickSort(left).concat(pivot, quickSort(right));
}
let ar = [2, 4, 7, 6, 1, 3];

//let ar = [5, 4, 7, 6, 8, 3, 1, 2, 9];
//quickSort(ar);
console.log(quickSort(ar));

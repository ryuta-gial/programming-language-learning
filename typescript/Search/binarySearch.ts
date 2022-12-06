//「調べる範囲を半分に絞りながら探す方法」
//範囲を「二つ(バイナリ)に分けて」探すので「バイナリサーチ」と呼ばれる。
//データがばらばらに並んでいると規則性がないので、あらかじめデータを順番に並べておく必要がある。

//検索するソート済みの配列データ
let a: number[] = [1, 2, 4, 5, 10];

//探す値
let searchValue: number = 4;

//「調べた値」と「探す値」が一致したとき、indexを保存する変数。
//初期値はエラー(-1)に設定
let index: number = -1;

//調べる左端を表す添字(index)
let left: number = 0;

//調べる右端を表す添字(index)
let right: number = a.length - 1;

//左端と右端にデータがある間は処理を繰り返す
while (left <= right) {
  //左右の真ん中を表す添字(index)
  let middle: number = Math.floor((left + right) / 2);

  //真ん中の値と探す値を比較する
  if (a[middle] === searchValue) {
    //一致した場合、変数に入れて処理終了
    index = middle;
    break;
  } else if (a[middle] < searchValue) {
    //探す値より小さい場合、左側にはもっと小さい値しかないので左端の値を真ん中の値の右に移動する
    left = middle + 1;
  } else {
    //探す値より大きい場合、右側にはもっ��大きい値しかないので右端の値を真ん中の値の左に移動する
    right = middle - 1;
  }
}

//検索結果を表示する。(-1の場合は値がなかった)
console.log(a[index]);

//「先頭から順番に探す値が見つかるまで探す方法
//配列を直線的（リニア）に探すので「リニアサーチ」と呼ばれる。」
//検索する配列データ
let a: number[] = [1, 3, 10, 2, 8];

//検索する値
let searchValue: number = 4;

//「調べた値」と「探す値」が一致したとき、indexを保存する変数。
//初期値はエラー(-1)に設定
let index: number = -1;

//繰り返し処理
for (let i = 0; i < a.length; i++) {
  //条件分岐 「調べた値」と「探す値」が一致したとにきにindexを保存して処理終了
  if (a[i] === searchValue) {
    index = i;
    break;
  }
}
//検索結果を表示する。(-1の場合は値がなかった)
console.log(a[index]);

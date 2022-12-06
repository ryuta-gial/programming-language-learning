//バブルソートはリストにおいて隣り合うふたつの要素の値を比較して条件に応じた交換を行う整列アルゴリズムです。
function bubble_sort(arg: number[]) {
  console.log(arg.length);
  let i, j, x;
  for (i = 0; i <= arg.length - 2; i++) {
    for (j = arg.length - 1; j >= i + 1; j--) {
      if (arg[j - 1] > arg[j]) {
        x = arg[j];
        arg[j] = arg[j - 1];
        arg[j - 1] = x;
      }
    }
  }
  return arg;
}
let arr = [3, 6, 7, 1];
console.log(bubble_sort(arr));

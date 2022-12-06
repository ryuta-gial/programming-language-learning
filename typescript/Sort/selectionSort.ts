//選択ソートとは、与えられたデータ列を大小などの順序通りになるよう並べ替えるソート（整列）アルゴリズムの最も基本的な手法の一つで、未整列の要素の中から最大あるいは最小のものを選択し、整列済みの列の末尾に追加していくもの。
function selection_sort(arg: number[]) {
  let i, j, x, min;
  for (i = 0; i <= arg.length - 2; i++) {
    min = i;
    for (j = i; j <= arg.length - 1; j++) {
      if (arg[j] < arg[min]) min = j;
    }
    x = arg[i];
    arg[i] = arg[min];
    arg[min] = x;
  }
  return arg;
}

let arr = [3, 7, 9, 1];

console.log(selection_sort(arr));

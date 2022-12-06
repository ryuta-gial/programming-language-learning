let array = [4, 7, 1, 3, 9];

function insertation_sort(arg: number[]) {
  let i, j, x;
  for (i = 1; i <= arg.length - 1; i++) {
    j = i;
    while (j >= 1 && arg[j - 1] > arg[j]) {
      x = arg[j];
      arg[j] = arg[j - 1];
      arg[j - 1] = x;
      j--;
    }
  }
  return arg;
}
console.log(insertation_sort(array));

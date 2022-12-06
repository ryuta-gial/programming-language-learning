//三番目に大きい数字
function pgt(arg: number[]) {
  const a = arg.sort(function (a, b) {
    return b - a;
  })[2];
  return a;
}
console.log(pgt([1, 8, 6, 4, 3]));
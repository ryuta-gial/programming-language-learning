/**変則フィボナッチ数
 * @param
 * @returns
 */
function fib(n: number[], p: number): number {
  for (let i = 3; i <= p; i++) {
    const a = n[i - 1];
    const b = n[i - 3];
    n.push(a + b);
  }
  return n[p];
}

console.log(fib([1, 0, 5], 48));

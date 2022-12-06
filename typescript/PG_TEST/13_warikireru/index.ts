function pgt3(arg: number):number {
  if (
    arg % 13 === 0 &&
    arg >= 0.0 &&
    Math.floor(arg) === arg &&
    arg !== Infinity
  ) {
    return arg;
  }

  return pgt3(arg + 1);
}
console.log(pgt3(10000));

function pgt2(arg: number) {
  let result = '';
  if (arg % 5 === 0 && arg % 3 === 0) {
    result = 'FizzBuzz';
  } else if (arg % 3 === 0) {
    result = 'FIzz';
  } else if (arg % 5 === 0) {
    result = 'Buzz';
  } else {
    result = String(arg);
  }
  return result;
}
console.log(pgt2(6));

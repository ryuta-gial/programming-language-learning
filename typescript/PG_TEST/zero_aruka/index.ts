type array = string[];

function pgt(arg: string[]) {
  let checkNumber = 0;
  let result = '';
  let testCase = arg.map(Number);
  for (let i = 0, len = arg.length; i < len; i++) {
    if (testCase[i] === 0) {
      result = 'NO';
      break;
    } else {
      result = 'YES';
    }
  }

  return result;
}
console.log(pgt(['3', '1', '2', '3']));

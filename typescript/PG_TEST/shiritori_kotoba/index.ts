//しりとりが成立するかを判定する
type arrays = string[];

function shiritori(arg: arrays) {
  let checkMuch = '';
  let muchNumber = 0;
  for (let i = 0, len = Number(arg[0]); i <= len; i++) {
    if (i > 1) {
      if (arg[i - 1].slice(-1) === arg[i].slice(0, 1) && muchNumber === 0) {
        checkMuch = 'Yes';
      } else if (muchNumber === 0) {
        muchNumber += 1;
        checkMuch = arg[i - 1].slice(-1) + ' ' + arg[i].slice(0, 1);
      } else {
        muchNumber += 1;
      }
    }
  }
  return checkMuch;
}
console.log(shiritori(['3', 'adija', 'Akq', 'qZR']));

type array = string[];
type obj = {
  [index: string]: string | number;
};

function countColor(arg: string[]) {
  const lon = arg.length;
  let count: obj = {};

  for (let i = 0; i < lon; i++) {
    const elm = arg[i];
    count[elm] = count[elm] ? +1 : 1;
  }
  for (const key in count) {
    console.log(key + '  ' + count[key]);
  }
  return arg;
}
console.log(countColor(['red', 'green', 'blue', 'blue', 'green', 'blue']));

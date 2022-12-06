type box = {
  name: string;
  d: number;
};

function pgt(arg: string[]) {
  const fn = Number(arg[0]);
  const ln = arg.length-1;
  console.log(ln);
  const array = [];
  let property:box ={
    name :'',
    d:0
  }
  for (let i = 1, len = ln; i < len; i++) {
    //名前を格納
    if (i <= fn) {
           
      property ={
         name : arg[i],
         d:0
      }
      array.push(property);
    //
    } else if (i > fn + 1) {
      const a = arg[i].split(' ');
      property = {
        name: a[0],
        d: Number(a[1]),
      };
      array.push(property);
    }
  }
  const total = array.reduce((result, current) => {
    if (current.name ===arg[ln] ) {
      return result + current.d;
    }
    return result;
  }, 0);
  return total;
}
console.log(
  pgt([
    '2',
    'Kirishima',
    'Kyoko',
    '2',
    'Kyoko 1',
    'Kyoko 2',
    'Kyoko',
  ])
);

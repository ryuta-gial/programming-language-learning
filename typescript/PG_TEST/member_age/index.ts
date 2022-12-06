type array2 = string[];
//社員の年齢に1歳加えて返す
function pgt2(arg: string[]) {
  let array = [];
  for (let i = 1, len = Number(arg[0]); i <= len; i++) {
    const menber = arg[i].split(' ');
    const age = Number(menber[1]) + 1;
    const resultString = `${menber[0]} ${menber[1]}`;
    array.push(resultString);
  }
  const result = array.forEach((num) => {
    console.log(num);
  });
  return null;
}
console.log(pgt2(['1', 'Yamada 30']));

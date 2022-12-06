
//与えられた配列の中で、一番最後の名前の人が持っている資産は何番か
function pgt2(arg: string[]) {
  let peple = Number(arg[0]);
  let value = [];
  let result=''


  for (let i = 1, len = peple; i <= len; i++) {
    let aaa = arg[i].split(' ');
    let property = {
      'name': aaa[0],
      'value': aaa[1]
    }
    value.push(property);
  }
  const index = value.find((e, index) => {
    if (e.name === arg[peple + 1]) {
      result = e.value;
    }
  })

    return result;
}
console.log(pgt2(['2', 'Kirishima 1', 'Kyoko 2', 'Kirishima']));

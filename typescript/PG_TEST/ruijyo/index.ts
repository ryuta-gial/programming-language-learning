type array2 = string[];

function pgt2(arg:number[]){
  let cal= ((arg[0] + arg[1]) * arg[2])**2;
  let test = arg[0] + arg[1];
  let result = cal % arg[3];

  return result;
}
console.log(pgt2([28, 57, 33, 73]))

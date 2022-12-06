type array = string[];
//配列を分割して、10000で変数初期化して、商と余りを出す。
function pgt(arg:string[]){ 
   let argNumber = arg[0].split(' ').map(Number);
   let N = 10000;
   N = Math.floor(N / argNumber[0]);
   N = N % argNumber[1];
   

  return N;
}
console.log(pgt(['911 285']))

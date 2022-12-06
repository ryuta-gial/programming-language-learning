//ボールが収まった箱番号を格納してソートする

function boxSiza(arg: string[]) {
  //箱の数を格納
  let box = arg[0].split(' ');
  let boxCount = Number(box[0]);
  //ボールの半径を格納
  let ballSize = Number(box[1]) * 2;
  //箱の個数分回す
  let result = [];
  for (let i = 1, len = boxCount; i <= len; i++) {
    //分割して、数値にする
    let size = arg[i].split(' ').map(Number);
    const aryMin = function (a: number, b: number) {
      return Math.min(a, b);
    };
    let min = size.reduce(aryMin);

    if (ballSize <= min) {
      result.push(i);
    }
  }
  result.sort((a, b) => a - b);
  return result;
}
console.log(boxSiza(['4 2', '6 6 6', '4 6 4', '6 1 1', '4 4 4']));

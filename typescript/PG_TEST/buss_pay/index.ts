//残額から代金を引き、ポイントが代金より多ければポイントで支払う

type array3 = string[];

function buss(arg: array) {
  const bunString = arg[0].split(' ');
  const countNum = Number(bunString[1]);
  let zangaku = Number(bunString[0]);
  let point = 0;
  for (let i = 0, len = countNum; i <= len; i++) {
    const unchin = Number(arg[i]);
    if (i !== 0 && zangaku >= unchin) {
      //console.log(zangaku);
      if (zangaku !== 0 && point < unchin) {
        //最初の計算
        zangaku = zangaku - unchin;
        point += unchin / 10;
      } else if (zangaku !== 0 && point >= unchin) {
        point = point - unchin;
      }

      console.log(zangaku + ' ' + point);
    }
  }
  return ;
}

console.log(buss(['2000 5','300','500','300','1000','1000']));


//6 5 11', '2', '4', '1', '5', '1'
//6個の目盛りがある錠がある0-5
//2,4,1,5,1と錠を回し
//最小で回した場合に11より下になるかをチェックする
//5は回す回数
function checkDial(arg: string[]) {
  const dialSum = Number(arg[0].split(' ')[0]);
  const countDial = Number(arg[0].split(' ')[1]);
  const limitDial = Number(arg[0].split(' ')[2]);
  let result = 'No';
  let sumCount = 0;
  //ダイヤルを回す回数
  for (let i = 1, len = countDial; i <= len; i++) {
    const dial = Number(arg[i]);
    let frontDial = 0;
    let rev = 0;
    let aev = 0;
    //そもそもダイヤル数以上の値がきたら終了
    if (
      dial > dialSum ||
      arg.length !== countDial + 1 ||
      arg.length === countDial
    ) {
      return 'No';
    }
    //メモリの合計
    for (let m = 0, len = dialSum; m < len; m++) {
      //2回目以降の処理
      if (i !== 1) {
        frontDial = Number(arg[i - 1]);
        const tokemawari = frontDial + m;
        const hantokeimawari = frontDial - m;
        //一つづつ足していき、ダイヤル数を超えた場合
        //0に戻して
        //時計回り
        if (dialSum - 1 < tokemawari) {
          //1からカウントしていく
          rev += 1;
          if (dial === rev - 1) {
            sumCount += m;
            break;
          }
          //時計回りでマッチしたら数を格納してループ終了
        } else if (dial === tokemawari) {
          sumCount += m;
          break;
        }
        //反時計周りチェック
        //一つ前のダイヤル錠から1引いた数がダイヤルとマッチするか
        if (dial === hantokeimawari) {
          sumCount += m;
          break;
          //引いた数がマイナスになったら
          //ダイヤル数から1づつ引いていく
        } else if (-1 === Math.sign(hantokeimawari)) {
          aev += 1;
          if (dial === dialSum - aev) {
            sumCount += m;
            break;
          }
        }
      } else {
        //時計回りでチェック
        if (dial === m) {
          sumCount += m;
          break;
        }
        //反時計周りでチェック */
        if (dial === dialSum - m) {
          sumCount += m;
          break;
        }
      }
    }
  }
  if (sumCount <= limitDial) {
    result = 'Yes';
  } else {
    result = 'No';
  }
  return result;
}

console.log(checkDial(['6 5 11', '2', '4', '1', '5', '1']));

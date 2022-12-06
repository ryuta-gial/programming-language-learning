//グー(G)かパー(P)か、どっちが少ないか、それともドローか判定する

function jyanken(arg: string[]) {
  let str = arg[1].split(' ');
  let GWIN = 0;
  let PWIN = 0;
  let result = '';

  for (let i = 0, len = Number(arg[0]); i < len; i++) {
    if (str[i] === 'G') {
      GWIN += 1;
    } else if (str[i] === 'P') {
      PWIN += 1;
    }
  }

  if (GWIN < PWIN) {
    result = 'G';
  } else if (GWIN > PWIN) {
    result = 'P';
  } else {
    result = 'Draw';
  }

  return result;
}
console.log(jyanken(['4', 'G G P P']));

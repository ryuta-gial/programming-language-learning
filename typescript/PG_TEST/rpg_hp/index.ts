type majic = {
  p_demage: number;
  e_demage: number;
};

type re = {
  arg: number;
  p: majic[];
  c: number;
};

function pgt3(arg: number, p: majic[]): number {
  const H = arg;
  let hp = arg;
  let ar = p;
  let result = 0;
  let obj: majic = {
    p_demage: 0,
    e_demage: 0,
  };
  //ダメージが0なら回数を返す
  for (let i = 1, len = hp; i <= len; i++) {
    //1回目2回目の攻撃判定
    //console.log(hp);
    if (i === 1 || i === 2) {
      obj = {
        p_demage: 1,
        e_demage: 1,
      };
      p.push(obj);
      hp = hp - 1;
    } else {
      hp = hp - (p[i - 2].p_demage * 2 + p[i - 3].p_demage);
      obj = {
        p_demage: p[i - 2].e_demage + p[i - 3].e_demage,
        e_demage: p[i - 2].p_demage * 2 + p[i - 3].p_demage,
      };
      p.push(obj);
    if (hp <= 0) {
      return i;
    }
  }
  }
  return result;
}
console.log(pgt3(7, []));

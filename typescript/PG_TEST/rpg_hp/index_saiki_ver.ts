type majic = {
  p_demage: number;
  e_demage: number;
};

function pgt3(hp: number, ary: majic[], co: number): number {
  const COUNT = co;
  let HP = hp;
  if (HP <= 0) {
    return COUNT-1;
  }
  if (COUNT <= 2) {
    ary.push({
      p_demage: 1,
      e_demage: 1,
    });
    HP = HP - 1;
    return pgt3(HP, ary, COUNT + 1);
  } else {
    HP = HP - (ary[COUNT - 2].p_demage * 2 + ary[COUNT - 3].p_demage);
    ary.push({
      p_demage: ary[COUNT - 2].e_demage + ary[COUNT - 3].e_demage,
      e_demage: ary[COUNT - 2].p_demage * 2 + ary[COUNT - 3].p_demage,
    });
    return pgt3(HP, ary, COUNT + 1);
  }
}
console.log(pgt3(35, [], 1));

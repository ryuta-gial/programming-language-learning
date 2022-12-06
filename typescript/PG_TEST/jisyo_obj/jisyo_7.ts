//Aグループが頼んだ仕事はCグループの誰がやったのか
//2,2,2　はAグループの人数、Bグループの人数、Cグループの人数を表す
type objType = {
  [index: string]: string | number;
};

function pgt(arg: string[]) {
  let free: objType = {};
  let free2: objType = {};
  const fn = Number(arg[0].split(' ')[0]);
  const sn = Number(arg[0].split(' ')[1]);
  const array = [];
  let property: objType = {
    ask: '',
    en: 0,
  };

  //AグループからBグループへ
  for (let i = 1, len = fn; i <= len; i++) {
    const a = arg[i].split(' ');
    free[a[0]] = a[1];

    property = {
      ask: a[0],
      en: a[1],
    };

    array.push(property);
  }
  //BグループからCグループへ
  for (let t = sn + 1, len = arg.length - 1; t <= len; t++) {
    const b = arg[t].split(' ');
    array.map((array) => {
      if (array.en === b[0]) {
        return (array.en = b[1]);
      }
    });
    free2[b[0]] = b[1];
  }

  let ar = [2, 1];
  ar.sort((a, b) => {
    return a - b;
  });

  console.log(free);
  console.log(free2);

  // [1] はkey名を指定している
  //つまりAが頼んだBのこと
  //2
  console.log(free[1]);
  //2に該当するkey名が表示される
  console.log(free2[free[1]]);
  
  ar.forEach((num) => {
    console.log(`${num} ${free2[free[num]]}`);
  });

  return arg;
}
console.log(pgt(['2 2 2', '2 1', '1 2', '1 2', '2 2']));

//・双子素数：差が２である２つの素数の組
//・いとこ素数：差が４である２つの素数の組
//・セクシー素数：差が６である２つの素数の組

"use strict";

const chk = (a, lst) => {
    return !lst.filter(x => x <= Math.sqrt(a)).some(v => a % v === 0);
};

const loop = (a, lst, f) => {
    if (chk(a, lst)) {
        lst.push(a);
        if (lst.indexOf(a - f) > -1) return lst;
    }
    return loop(a + 1, lst, f);
};
const C = f => n => {
    return Array(n)
        .fill()
        .reduce(
            a => {
                const x = loop(a[0][a[0].length - 1] + 1, a[0], f);
                return [x, a[1].concat(x[x.length - 1])];
            },
            [[2], []]
        )[1]
        .map(x => [x - f, x]);
};

console.log(C(2)(10));
console.log(C(4)(10));
console.log(C(6)(10));

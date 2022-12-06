//１より大きい自然数で、正の約数が１と自分自身のみである数。
"use strict";

const chk = (a, lst) => {
    return !lst.filter(x => x <= Math.sqrt(a)).some(v => a % v === 0);
};

const loop2 = (n, lst) => (chk(n, lst) ? lst.concat(n) : loop2(n + 1, lst));
const loop = (n, lst, f) =>
    f(n, lst) ? lst : loop(n, loop2(lst[lst.length - 1] + 1, lst), f);
const sosu = () => {
    let lst = [2];
    return {
        list: n => {
            lst = loop(n, lst, (n, lst) => lst.length > n);
            return lst.slice(0, n);
        },
        less: n => {
            lst = loop(n, lst, (n, lst) => lst[lst.length - 1] > n);
            return lst.filter(x => x < n);
        },
        nth: n => {
            lst = loop(n, lst, (n, lst) => lst.length > n);
            return lst[n - 1];
        }
    };
};
const p = sosu();

console.log(p.list(10));
console.log(p.less(50));
console.log(p.nth(10));

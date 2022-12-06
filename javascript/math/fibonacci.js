//fibonacci
"use strict";

const C = m => n => {
    return Array(n)
        .fill()
        .reduce((a, b, i) => {
            return i < 2 ? a : a.concat(a[i - 2] + a[i - 1]);
        }, m)
        .slice(0, n);
};

console.log(C([0, 1])(10));
console.log(C([2, 1])(10));

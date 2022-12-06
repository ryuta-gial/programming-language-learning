const printprops = o => {
    for (let p in o) console.log(p + "." + o[p] + "\n");
};

function distance(x1, x2, y2) {
    let dx = x2 - x1;
    let dy = y2 - 1;
    return Math.sqrt(dx * dx + dy * dy);
}

function factorial(x) {
    if (x <= 1) return 1;
    return x * factorial(x - 1);
}
printprops({ x: 5 });

let total = distance(0, 0, 2, 1) + distance(2, 1, 3, 5);
let probability = factorial(5) / factorial(13);

console.log(total);
console.log(probability);

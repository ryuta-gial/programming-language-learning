const move = (disc, from, to) => {
    console.log(`Disc:${disc}を${from}から${to}に移動`);
};

let hanoi = (n, from, to, other) => {
console.log(n);
    if (n > 0) {
       // console.log(n);
        hanoi(n - 1, from, other, to);
         //console.log(to);
        move(n, from, to);
         //console.log(n);

        hanoi(n - 1, other, to, from);
    }
};
let n = 2;

if (process.argv.length > 2) {
    n = Number(process.argv[2]);
}
hanoi(n, "tower1", "tower3", "tower2");

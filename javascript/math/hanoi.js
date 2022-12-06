function tower(frompeg, topeg, aux, n) {
    if (n == 1) {
        console.log(
            "move disk" + n + "from peg" + frompeg + "to peg" + topeg + "-->"
        );
    } else {
        tower(frompeg, aux, topeg, n - 1);
        console.log(
            "move disk" + n + "from peg" + frompeg + "to peg" + topeg + "-->"
        );
        tower(aux, topeg, frompeg, n - 1);
    }
}

let x = 3;
let A = "A";
let B = "B";
let C = "C";
console.log(tower(A, B, C, x));

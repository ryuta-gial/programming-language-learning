
//回答参考
const fs = require("fs");

const input = fs.readFileSync("/dev/stdin", "utf-8").trim();

const lines = input.split("\n");
const [p, q] = lines[0].split(" ").map((num) => Number(num));
const a = [];
const AtoB = new Map();
const BtoC = new Map();

for (let i = 1; i <= p; i++) {
  // eslint-disable-next-line camelcase
  const [i_a, i_b] = lines[i].split(" ").map((num) => Number(num));
  a.push(i_a);
  AtoB.set(i_a, i_b);
}
console.log(a);
for (let i = p + 1; i <= p + q; i++) {
  const [j_a, j_b] = lines[i].split(" ").map((num) => Number(num));
  BtoC.set(j_a, j_b);
}
console.log(BtoC);
a.sort((a, b) => {
  return a - b;
});

a.forEach((num) => {
  console.log(`${num} ${BtoC.get(AtoB.get(num))}`);
});
//回答参
const fs = require("fs");

const input = fs.readFileSync("/dev/stdin", "utf-8").trim();

const lines = input.split("\n");
const n = Number(lines[0]);
const array = [];
for (let i = 1; i <= n; i++) {
  const line = lines[i].split(" ");
  array.push([line[0], Number(line[1])]);
}
const S = lines[n + 1];
const dict = new Map();

array.forEach((pair) => {
  dict.set(pair[0], pair[1]);
});

console.log(dict.get(S));
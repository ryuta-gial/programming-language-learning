//回答参考
const fs = require("fs");

const input = fs.readFileSync("/dev/stdin", "utf-8").trim();

const lines = input.split("\n");
const n = Number(lines[0]);
const m = Number(lines[n + 1]);

const S = lines[n + m + 2];
const dict = new Map();

for (let i = 1; i <= n; i++) {
  dict.set(lines[i], 0);
}
for (let i = n + 2; i < n + m + 2; i++) {
  const p = lines[i].split(" ")[0];
  const a = Number(lines[i].split(" ")[1]);
  if (dict.get(p)) {
    dict.set(p, dict.get(p) + a);
  } else {
    dict.set(p, a);
  }
}

console.log(dict.get(S));
const uniteUnique = (...arr) => [...new Set(arr.flat())];

console.log(uniteUnique([1, 3, 2], [5, 2, 1, 4], [2, 1]));

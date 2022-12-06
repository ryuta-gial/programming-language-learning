function alphabeticalOrder(arr) {
  // Add your code below this line
  return arr.sort(function (a, b) {
    return a === b ? 0 : a < b ? -1 : 1;
  });
  // Add your code above this line
}
console.log(alphabeticalOrder(["a", "d", "c", "a", "z", "g"]));

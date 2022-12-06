let sampleWord = "astronaut";
let sampleWord2 = "abc123";
var pwRegex = /^\D(?=\w{5})(?=\w*\d{2})/; // Change this line
let result = pwRegex.test(sampleWord);
let result2 = pwRegex.test(sampleWord2);
console.log(result);
console.log(result2);

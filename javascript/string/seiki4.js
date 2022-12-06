let haStr = 'Hazzzzah';
let haRegex = /Haz{4,}ah/; // Change this line
let result = haRegex.test(haStr);
console.log(result);


let str = 'one two three';
let fixRegex = /(\w+)\s(\w+)\s(\w+)/; // Change this line
let replaceText = '$3 $2 $1'; // Change this line
let result2 = str.replace(fixRegex, replaceText);

console.log(result2);

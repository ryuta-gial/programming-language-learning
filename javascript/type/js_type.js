var message = 'Hello';
console.log(message);
//プール値true または false のいずれかをセットできる
var isDone = false;
console.log(isDone);
// 浮動小数点数
var decimal = 6;
// 16進数
var hex = 0xf00d;
// 2進数
var binary = 10;
// 8進数
var octal = 484;
console.log(decimal);
// タプル（OK）
var ok = ["hello", 10];
// タプル（NG）
//let ng: [string, number] = [10, "hello"];
// それぞれの型が用意されている
var u = undefined;
var n = null;
// 他の型に代入できる
var no = null;
// 必ず例外が発生する場合、戻り値は返さない = 決して発生しない
function error(message) {
    throw new Error(message);
}
var fullName = "Bob Bobbington";
var age = 37;
var sentence = "Hello, my name is " + fullName + ".\n\nI'll be " + (age + 1) + " years old next month.";
console.log(sentence);

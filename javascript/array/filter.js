// The global variable
var bookList = [
  "The Hound of the Baskervilles",
  "On The Electrodynamics of Moving Bodies",
  "PhilosophiĆ¦ Naturalis Principia Mathematica",
  "Disquisitiones Arithmeticae",
];

// Change code below this line
function add(list, bookName) {
  return [...list, bookName];
}

/* This function should remove a book from the list and return the list */
// New parameters should come before the bookName one

function remove(list, bookName) {
  return list.filter((book) => book !== bookName);
}

var newBookList = add(bookList, "A Brief History of Time");
var newerBookList = remove(bookList, "On The Electrodynamics of Moving Bodies");
var newestBookList = remove(
  add(bookList, "A Brief History of Time"),
  "On The Electrodynamics of Moving Bodies"
);

console.log(bookList);

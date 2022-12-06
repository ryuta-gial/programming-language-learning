const user = {
    name: "David",
    age: 28,
    id: 1234
};
let newUser = Object.assign({}, ({ name, age } = user), { id: 9999 });
console.log(newUser);

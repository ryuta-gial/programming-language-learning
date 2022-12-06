let User = function (name, age) {
    this.name = name;
    this.age = age;
};

User.prototype.getName = function () {
    console.log(this.name);
    return this.name;
};

User.prototype.getAge = function () {
    console.log(this.age);
    return this.age;
};

let myObj = new User("hoge", "fdg");
myObj.getName();
let myObj2 = new User("fuga", "test");
myObj2.getAge();

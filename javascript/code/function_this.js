function person(name, age) {
    this.name = name;
    this.age;
    this.changeName = function (name, age) {
        this.name = name;
        this.age = age;
    };
}

const p = new person("David", 21);
p.changeName("John", 35);

console.log(p.name, p.age);

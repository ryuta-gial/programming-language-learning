class Animal {
    constructor(name) {
        this.name = name;
    }

    speak() {
        console.log(`${this.name} makes a noise.`);
    }
}

class Dog extends Animal {
    constructor(name) {
        super(name);
    }

    supeak() {
        console.log(`${this.name}barks.`);
    }
}
let d = new Dog("Rex");
d.speak();

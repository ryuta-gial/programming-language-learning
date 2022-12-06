function Dog(name, color) {
    this.name = name;
    this.color = color;
    this.numLegs = 4;
}
let terrier = new Dog('George', 'White');

console.log(terrier.name);

function House(numBedrooms) {
    this.numBedrooms = numBedrooms;
}
let myHouse = new House(5);
// Only change code below this line
console.log(myHouse instanceof House);

function Bird(name) {
    this.name = name;
    this.numLegs = 2;
}

let canary = new Bird('Tweety');
let ownProps = [];
// Add your code below this line
for (let property in canary) {
    if (canary.hasOwnProperty(property)) {
        ownProps.push(property);
    }
}

console.log(ownProps);

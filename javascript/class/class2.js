let bird = {
    name: 'Dnald',
    numLegs: 2,
};

let boat = {
    name: 'Warrior',
    type: 'race-boat',
};

// Add your code below this line
let glideMixin = function (obj) {
    obj.glide = function () {
        console.log('Gliding!');
    };
};
//console.log(glideMixin(bird));
//console.log(glideMixin(boat));

let funModule = (() => {
    return {
        isCuteMixin: (obj) => {
            obj.isCute = () => {
                true;
            };
        },
        singMixin: (obj) => {
            obj.sing = () => {
                console.log('Singing to an awesome tune');
            };
        },
    };
})();

funModule.singMixin(bird);
bird.sing();

//funModule.singMixin(boat);

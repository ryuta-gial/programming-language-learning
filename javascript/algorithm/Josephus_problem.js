var input1, input2;
var people = [],
    removed = [];
var circle = null,
    skip = null;
var index = 0;

while (circle === null || circle < 1) {
    //asks until the variable is filled with a number greater than 0
   // input1 = prompt('How large is the circle?');
   input1 = 11
    circle = !isNaN(input1) ? parseInt(input1, 10) : null;
}

while (skip === null || skip < 1) {
   // input2 = prompt('How many people will be skipped each time?');
    input2= 2
    skip = !isNaN(input2) ? parseInt(input2, 10) - 1 : null;
}

function calc() {
    "use strict";
    for (var i = 0; i < circle - skip; i++) {
        //moves to next victim
        index += skip;
        if (index > people.length - 1) {
            //stops selecting a victim higher than the amount of people left
            index -= people.length;
        }
        //removes them
        removed = people.splice(index, 1);
        //console.log("Killed: " + index + " Victims: " + people);
    }
    console.log('Person ' + people + " survived");
}

function init() {
    "use strict";
    for (var i = 0; i < circle; i++) {
        //fills array with victims
        people.push(i + 1);
    }
    calc();
}

init();
let human = (function () {
    let _name;

    return {
        get name() {
            return `名前は${_name}です`;
        },
        set name(val) {
            _name = val;
        },
    };
})();

human.name = "igarashi";
console.log(human.name);
console.log(human._name);
human._name = "tarama";
console.log(human.name);
console.log(human._name);

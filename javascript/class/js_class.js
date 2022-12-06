/* クラス */

class Phone {
    constructor(name) {
        this.name = name;
    }
    set name(name) {
        this._name = name;
    }
    get name() {
        return this._name;
    }
    getName() {
        console.log(" 機種 は" + this._name + "です");
    }
}
let smartPhone = new Phone(" smart phone");
smartPhone.getName();

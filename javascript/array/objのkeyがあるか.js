function checkObj(obj, checkProp) {
    if (obj.hasOwnProperty(checkProp)) {
        return obj[checkProp];
    } else {
        return "Not Found";
    }
}

var ob = {
    top: "hat",
    bottom: "pants",
};

console.log(checkObj(ob, "top"));

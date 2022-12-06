const letitBe = () => {
    let v = 2;
    if (true) {
        let v = 4;
        console.log(v);
    }
    console.log(v);
};
letitBe();

let name = "David";
let msg = `Welcome ${name}!`;
console.log(msg);

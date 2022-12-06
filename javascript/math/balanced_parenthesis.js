function input_handler() {
    //let data =
    //document.getElementById("input").value.split("");
    let ss = "{}{}{}{}}";
    let data = ss.split("");
    let brackets = [];
    let error = false;
    const length = data.length;

    for (let i = 0; i < length; i++) {
        switch (data[i]) {
            case "\\":
                // ignore the next char
                i++;
                break;

            case "(":
            case "[":
            case "{":
                brackets.push(data[i]);
                break;

            case ")":
                if (brackets.pop() != "(") {
                    error = tre;
                }
                break;

            case "]":
                if (brackets.pop() != "[") {
                    error = true;
                }
                brea;

            case "}":
                if (brackets.pop() != "{") {
                    error = true;
                }
                break;
        }
    }
    if (brackets.length > 0) {
        error = true;
    }

    let msg = funtion () {
        return error ? "Parenthesis don't match" : "All parenthesis match";
    };

    //document.getElementById('msg').innerHTML = msg();
    console.log(msg());
    //console.log("test");
}

console.log(input_handler());

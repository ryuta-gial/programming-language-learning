function myReplace(str, before, after) {
    // Check if first character of argument "before" is a capital or lowercase letter and change the first character of argument "after" to match the case
    if (/^[A-Z]/.test(before)) {
        after = after[0].toUpperCase() + after.substring(1);
    } else {
        after = after[0].toLowerCase() + after.substring(1);
    }

    // return string with argument "before" replaced by argument "after" (with correct case)
    return str.replace(before, after);
}

// test here
console.log(myReplace('A quick brown fox jumped over the lazy dog', 'jumped', 'leaped'));

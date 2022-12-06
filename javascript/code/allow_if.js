const test = (x, y) => {
    if (x < y) {
        x = x + 1;
        y = y + 1;
        return x + y;
    } else {
        x = x + 2;
        y = y + 2;
        return x + y;
    }
};

console.log(test(8, 5));

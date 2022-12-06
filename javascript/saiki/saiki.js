const saiki = (startNum, endNum) => {
    if (startNum - endNum === 0) {
        return [startNum];
    } else {
        const numbers = saiki(startNum, endNum - 1);
        numbers.push(endNum);
        return numbers;
    }
};
console.log(saiki(6, 9));

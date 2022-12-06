const truncateString = (str, num) => {
    if (str.length > num) {
        return str.slice(0, num) + '...';
    } else {
        return str;
    }
};

console.log(truncateString('A-tisket a-tasket A green and yellow basket', 8));

function findElement(arr, func) {
    return arr.find(func);
}

console.log(findElement([1, 2, 3, 4], (num) => num % 2 === 0));

const chunkArrayInGroups = (arr, size) => {
    if (arr.length <= size) {
        return [arr];
    } else {
        return [arr.slice(0, size)].concat(chunkArrayInGroups(arr.slice(size), size));
    }
};

console.log(chunkArrayInGroups(['a', 'b', 'c', 'd'], 3));

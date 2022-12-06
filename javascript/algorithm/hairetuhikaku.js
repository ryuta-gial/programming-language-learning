function diffArray(arr1, arr2) {
    return arr1.concat(arr2).filter((item) => !arr1.includes(item) || !arr2.includes(item));
}

console.log(diffArray([1, 2, 3, 5], [1, 2, 3, 4, 5]));

const destroyer = (arr, ...valsToRemove) => arr.filter((elem) => !valsToRemove.includes(elem));

console.log(destroyer([1, 2, 3, 1, 2, 3], 2, 3));

function whatIsInAName(collection, source) {
    // "What's in a name? that which we call a rose
    // By any other name would smell as sweet.”
    // -- by William Shakespeare, Romeo and Juliet
    var srcKeys = Object.keys(source);

    // filter the collection
    return collection.filter(function (obj) {
        return srcKeys
            .map(function (key) {
                return obj.hasOwnProperty(key) && obj[key] === source[key];
            })
            .reduce(function (a, b) {
                return a && b;
            });
    });
}

console.log(
    whatIsInAName(
        [
            { first: 'Romeo', last: 'Montague' },
            { first: 'Mercutio', last: null },
            { first: 'Tybalt', last: 'Capulet' },
        ],
        { last: 'Capulet' }
    )
);

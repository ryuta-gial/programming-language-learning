function addTogether(first, second) {
    if (typeof first !== 'number') {
        return undefined;
    }
    const sum = (second) => (typeof second === 'number' ? first + second : undefined);
    return typeof second === 'undefined' ? (second) => sum(second) : sum(second);
}

console.log(addTogether(2, 3));

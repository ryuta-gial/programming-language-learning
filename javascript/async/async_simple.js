function sampleResolve(value) {
    return new Promise(resolve => {
        setTimeout(() => {
            resolve(value * 2);
        }, 2000);
    })
}

function sample() {
    return sampleResolve(5).then(result => {
        return result + 5;
    });
}

sample().then(result => {
    console.log(result); // => 15
});
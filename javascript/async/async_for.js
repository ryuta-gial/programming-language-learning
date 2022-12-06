function sampleResolve(value) {
    return new Promise(resolve => {
        setTimeout(() => {
            resolve(value);
        }, 1000);
    })
}

async function sample() {
    for (let i = 0; i < 5; i += 1) {
        const result = await sampleResolve(i);
        console.log(result);
    }

    return 'ループ終わった。'
}

sample().then((v) => {
    console.log(v); // => 0
                    // => 1
                    // => 2
                    // => 3
                    // => 4
                    // => ループ終わった。
});
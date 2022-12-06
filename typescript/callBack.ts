function doubleAndHandle(num: number, cb: (num: number) => number): void {
    const doubleNum = cb(num * 2);
    console.log(doubleNum);
}
doubleAndHandle(21, (doubleNum) => {
    return doubleNum;
});
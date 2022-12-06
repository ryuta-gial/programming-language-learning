function sum(arr, n) {
    if (n <= 0) {
        return 0;
    } else {
        return sum(arr, n - 1) + arr[n - 1];
    }
}

let ar = [2, 5, 6, 8];

console.log(sum(ar, 3));
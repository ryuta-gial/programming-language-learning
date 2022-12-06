function lcm(arr) {
    let a = arguments;
    let g = (n, m) => (m ? g(m, n % m) : n);
    let l = (n, m) => (n * m) / g(n, m);
    let ans = arr[0];

    for (var i = 1; i < arr.length; i++) {
        ans = l(ans, arr[i]);
    }
    return ans;
}

console.log(lcm([6, 12, 7, 2]));

const arrayshift = (n) => {
    if (n < 1) {
        return [];
    } else {
        const countArray = arrayshift(n - 1);
        //unshift() メソッドは、配列の最初に 1 つ以上の要素を追加し、新しい配列の長さを返します。
        countArray.unshift(n);
        return countArray;
    }
};

console.log(arrayshift(5));

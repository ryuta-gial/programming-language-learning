const limit = 15;

interface Item {
    value: number;
    weight: number;
}

const items: Item[] = [
    { value: 8, weight: 5 },
    { value: 15, weight: 11 },
    { value: 8, weight: 4 },
    { value: 8, weight: 3 },
    { value: 5, weight: 2 },
    { value: 2, weight: 1 },
];

const generate2DArray = (height: number, width: number) => {
    return [...Array(height)].map(() => Array(width).fill(0));
};

function nupZuck(item: Item[], seigen: number, itemsu: number): number {
    //let arr: Item[] = [];
    // 次使用する配列に今回の結果を残すので+1している
    let dp = generate2DArray(itemsu + 1, seigen + 1); // 0行目・0列目を含む二次元配列を生成
    //品数分回す
    for (let col = 0; col < itemsu; col++) {
        //1列目に0を格納するために、+1
        for (let row = 0; row < seigen + 1; row++) {
            //品物の重さより低い場合(else)は0を格納
            if (row >= item[col].weight) {
                // let sum = dp[col][row - item[col].weight] + item[col].value;

                // let itemScore = {
                //     value: item[col].value,
                //     weight: item[col].weight,
                // };
                // const sumall = arr
                //     .map((item) => item.weight)
                //     .reduce((prev, curr) => prev + curr, 0);

                        // arr = arr.filter(
                        //     (n) => n.weight !== item[col - 1].weight
                        // );

                dp[col + 1][row] = Math.max(
                    dp[col][row],
                    dp[col][row - item[col].weight] + item[col].value
                );
            } else {
                //最初はo行目はすべて0 0列目も同じく0
                //品物の重さを超えない数字をすべて0格納
                dp[col + 1][row] = dp[col][row];
            }
        }
    }
    console.log(dp);
    //一番最後に格納されている値
    return dp[itemsu][seigen];
    //return 0;
}
//価値の総和の最大値 出したい答え、val:15+3+2 =20
// 11k 2k 1k = 14kg
console.log(nupZuck(items, limit, items.length));

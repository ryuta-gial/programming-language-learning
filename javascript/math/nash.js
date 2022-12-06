//nナッシュ均衡を求める関数
const calcNash = (obj) => {
    const p1Strategy1 = getMaxOption(obj, "player1", ["AA", "BA"]);
    const p1Strategy2 = getMaxOption(obj, "player1", ["AB", "BB"]);
    const p2Strategy1 = getMaxOption(obj, "player2", ["AA", "AB"]);
    const p2Strategy2 = getMaxOption(obj, "player2", ["BA", "BB"]);
    //2人のプレイヤーが同じ選択をする場合、ナッシュ均衡となる
    const nash = [p1Strategy1, p1Strategy2].filter((elm) => {
        return elm === p2Strategy1 || elm === p2Strategy2;
    });
    return nash;
};

//利得が最大になる選択を決定する関数
const getMaxOption = (obj, player, array) => {
    let maxProfit = -100;
    let maxOption = "";
    //[aa,bb]を一つづつ
    array.forEach((elm) => {
        Object.keys(obj).forEach((key) => {
            //console.log(key);
            console.log(obj[key][player]);
            if (key === elm && obj[key][player] > maxProfit) {
                maxProfit = obj[key][player];
                maxOption = key;
            }
        });
    });
    return maxOption;
};

const result = {
    AA: { player1: -5, player2: -5 },
    AB: { player1: 0, player2: -10 },
    BA: { player1: -10, player2: 0 },
    BB: { player1: -1, player2: -1 },
};

console.log(calcNash(result)); //['AA']

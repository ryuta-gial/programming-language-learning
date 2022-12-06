//nナッシュ均衡を求める関数
const calcNash = (obj) => {
    const p1Strategy1 = getMaxOption(obj, "player1", ["AA", "BA"]);
    const p1Strategy2 = getMaxOption(obj, "player1", ["AB", "BB"]);
    const p2Strategy1 = getMaxOption(obj, "player2", ["AA", "AB"]);
    const p2Strategy2 = getMaxOption(obj, "player2", ["BA", "BB"]);

    let nash = [];
    const p1Prob = calcProbability(obj, "player2");
    const p2Prob = calcProbability(obj, "player1");
    nash.push([p1Prob, p2Prob]);
    if (p1Strategy1 === p2Strategy1) {
        nash.push([1, 1]);
    }
    if (p1Strategy2 === p2Strategy2) {
        nash.push([0, 0]);
    }
    return nash;
};
const getMaxOption = (obj, player, array) => {
    //適当に初期値を設定(利得の最小値より小さくする必要がある)
    let maxProfit = -100;
    let maxOption = "";
    array.forEach((elm) => {
        Object.keys(obj).forEach((key) => {
            if (key === elm && obj[key][player] > maxProfit) {
                maxProfit = obj[key][player];
                maxOption = key;
            }
        });
    });
    return maxOption;
};
const calcProbability = (obj, player) => {
    const prob =
        player === "player1"
            ? (obj["BB"][player] - obj["AB"][player]) /
              (obj["AA"][player] -
                  obj["AB"][player] -
                  obj["BA"][player] +
                  obj["BB"][player])
            : (obj["BB"][player] - obj["BA"][player]) /
              (obj["AA"][player] -
                  obj["BA"][player] -
                  obj["AB"][player] +
                  obj["BB"][player]);

    return prob;
};
const result = {
    AA: { player1: -1, player2: 1 },
    AB: { player1: 1, player2: -1 },
    BA: { player1: 1, player2: -1 },
    BB: { player1: -1, player2: 1 },
};
console.log(calcNash(result)); //['AA']

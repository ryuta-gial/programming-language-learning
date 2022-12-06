//
// ハノイの塔を解く
//
// https://ja.wikipedia.org/wiki/%E3%83%8F%E3%83%8E%E3%82%A4%E3%81%AE%E5%A1%94
//
//    (tower1)    (tower2)      (tower3)
//       |           |             |
//      ===(D1)      |             |
//     =====(D2)     |             |
//    =======(D3)    |             |
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//
// 問題:
//    tower1からtower3に全ての円盤を移動する。
//    円盤は任意の枚数になるが、必ず大きなものの上に小さなものが積まれている。
//
//    移動にあたっては
//       a. 円盤は1枚ずつしか移動できない
//       b. 小さな円盤の上に大きな円盤をのせることはできない
//
// 使い方:
//    % node hanoi.js <枚数>
//
// 例： 円盤4枚
//    % node hanoi.js 4

/**
 * 円盤を移動する
 * @param disc 円盤の番号
 */
function move(disc, from, to) {
    console.log(`Disc:${disc} を ${from} から ${to} に移動`);
}

/**
 * ハノイの塔を解く関数
 * @param n 円盤の枚数
 * @param from 円盤移動元の名前
 * @param to 円盤移動先の塔の名前
 * @param other 円盤移動に使えるもう一本の塔の名前
 */
function hanoi(n, from, to, other) {
    if (n > 0) {
        // fromの1番下にある円盤を除いた上部をotherに動かしておく
        hanoi(n - 1, from, other, to);

        // fromの1番下にある円盤をtoに動かす
        move(n, from, to);

        // 移動しておいた円盤を other から to に移動する
        hanoi(n - 1, other, to, from);
    }
}

let n = 3;
if (process.argv.length > 2) {
    n = Number(process.argv[2]);
}
hanoi(n, "tower1", "tower3", "tower2");
hanoi(n, "tower1", "tower3", "tower2");

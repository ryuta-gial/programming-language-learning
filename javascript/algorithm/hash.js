//まずはデータを格納する関数を作成する
let d = [12, 25, 36, 20, 30, 8, 42];
//データの1.5〜2倍の箱を用意する
let h = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

let k = "";
let j = "";
for (let i = 0; i < 7; ++i) {
    //console.log(d[i]);
    k = d[i] % 11;
    if (h[k] == 0) {
        h[k] = d[i];
    } else {
        //格納できなかったら一つ数を増やして格納できるか確認する
        for (let p = 0; p < 11; ++p) {
            // console.log(p);
            j = k + p;
            if (h[j] == 0) {
                h[j] = d[i];
                break;
            } else if (p == 10 && h[j] !== 0) {
                for (let c = 0; c < 11; ++c) {
                    //console.log("test");
                    if (h[c] == 0) {
                        h[c] = d[i];
                        break;
                    }
                }
            }
        }
    }
    //console.log("test");
}
//データ格納完了
console.log(h);

let jl = "";
for (let g = 0; g < 7; ++g) {
    t = d[g] % 11;
    if (h[t] == d[g]) {
        console.log(d[g] + "が存在しました");
    } else {
        for (let z = 0; z < 11; ++z) {
            jl = g + z;
            if (h[jl] == d[g]) {
                console.log(d[g] + "が存在しました");
            } else if (z == 10 && h[j] !== d[g]) {
                for (let m = 0; m < 11; ++m) {
                    if (h[m] == d[g]) {
                        console.log(d[g] + "が存在しました");
                    }
                }
            }
        }
    }
}

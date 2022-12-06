/** 0からNまでの数字のなかで、文字列として3が現れる整数の数をカウントして
    内訳とともに返す関数です。
 * @param N 文字列として渡ってくる整数
 * @returns 3が現れる整数の数と内訳を文字列として返す
 */
function countThree(N: string): string {
    //文字列として渡ってきた整数を数値に変換する
    const To = Number(N);
    const arr = [];
    for (let i = 0; i <= To; i++) {
        //文字列として3が現れるかを判定し、配列に格納する
        if (String(i).match(/3/)) {
            arr.push(i);
        }
    }
    //3が現れる整数の数と内訳を返す
    let result: string;
    if (arr.length === 0) {
        result = String(arr.length) + '(' + '3は含まれていません' + ')';
    } else {
        result = String(arr.length) + '(' + arr.join(',') + ')';
    }
    return result;
}

console.log(countThree('1000'));

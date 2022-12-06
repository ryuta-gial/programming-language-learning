// P78 コインの組み合わせ
fn main() {
    //i64 マイナスも含めた桁数をカバー
    let price: i64 = 3950;
    let count500: i64 = 10;
    let count100: i64 = 3;
    let count50: i64 = 10;

    //期待する金額
    //500円玉の枚数を繰り返し調べる
    for i500 in 0..(count500 + 1) {
        //100円玉の枚数を繰り返し調べる
        for i100 in 0..(count100 + 1) {
            //50円玉の枚数を繰り返し調べる
            for i50 in 0..(count50 + 1) {
                //総額を計算
                //i500とかには0から11 or 4が入る
                let total: i64 = i50 * 50 + i100 * 100 + i500 * 500;

                if price == total {
                    println!("500円×{}+100円×{}+50円×{}={}", i500, i100, i50, total);
                }
            }
        }
    }
}

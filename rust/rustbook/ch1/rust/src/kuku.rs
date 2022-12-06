//九九の表 P64
fn main() {
    for y in 1..10 {
        let s = (1..10)
                //配列の変換を指定 フォーマット
                //ラムダ関数
                //空白で文字列を右寄せする
                .map(|x| format!("{:3}",x * y))
                 //結果を新しい配列<Vec><String>に集める
                .collect::<Vec<String>>().join(",");
        println!("{}",s);
    }
}

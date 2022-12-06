fn fdf(fdf: Type) -> RetType {
    unimplemented!();
}

//クロージャーを使っている
//let 名前 = |引数| 定義;
//シーザー暗号 アルファベット順番を3文字ずらして、文字列を作成
// ABC は DEFを指定している
fn encrypt(text: &str, shift: i16) -> String {
    let a = 'A' as i16;
    let is_az = |c| 'A' <= c && c <= 'Z';
    let conv = |c| (((c - a + shift + 26) % 26 + a) as u8) as char;
    let enc1 = |c| if is_az(c) { conv(c as i16) } else { c };
    return text.chars().map(|c| enc1(c)).collect();
}

fn main() {
    let enc = encrypt("I LOVE YOU.", 3);
    let dec = encrypt(&enc, -3);
    println!("{} =>{}", enc, dec);
}

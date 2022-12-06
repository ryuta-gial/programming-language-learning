use rand::Rng;
use std::io;

fn main() {
    println!("数を当ててね");
    let secret_number = rand::thread_rng().gen_range(1..101);
    println!("number:{}", secret_number);
    println!("予想を入力してー");
    let mut guess = String::new();
    io::stdin()
        .read_line(&mut guess)
        .expect("行の読み込みに失敗");
    println!("次のように予想しました:{}", guess);
}

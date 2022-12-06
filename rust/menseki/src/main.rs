fn main() {
    const PI: i32 = 3;
    let redius = 10;
    //円周の計算
    let cir = 2 * PI * redius;
    println!("円周 = {}", cir);
    //面積の計算
    let area = PI * redius * redius;
    println!("面積 = {}", area);
}

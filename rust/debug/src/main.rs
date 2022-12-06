//Rustではderiveを使用して構造体や列挙型などに振る舞いを追加することができます。
// デバック出力を行えるように振る舞いを追加します。
#[derive(Debug)]
struct Person<'a> {
    name: &'a str,
    age: u8,
}

fn main() {
    let name = "Peter";
    let age = 27;
    let peter = Person { name, age };
    // println!マクロを使用する際に{:?}というデバック出力用のフォーマットを指定することでデバック出力を表示させることができます。

    print!("{:#?}", peter);
    // person{
    //  name: "Peter",
    //  age:27,
    // }
}

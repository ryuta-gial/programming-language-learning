fn main() {
    //1から100まで繰り返す
    // for i in 1..101 {
    //     //条件を一つづつ判定する
    //     if i % 3 == 0 && i % 5 == 0 {
    //         println!("FizzBuzz");
    //     } else if i % 3 == 0 {
    //         println!("Fizz");
    //     } else if i % 5 == 0 {
    //         println!("Buzz");
    //     } else {
    //         println!("{}", i);
    //     }
    // }
    for i in 1..101 {
        if i % 3 == 0 && i % 5 == 0 {
            println!("FizzBuzz");
        } else if i % 3 == 0 {
            println!("Fizz");
        } else if i % 5 == 0 {
            println!("Buzz");
        } else {
            println!("{}",i);
        }
    }
}

fn main() {
    //{}は文字列に変換
    //""の間が一区切り
    //31days
    println!("{} days", 31);
    //変換の場所を指定
    //Alice, this isBob.Bob,this is Alice
    println!("{0}, this is {1}.{1}, this is {0}", "Alice", "Bob");
    //5つの半角空白のあとに"1"が入る。
    //"     1"
    println!("{number:>width$}", number = 1, width = 6);
}

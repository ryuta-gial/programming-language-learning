use anyhow::{bail, ensure, Context, Result};

use clap::Clap;
use std::fs::File;
//コードの先頭にて事前にこれを定義しておく事で、コード内で必要とされる std:: が省略可能となります。
use std::io::{stdin, BufRead, BufReader};
use std::path::PathBuf;
//clapクレートのderiveマクロを使用
#[derive(Clap, Debug)]
#[clap(
    name = "My RPN program",
    version = "1.0",
    author = "Shimizu",
    about = "Super awesome sample RPM calculator"
)]
//構造体の宣言
struct Opts {
    #[clap(short, long)]
    verbose: bool,

    #[clap(name = "FILE")]
    formula_file: Option<PathBuf>,
}

//構造体の宣言
struct RpnCalculator(bool);

//メソッド
impl RpnCalculator {
    //関連関数
    pub fn new(verbose: bool) -> Self {
        Self(verbose)
    }
    //
    pub fn eval(&self, formula: &str) -> Result<i32> {
        //空白で分割するときは、split_whitespace
        //文字反転しRevイテレータが生成できるrev()を通し、それらを寄せ集めて任意の型に変換を試みるcollect()という組み合わせになります。
        //collectも他の言語同様、操作している反復子を目的のオブジェクトに集めることができます。集める先のオブジェクト型の指定には、::<_>でメソッドに型引数を与えたり、代入先の変数に型を明示することで推論させるような方法があります。
        //今回の例ではcollect::<Vec<_>>()と指定しているので、Iteratorの各オブジェクトが、Vecオブジェクトに集められます。
        //ベクタ(vec)型の異なる要素を含むことはできません。要素数は可変です。インデックスに変数を使用することができます。
        let mut tokens = formula.split_whitespace().rev().collect::<Vec<_>>();
        self.eval_inner(&mut tokens)
    }

    fn eval_inner(&self, tokens: &mut Vec<&str>) -> Result<i32> {
        //関連関数
        let mut stack = Vec::new();
        let mut pos = 0;
        //while let Some(token) の条件でwhile文
        //pop: 最後の要素を安全に取り出す
        //push: 後方に要素を追加
        while let Some(token) = tokens.pop() {
            pos += 1;

            if let Ok(x) = token.parse::<i32>() {
                stack.push(x);
            } else {
                let y = stack.pop().context(format!("invalid synatax at {}", pos))?;
                let x = stack.pop().context(format!("invalid synatax at {}", pos))?;

                let res = match token {
                    "+" => x + y,
                    "-" => x - y,
                    "*" => x * y,
                    "/" => x / y,
                    "%" => x % y,
                    _ => bail!("invalid token at {}", pos),
                };
                stack.push(res);
            }
            //"-v"オプションが指定されている場合は、この時点でのトークンとスタックの状態を出力
            if self.0 {
                println!("{:?} {:?}", tokens, stack);
            }
        }
        ensure!(stack.len() == 1, "invalid syntax");
        Ok(stack[0])
    }
}

fn main() -> Result<()> {
    let opts = Opts::parse();

    if let Some(path) = opts.formula_file {
        let f = File::open(path)?;
        let reader = BufReader::new(f);
        run(reader, opts.verbose)
    } else {
        let stdin = stdin();
        let reader = stdin.lock();
        run(reader, opts.verbose)
    }
}

//ファイル読み込み関数
fn run<R: BufRead>(reader: R, verbose: bool) -> Result<()> {
    //構造体のインスタンスを作成
    let calc = RpnCalculator::new(verbose);

    for line in reader.lines() {
        let line = line?;
        match calc.eval(&line) {
            Ok(answer) => println!("{}", answer),
            Err(e) => eprint!("{:#?}", e),
        }
    }
    Ok(())
}
#[cfg(test)]
mod tests {
    use super::*;

    #[test]
    fn test_ok() {
        //第一引数と第二引数が正しいかのチェック
        //assert_eq!(2 * 2, 4);
        let calc = RpnCalculator::new(false);
        assert_eq!(calc.eval("5").unwrap(), 5);
        assert_eq!(calc.eval("50").unwrap(), 50);
        assert_eq!(calc.eval("-50").unwrap(), -50);
        assert_eq!(calc.eval("2 3 +").unwrap(), 5);
        assert_eq!(calc.eval("2 3 *").unwrap(), 6);
        assert_eq!(calc.eval("2 3 -").unwrap(), -1);
        assert_eq!(calc.eval("2 3 /").unwrap(), 0);
        assert_eq!(calc.eval("2 3 %").unwrap(), 2);
    }
    #[test]
    #[should_panic]
    fn test_ng() {
        let calc = RpnCalculator::new(false);
        assert!(calc.eval("").is_err());
        assert!(calc.eval("1 1 1 +").is_err());
        assert!(calc.eval("+ 1 1").is_err());
    }
}

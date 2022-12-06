//スラッシュ
const validationDateInput = (val: string): string => {
        console.log(val);

        let input: string = val;
        let result: string = "";
        let pirCnt = 0;
        //入力文字制限
        input = input
            //1.全角数字を半角数字へ変換
            .replace(/[０-９．]/g, function (s) {
                return String.fromCharCode(s.charCodeAt(0) - 65248);
            })
            //2.全角ピリオド、および。および・を半角スラッシュに変換
            .replace(/[‐－―ー]/g, "/")
            // 2回目以降のピリオドは無効とし除去する
            .replace(/．|。|・|\./g, function () {
                pirCnt++;
                if (pirCnt > 1) {
                    return "";
                } else {
                    return "/";
                }
            })
            //先頭の文字を制御
            .replace(/(?!^\-)[^\d\.]/g, "")
            .replace(/(^\.)/g, "")
            .replace(/(^0\d)/g, "");

        // const format = /^\d{2}$/;
        //先頭が1,2で4桁
        const format = /^[1-2]\d{3}$/;
        const thisYear = moment(new Date(), "yyyy", true);
        const inputCheckYear = moment(input, "yyyy", true);
        if (
            format.test(input) &&
            inputCheckYear.isValid() &&
            !moment(inputCheckYear).isAfter(thisYear)
        ) {
            input = input + "/";
        }
        result = input;
        return result;
    };

    //入力数値を全角→半角へ変更、小数点の桁数などを制御
    function getNumberScale(numVal: string, scale?: number) {
        let result: string = "";
        let pirCnt = 0;
        //入力文字制限
        numVal = numVal
            //1.全角数字を半角数字へ変換
            .replace(/[０-９．]/g, function (s) {
                return String.fromCharCode(s.charCodeAt(0) - 65248);
            })
            //2.全角ピリオド、および。および・を半角ピリオドに変換
            .replace(/[‐－―ー]/g, "-")
            // 2回目以降のピリオドは無効とし除去する
            .replace(/．|。|・|\./g, function () {
                pirCnt++;
                if (pirCnt > 1) {
                    return "";
                } else {
                    return ".";
                }
            })
            //先頭の文字を制御
            .replace(/(?!^\-)[^\d\.]/g, "")
            .replace(/(^\.)/g, "");
        //入力文字列チェック
        const search = numVal.search(/^[-]?[0-9]+(\.[0-9]+)?$/);
        //数値型に格納する際に末尾が[.]だと格納できないので0.1を追加
        const dotEndChange = function (numberOrStr: string) {
            return numberOrStr.replace(/(\.)/g, ".1");
        };
        const dotEnd = /\.$/;
        result = numVal;
        //[数字][.][数字]であり、桁数指定判定
        if (search === 0 && scale !== 0) {
            const dotDivision = numVal.split(".");
            if (dotDivision.length === 2) {
                //指定桁数を返す
                result = dotDivision[0] + "." + dotDivision[1].slice(0, scale);
            }
            // } else if (dotEnd.test(numVal) === true && isCountWord !== numVal.length) {
            //     //文字を削除した際に、同じ処理が走らないように文字数を保持
            //     setIsCountWord(numVal.length)
            //     result = dotEndChange(numVal);
        }
        return result;
    }


//日付スラッシュ

function bar(evt)
{
    var v = this.value;
    if (v.match(/^\d{2}$/) !== null) {
        this.value = v + '/';
    } else if (v.match(/^\d{2}\/\d{2}$/) !== null) {
        this.value = v + '/';
    }

}

//日付スラッシュ

 handleExpInput(e) {

    // ignore invalid input
    if (!/^\d{0,2}\/?\d{0,2}$/.test(e.target.value)) {
      return;
    }

    let input = e.target.value;

    if (/^\d{3,}$/.test(input)) {
      input = input.match(new RegExp('.{1,2}', 'g')).join('/');
    }

    this.setState({
      expDateShow: input,
    });
  }


//123456789という入力しか許さない react imask

  mask: function (value) {
    return /^\d*$/.test(value) &&
      value.split('').every(function(ch, i) {
        var prevCh = value[i-1];
        return !prevCh || prevCh < ch;
      });
  }
});
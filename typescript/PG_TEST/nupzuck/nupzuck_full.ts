interface ItemType {
    w: number;
    v: number;
}

interface MemoType {
    maxValue: number;
    subset: ItemType[];
}

function knapsack(items: ItemType[], capacity: number) {
    //const memo:MemoType[] = [];
    //こういう感じで格納している
    //[[{},{}], [{},{}] ]
    const memo: Array<Array<MemoType>> = [];
    //アイテムの数だけ回す
    for (let i = 0; i < items.length; i++) {
        //console.log(i);
        let row = [];
        //重さ制限まで回す 1〜15
        for (let cap = 1; cap <= capacity; cap++) {
            //console.log(row);
            //関数で生成された値を配列に格納
            row.push(getSolution(i, cap, memo, items));
        }
console.log(memo);
        memo.push(row);
    }
    //console.log(memo);
    return getLast(memo);
}

//最後に調べる
function getLast(memo: Array<Array<MemoType>>) {
    //memo配列の中身
    const lastRow = memo[memo.length - 1];
    //console.log(lastRow[8]);
   console.log(lastRow);
    return lastRow[lastRow.length - 1];
}

//アイテム数と重さ制限までの1つづの値が与えられる。 row = 0 - 3... , cap = 1-15
function getSolution(
    row: number,
    cap: number,
    memo: Array<Array<MemoType>>,
    items: ItemType[]
) {
    //オブジェクトを生成
    const NO_SOLUTION = { maxValue: 0, subset: [] };
    // 重さ制限 -1
    const col = cap - 1;
    //アイテムを選択
    const lastItem = items[row];
    //重さ制限 - アイテムの重さ  -4 -3 -2- 1 0 1 2 3...
    const remaining = cap - lastItem.w;
    //console.log(remaining);
    //rowが1以上なら memo配列を格納

    //console.log(memo);
    if (memo[0]) {
       // console.log(memo[0][4].subset);
    }
    
      //最初の回転時には格納されない
  //以前格納されているmemoの値を参照
  //最初に値が入るのは、前回remainingのcheckを通過した、-4,-3,-2,-1のcolの4から入る
  //{ maxValue: 8, subset: [ { w: 5, v: 8 } ] }
    
    const lastSolution =
        row > 0 ? memo[row - 1][col] || NO_SOLUTION : NO_SOLUTION;
    /* const lastSolution2 = */
    /*     row > 0 ? memo[row - 1][col] : NO_SOLUTION; */

    //console.log(lastSolution);

    //rowが1以上でmemo配列に値があるなら、memo配列を格納
    const lastSubSolution =
        row > 0 ? memo[row - 1][remaining - 1] || NO_SOLUTION : NO_SOLUTION;

   // const lastSubSolution2 = row > 0 ? memo[row - 1][remaining - 1] || 1 : 2;
    //console.log(memo);
    //console.log(lastSubSolution2);
  //アイテムの重さとキャパシティカウントが同じになるまで
  //処理はここまで。
    if (remaining < 0) {
        //console.log(lastSolution);
        //console.log("gogogogo");
        //memo配列を返す
        return lastSolution;
    }
      //1console.log(remaining);

    //console.log(lastSolution.maxValue);
    //console.log(lastSubSolution.maxValue);
    //オブジェクトのkeyの値を格納
    const lastValue = lastSolution.maxValue;
   //console.log(lastValue);
    const lastSubValue = lastSubSolution.maxValue;

    //console.log(lastSubValue);
    //価値に新しい値をを追加
    let newValue = lastSubValue + lastItem.v;
     //console.log(newValue);
    if (newValue >= lastValue) {
        //console.log("cocoha");
        // copy the subset of the last sub-problem solution
        let _lastSubSet = lastSubSolution.subset.slice();
        //console.log(lastItem);
        //console.log(_lastSubSet);
        _lastSubSet.push(lastItem);

        //数を格納
        return { maxValue: newValue, subset: _lastSubSet };
    } else {
        // console.log("doko");
        //console.log(lastSolution);
        return lastSolution;
    }
}

const items2 = [
    { w: 5, v: 8 },
    { w: 11, v: 15 },
    { w: 4, v: 4 },
    // { v: 8, w: 3 },
    // { v: 5, w: 2 },
    // { v: 2, w: 1 },
];
// test
// const items2 = [
//   { w: 70, v: 135 },
//   { w: 73, v: 139 },
//   { w: 77, v: 149 },
//   // { w: 80, v: 150 },
//   // { w: 82, v: 156 },
//   // { w: 87, v: 163 },
//   // { w: 90, v: 173 },
//   // { w: 94, v: 184 },
//   // { w: 98, v: 192 },
//   // { w: 106, v: 201 },
//   // { w: 110, v: 210 },
//   // { w: 113, v: 214 },
//   // { w: 115, v: 221 },
//   // { w: 118, v: 229 },
//   // { w: 120, v: 240 },
// ];

// const capacity = 750;
const capacity = 15;
console.log(knapsack(items2, capacity));

/* result 
{ maxValue: 1458,
  subset: 
   [ { w: 70, v: 135 },
     { w: 77, v: 149 },
     { w: 82, v: 156 },
     { w: 90, v: 173 },
     { w: 94, v: 184 },
     { w: 98, v: 192 },
     { w: 118, v: 229 },
     { w: 120, v: 240 } ] }
*/

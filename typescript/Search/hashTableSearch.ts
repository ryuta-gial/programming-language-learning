//ハッシュ表探索
//データ格納
let recordsNumber = 10;
let hashTable = Array(recordsNumber);
let pointerTable = Array(recordsNumber);
let homeRecordLength = 5;
//Array.fill は、配列の全要素に同じ値を設定する関数です。
hashTable.fill(-1);
pointerTable.fill(-1);

let datas = [100, 200, 101, 102, 103, 104, 300, 400];

for (let i = 0; i < datas.length; i++) {
  let hashVal = datas[i] % homeRecordLength;
  let rehashVal = hashVal;

  if (hashTable[hashVal] != -1) {
    rehashVal = homeRecordLength;

    while (hashTable[rehashVal] != -1) {
      rehashVal++;
    }

    let pointer = pointerTable[hashVal];

    if (pointer == -1) {
      pointerTable[hashVal] = rehashVal;
    } else {
      while (pointerTable[pointer] != -1) {
        pointer = pointerTable[pointer];
      }
      pointerTable[pointer] = rehashVal;
    }
  }

  hashTable[rehashVal] = datas[i];
}
console.log(hashTable);
console.log(pointerTable);

//データ検索
let searchData = 400;
let hashVal = searchData % homeRecordLength;
let rehashVal = hashVal;
let flg = -1;

while (rehashVal != -1) {
  if (hashTable[rehashVal] == searchData) {
    flg = rehashVal;
    break;
  } else {
    rehashVal = pointerTable[rehashVal];
  }
}

if (flg > -1) {
  console.log(flg);
} else {
  console.log("該当データなし");
}

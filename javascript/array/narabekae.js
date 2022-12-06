const data = [
     {title:"今日の日記", content:"今日はお腹が空いた", category:"diary"},
     {title:"プレスリリースです", content:"Youtuberになりました！", category:"news"},
     {title:"今日の日記", content:"今日はお腹が空いた", category:"diary"},
     {title:"来月開催！", content:"イベントやります！", category:"news"}]


const categorires = data.map(item=>item.category); // categoryを抜き出す
const categorylist = [...new Set(categorires)];// 重複した要素を削除
const result = {};
categorylist.forEach(item => {
  result[[item]] = data.filter(i => i.category === item)
})


//
//DBから取得した処置配列の並び替え
//const newMoEvents = [...moEvents].reverse();

console.log(result);
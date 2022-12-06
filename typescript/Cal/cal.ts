const week = ["日", "月", "火", "水", "木", "金", "土"];
const today = new Date();

let showDate = new Date(today.getFullYear(), today.getMonth(), 1);

//初期表示
window.onload = function () {
  showProcess(today);
};
//前の月表
function prev() {
  showDate.setMonth(showDate.getMonth() - 1);
  showProcess(showDate);
}

//次月表示
function next() {
  showDate.setMonth(showDate.getMonth() + 1);
  showProcess(showDate);
}

//カレンダー表示
function showProcess(date: Date) {
  //今日の日付から年と月を取得
  let year = date.getFullYear();
  let month = date.getMonth();
  document.querySelector("#header").innerHTML =
    year + "年　" + (month + 1) + "月";

  let calendar = createProcess(year, month);
  document.querySelector("#calendar").innerHTML = calendar;
}

//カレンダー作成
function createProcess(year: number, month: number) {
  //曜日
  let calendar = "<table><tr class='dayOfWeek'>";

  for (let i = 0; i < week.length; i++) {
    calendar += "<th>" + week[i] + "</th>";
  }

  calendar += "</tr>";

  let count = 0;
  //曜日を取得する
  let startDayOfWeek = new Date(year, month, 1).getDay();
  //日を取得する
  let endDate = new Date(year, month + 1, 0).getDate();
  let lastMonthEndDate = new Date(year, month, 0).getDate();
 //四捨五入
  let row = Math.ceil((startDayOfWeek + endDate) / week.length);

  //1行づつ設定
  for (let i = 0; i < row; i++) {
    calendar += "<tr>";
    //1colum単位で設定
    for (let j = 0; j < week.length; j++) {
      if (i == 0 && j < startDayOfWeek) {
        //1行目で1日まで先月の日付を設定
        calendar +=
          "<td class='disabled'>" +
          (lastMonthEndDate - startDayOfWeek + j + 1) +
          "</td>";
      } else if (count >= endDate) {
        //最終行で最終日以降、翌月の日付を設定
        count++;
        calendar += "<td class='disabled'>" + (count - endDate) + "</td>";
      } else {
        //当月の日付を曜日に照らし合わせて設定
        count++;
        if (
          year == today.getFullYear() &&
          month == today.getMonth() &&
          count == today.getDate()
        ) {
          calendar += "<td class= 'today'>" + count + "</td>";
        } else {
          calendar += "<td>" + count + "</td>";
        }
      }
    }
    calendar += "</tr>";
  }
  return calendar;
}

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <script type="text/javascript" src="0-1.js"></script>
 <link rel="stylesheet" href="./css/validationEngine.jquery.css" type="text/css"/>
 <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
 <script src="../../../js/jquery-1.9.1.js" type="text/javascript"></script>
 <script src="js/languages/jquery.validationEngine-ja.js" type="text/javascript" charset="utf-8"></script>
 <script src="js/jquery.elevatezoom.js" type="text/javascript"></script>
 <script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<title>数字の入力に対する処理のプログラム(次ページのプログラム参考)</title>
</head>

<body>

 <!-- image zoom　本体-->
 <script type="text/javascript">
     $(function(){
      jQuery("#hoge").validationEngine();
     });
</script>
<script>
 $(function(){
  jQuery("#basiczoom").elevateZoom();
 });
</script>

 <!--
jQuery-Validation-Engine

Jquery Image Zoom
で作った
-->

 <script type="text/javascript">
  $(function(){
   $.ajax({
    url: 'sample3.xml',
    dataType: 'xml',
    success : function(data){
     $("item",data).each(function(){
      $("dl").append("<dt><a href='"+$("link",this).text()+"'>"+$("title",this).text()+"</a></dt><dd>"+$("description",this).text()+"</dd>");
     })
    }
   })
  })
 </script>

 <script>

  function jijyo(a){

   return a*a;

  }
 </script>


 <script>

  document.write("３の２乗は"+jijyo(3)+"です。<br>");
  document.write("５の２乗は"+jijyo(5)+"です。<br>");

 </script>

 <script>
  function menseki(tate,yoko){

   return "面積は" + tate*yoko + "m<sup>2</sup>です。<br>";

  }



  document.write( menseki(10,20) );


 </script>

 <script>

  //曜日取得
  var today = new Date();
  var week  = today.getDay();

  //条件分岐
  switch (week) {
   case 0: document.write("今日は日曜日です！<br>"); break;
   case 1: document.write("今日は月曜日です！<br>"); break;
   case 2: document.write("今日は火曜日です！<br>"); break;
   case 3: document.write("今日は水曜日です！<br>"); break;
   case 4: document.write("今日は木曜日です！<br>"); break;
   case 5: document.write("今日は金曜日です！<br>"); break;
   default : document.write("今日は土曜日です！<br>"); break;
  }

 </script>
 <script>
  //var 配列名 = new Array()配列を宣言します。配列名は任意に付けることができます

  var yobi = new Array();

  yobi[0] = "日曜日";
  yobi[1] = "月曜日";
  yobi[2] = "火曜日";
  yobi[3] = "水曜日";
  yobi[4] = "木曜日";
  yobi[5] = "金曜日";
  yobi[6] = "土曜日";


  var today = new Date();
  var week  = today.getDay();

  document.write("今日は"+yobi[week]+"です！<br>");

 </script>

 <script>

  var num=0;    //連番を入れる変数
  var gokei=0;  //連番を合計した数字を入れる変数


  //gokeiが５桁(10000)より少ない間繰り返す
  //1+2+3+…で幾つまで足すと合計が５桁になるか」
  while ( gokei < 10000 ){
   num++;
   gokei = gokei + num;
  }

  //５桁に達した時点の数を書き出し

  document.write(num);



 </script>
 <script>

  koshin();




 </script>



 <form>
  <input type="button" value="テキスト" onclick="reWrite(0)">
  <input type="button" value="HTMLタグ" onclick="reWrite(1)">
 </form>

 <div id="str">このタグの中身を書き換えます。</div>

 <script>

  function reWrite(num)
  {
   if (document.getElementById)
   {
    if (num==0)
    {
     document.getElementById("str").textContent="<b>テキスト</b>の書換え";
     //id名の付いたタグのテキストを書き換えます。書き換える文字列がテキストのみの場合に使用
    }
    else
    {
     document.getElementById("str").innerHTML="<b>タグ</b>を含む書換え";
     // id名の付いたタグのテキストを書き換えます。 書き換える文字列にHTMLタグを含めることができます。
    }
   }
  }

 </script>
 <dl></dl>

 <p><img id="basiczoom" src="./js/image1.png" data-zoom-image="./js/image1.jpg"></p>

<form action="test2.php" method="post">

偶数、奇数？（数字で入力）<br>
<input type="text"name="nen" style="ime-mode: disabled;"  ><br><br>

どっちが大きい？（数字で入力）<br>
<input type="text"name="nen1" style="ime-mode: disabled;"  >-<input type="text"name="nen2" style="ime-mode: disabled;"  ><br><br>

正解か間違いか？（数字で入力）<br>
<input type="text"name="nen3" style="ime-mode: disabled;"  ><br><br>


<?php
/*ime-mode: auto;
状況に応じて自動設定。初期値。

ime-mode: active;
初期値が日本語入力モード。

ime-mode: inactive;
初期値が英数字入力モード。

ime-mode: disabled;
英数字入力モードで固定されます

*/
?>




<input type="submit" name="submit"value="送信">

</form>

<form action="../../menu/0-0.html" method="post"/>

<input type="submit" name="submit"value="メニューへ">

</form>

<br><br>

</body>
</html>

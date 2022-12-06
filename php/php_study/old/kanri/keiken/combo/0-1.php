<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>PHP練習</title>
<link type="text/css" href="jquery.datetimepicker.css" rel="stylesheet" />
</head>


<h1>入力</h1>
<?php
//include('../../../PAS/DBconnect.php');

require_once('../../../PAS/Database.class.php');
require_once('../../../PAS/conf.php');
$db = new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);

$sql_b = "select * from m_tanto order by id";

$record = $db->select($sql_b) or die();

//$count_b = mysql_query($sql_b,$mysql_con);
//$res = mysql_num_rows($count_b);
//while($row= mysql_fetch_assoc($count_b))
//{
 //$test[]=$row;
//}
//var_dump($test);
$jsonTest=json_encode($record);
//var_dump($jsonTest);
?>
<body>
<!--
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
-->
<script type="text/javascript" src="incsearch.js"></script>
<script src="../../../js/jquery-1.9.1.js" type="text/javascript"></script>
<script type="text/javascript" src="jquery.datetimepicker.js"></script>
<script type="text/javascript" language="javascript">
 var tes=<?php echo $jsonTest;?>;
  <!--
  function calc_total(){
    kingaku = 0;
    for (i=0; i<document.myform.length-1; i++){
      if (document.myform.elements[i].checked){
        kingaku += eval(document.myform.elements[i].value);
      }
    }
    document.myform.goukei.value = kingaku + "　円";
  }

  var list = ['Java', 'JavaScript', 'Python', 'Perl', 'Ruby', 'PHP',
    'Seasar2(Java Framework)', 'Spring Framework(Java Framework)', 'Ruby on Rails(Ruby Framework)',
    'Zend Framework(PHP Framework)', 'Symfony(PHP Framework)', 'Catalyst(Perl Framework)'];

  var start = function(){
    new IncSearch.ViewList(
        'text',      // 入力が行われるエレメントのID
        'view_area', // 検索結果を表示するエレメントのID
        list);       // 検索対象のリスト
  };
  window.addEventListener ?
      window.addEventListener('load', start, false) :
      window.attachEvent('onload', start);
  //-->
</script>

<script>
$(function(){
$('#hoge').datetimepicker();
});
</script>

<style type="text/css">
  <!--
  strong {
    font-weight: normal;
  }
  strong.high1 {
    background-color: #FFFF99
  }
  strong.high2 {
    background-color: #CCFFFF;
  }
  strong.high3 {
    background-color: #CCFF99;
  }
  strong.high4 {
    background-color: #FFCC99;
  }
  -->
</style>

<?php
if(!isset($_COOKIE["usermode"])) {
  echo "クッキーは運ばれてません<br>";
}else{
    echo "クッキーは運ばれました<br>";
  }
echo 'クッキーの中身は:'.$_COOKIE["usermode"];
echo " <br>"
?>
<br>
<?="PHPの書き方"?>
</br>
<?PHP echo "この書き方で表示されます。"; ?>

<form name="myform" action="0-2.php" method="post">
好きな日は?<br>
<input type="text"name="ren"id="hoge" ><br><br>
<p>
下記に入力すると、一覧から部分一致で検索し、一致する列を表示します。(スペース区切りで複数入力可)
</p>
<div style="margin-left:30px; margin-top:4px;">
<input id="text" type="text" name="pattern" value="" autocomplete="off" size="40" /><br />
    <!-- 検索結果の表示エリア -->
<div id="view_area"></div>
</div>
<br><br>

    <table border="1" cellpadding="4">
      <tr><td>
          <input type="checkbox" value="500" onClick="calc_total()">
          ラーメン(500円)</td></tr>
      <tr><td>
          <input type="checkbox" value="600" onClick="calc_total()">
           チャーハン(600円)</td></tr>
            <tr><td>
          <input type="checkbox" value="900" onClick="calc_total()">
          八宝菜(900円)</td></tr>
           <tr><td align="center">
          合計金額:
          <input tyoe ="text" name= "goukei">
        </td></tr>
    </table>

 <table>
  <tr>
   <th>親ジャンル</th>
   <td>
 <select name="parentS" onChange="createChildOptions(this.form)" style="width:200px;">
  <option value="" selected="selected">-------------------</option>
  <?php
  $sql_b = "select * from m_shift order by IDNO";
  //$count_b = mysql_query($sql_b,$mysql_con);
  $count_b = $db->select($sql_b) or die();
  //$res = mysql_num_rows($count_b);
  //while($value_b=mysql_fetch_array($count_b,MYSQL_ASSO))
  foreach($count_b as $key1 => $key)
  {
   if($key['IDNO']==$zokcd) {
    print "<option value=\"{$key['IDNO']}\" selected=\"selected\">{$key['name']}</option>";
   } else {
    print "<option value=\"{$key['IDNO']}\">{$key['name']}</option>";
   }
  }
  ?>
 </select></td>
 </tr>

 <tr>
  <th>子ジャンル</th>
  <td><!--表示位置--><div id="childS"></div></td>
 </tr>
 </table>

<script type="text/javascript">
 var idName="childS";
 var tes=<?php echo $jsonTest;?>;


 function createChildOptions(frmObj) {
  /* 親ジャンルを変数pObjに格納 */
  var pObj=frmObj.elements["parentS"].options;
  /* 親ジャンルのoption数 */
  var pObjLen=pObj.length;
  var htm="<select name='childS' style='width:200px;'>";

  for(i=0; i<pObjLen; i++ ) {
   /* 親ジャンルの選択値を取得 */
   if(pObj[i].selected>0){
    var itemLen = tes.length;
    for(j=0; j<itemLen;j++){
     var i=String(i);
     //if(i==test[j].id){
     if(tes[j].id.indexOf(i)!==-1){
      htm+="<option value='"+j+"'>"+tes[j].tanto+"<\/option>";
     }
    }
//lert(test[j].id)
   }

  }
  htm+="<\/select>";
  /* HTML出力 */
  document.getElementById(idName).innerHTML=htm;

 }
 /* 選択されている値をアラート表示 */
 function chkSelect(frmObj) {
  var s="";
  var idxP=frmObj.elements['parentS'].selectedIndex;
  var idxC=frmObj.elements['childS'].selectedIndex;
  if(idxP>0){
   s+="親ジャンルの選択肢："+frmObj.elements['parentS'][idxP].text+"\n";
   if(idxC > 0){
    s+="子ジャンルの選択肢："+frmObj.elements['childS'][idxC].text+"\n";
   }else{
    s+="子ジャンルが選択されていません\n";
   }
  }else{
   s+="親ジャンルが選択されていません\n";
  }
  alert(s);
 }

 /* onLoad時にプルダウンを初期化 */
 function init(){
  htm ="<select name='childS' style='width:200px;'>";
  htm+="<option value=''>--選択--<\/option>";
  htm+="<\/select>";
  /* HTML出力 */
  document.getElementById("childS").innerHTML=htm;
 }

 /* ページ読み込み完了時に、プルダウン初期化を実行 */
 window.onload=init;

 var myFruit = document.getElementById("parentS");

 var i=5;
 
 $(function() {
  var $children = $('.children');
  var original = $children.html();

  $('.parent').change(function() {
    var val1 = $(this).val();

    $children.html(original).find('option').each(function() {
      var val2 = $(this).data('val');
      if (val1 != val2) {
        $(this).not('optgroup,.msg').remove();
      }
    });

    if ($(this).val() === '') {
      $children.attr('disabled', 'disabled');
    } else {
      $children.removeAttr('disabled');
    }

  });
});

 </script>
<select class="parent" name="日付" required>
 <option value="" class="msg" disabled selected>-----日付を選択-----</option>
 <option value="1/11(水)">1/11(水)</option>
 <option value="2/5(日)">2/5(日)</option>
 <option value="3/3(金)">3/3(金)</option>
</select>

<select class="children" name="講座名" disabled required>
 <option value="" class="msg" disabled selected>-----講座名を選択-----</option>
 <optgroup label="音楽">
  <option value="餅つき大会" data-val="1/11(水)">餅つき大会</option>
  <option value="音楽理論" data-val="1/11(水)">音楽理論</option>
  <option value="エレキギター講座" data-val="1/11(水)">エレキギター講座</option>
  <option value="エレキギター講座" data-val="2/5(日)">エレキギター講座</option>
  <option value="ドラム講座" data-val="2/5(日)">ドラム講座</option>
  <option value="エレキベース講座" data-val="3/3(金)">エレキベース講座</option>
  <option value="ボイストレーニング" data-val="3/3(金)">ボイストレーニング</option>
 </optgroup>
 <optgroup label="ウェブ">
  <option value="HTMLとCSS" data-val="1/11(水)">HTMLとCSS</option>
  <option value="JavaScript" data-val="1/11(水)">JavaScript</option>
  <option value="HTMLとCSS" data-val="2/5(日)">HTMLとCSS</option>
  <option value="PHP" data-val="2/5(日)">PHP</option>
  <option value="Qiita" data-val="3/3(金)">Qiita</option>
 </optgroup>
</select>
 
 
 

<?php
$text = "戻る";
if(empty($_SERVER['HTTP_REFERER'])){
echo $text;
}
else{
  echo'<a href"' .$_SERVER['HTTP_REFERER']. '">' .$text. "</a>";
}
?>
<br><br>
</body>
</html>
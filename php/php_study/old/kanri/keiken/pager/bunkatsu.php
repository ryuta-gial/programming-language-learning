<html>
<meta charset="utf-8">
<body>
<form action = "" method="post">
性別：<input type="text" name="nm">
<input type="hidden" name="page_num" value="0">
<input type="submit" name="exec" value="検索">
</form>

<?PHP
ini_set( 'display_errors', 1 );
ini_set('error_reporting', E_ALL);

$mysql_con=mysqli_connect('localhost','root','root','ryudb');
mysqli_set_charset($mysql_con,"utf8");
if($mysql_con==false){
	print"DB_connect eror";
	exit;
}

$page_num = $_POST["page_num"];
$nm = $_POST["nm"];

if(isset($nm)){
   }
 else
   {
	$nm = $_GET["nm"];
	}

if(isset($page_num)){
   }
 else
   {
	$page_num = $_GET["page_num"];
	}
$sql = "select name,sex,dob from bunkatsu where sex like '%$nm%' order by name limit " . $page_num*10 . ", 10";

echo $sql."</br>";
if (!$res = mysqli_query($mysql_con,$sql)){
echo "SQLエラー<BR>" ;
exit ;
}

echo "<table border=1>" ;
echo "<tr><td>name</td><td>sex</td><td>dob</td></tr>" ;
while($row = mysqli_fetch_array($res)){
echo "<tr>" ;
echo "<td>" . $row["name"] . "</td>" ;
echo "<td>" . $row["sex"] . "</td>" ;
echo "<td>" . $row["dob"] . "</td>" ;
echo "</tr>" ;
}
echo "</table>" ;

//検索条件に該当する全データの件数取得
$sql = "select count(*) from bunkatsu where sex like '$nm%' order by name" ;
if (!$res = mysqli_query($mysql_con,$sql)){
echo "SQLエラー<BR>" ;
exit ;
}
$row = mysqli_fetch_array($res) ;
$cnt = $row[0] ;

if(!$cnt > 10)
echo ceil($cnt / 10), "ページの中の", $page_num + 1, "ページ目を表示<br>" ;

if ($page_num != 0) {
$Next= $page_num -1;
echo "<a href ='./bunkatsu.php?page_num={$Next}&nm={$nm}'>前の10件</a>";
}
if (($page_num+ 1)*10 < $cnt) {
$Next=$page_num +1;
echo "<a href ='./bunkatsu.php?page_num={$Next}&nm={$nm}'>次の10件</a>";
}

mysqli_free_result ($res) ;

?>
</body>
</html>

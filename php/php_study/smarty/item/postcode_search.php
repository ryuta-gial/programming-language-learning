<?php
require_once('conf.php');
require_once('Database.class.php');

$db = new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if(isset($_GET['zip1']) === true && isset($_GET['zip2']) === true ){
	$zip1 = $_GET['zip1'];
	$zip2 = $_GET['zip2'];
	
	$query = "SELECT"
	." pref, "
	." city, "
	." town "
	." FROM  "
	." postcode "
	." WHERE  "
	." zip = " . $db->str_quote($zip1 . $zip2)
	." LIMIT 1 ";
	
	$res = $db->select($query);

//出力結果がajaxに渡される
echo ($res !=="" && count($res) !==0) ? $res[0]['pref'] . $res[0]['city'] . $res[0]['town'] : '';
}else{
	echo "no";
	}	
?>

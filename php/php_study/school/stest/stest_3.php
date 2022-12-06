<?php
//2
$db_host ='localhost';
$db_name ='person_db';
$db_user ='root';
$db_pass ='';

//データベースへ接続する
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if($link !== false){
	
	$query = "SELECT * FROM person_tb";
	$res = mysqli_query($link, $query);

	$data = array();
	//結果を配列に格納する
	while($row = mysqli_fetch_assoc($res)){
	//lineArray3[] = $lineArray2;
	$data[] = $row;
	//array_push($resArr,$row);
	//下記は上記と同じ動作
	}
	 //arsort($data);
	//arsort:降順(逆順)で表示
}else{
	echo "データベースの接続に失敗しました";
}
//データベースへの接続を閉じる
mysqli_close($link);
//3
echo '<table border="1px">';
echo'<tr>';
echo '<td>名前</td>';
echo '<td>年齢</td>';
echo '<td>使用言語</td>';
echo '</tr>';
foreach($data as $key => $val)
{
	echo "<tr>";
	echo  "<td>".$val['name']."</td>"."<td>". $val['age'] ."歳"."</td><td>". $val['language'] ."</td>" ;
	echo "</tr>";
}
echo "</table>";
echo "<br/>";
echo "<br/>";
//3
$err_msg1='';
$err_msg2='';
$err_msg3='';
$err_msg4='';

$name   = (isset($_POST['name'])=== true)?$_POST['name']:'';
$age      = (isset($_POST['age'])=== true)?$_POST['age']:'';
$sex       = (isset($_POST['sex'])=== true)?$_POST['sex']:'';
$language  = (isset($_POST['language'])=== true)?$_POST['language']:'';

if(isset($_POST["send"]) === true){
	if($name ==='')$err_msg1 = '名前を入力してください';
	if($age        ===''){
		$err_msg2 = '年齢を入力してください';
	}elseif(preg_match('/^[0-9]+$/',$age) ===0){
		$err_msg2 = '年齢を正しく入力してください';
	}elseif($age<20) {
		$err_msg2 = '未成年は入力できません';
		}
		
	if($sex ==='')$err_msg3 = '性別を入力してください';
	
	if($language ==='')$err_msg4 = '使用言語を入力してください';
			
	$tmp_image = $_FILES['image'];
	
	
if($err_msg1 ==='' && $err_msg2 ===''&& $err_msg3 ===''){
		
	//エラーがなく、サイズが0ではないか
	if($tmp_image['error'] === 0 && $tmp_image['size'] !==0 ){
		//正しくサーバーにアップされているかどうか
		if(is_uploaded_file($tmp_image['tmp_name']) === true){
			//正しくサーバーにアップされているかどうか
			$image_info = getimagesize($tmp_image['tmp_name']);
			$image_mime = $image_info['mime'];
			$upfile = $_FILES['image']['tmp_name'];
			$imgdat = file_get_contents($upfile);
			$imgdat = mysql_real_escape_string($imgdat);
			
			//画像サイズが利用できるサイズ以内かどうか
			if($tmp_image['size'] > 1048576){
				echo "アップロードできる画像のサイズは、1MBまでです<br><br>";
				//画像の形式が利用できるタイプかどうか
				}else if(preg_match('/^image\/jpeg$/', $image_mime) ===0 ){
				echo "アップロードできる画像の形式は、JPEG形式だけです<br><br>";
				//time:現在時刻をUnixエポック(1970年1月1日00:00:00GMT)からの通算秒として返す(Unixタイムスタンプ)
				}else if (move_uploaded_file($tmp_image['tmp_name'] , './upload_' . time() . '.jpg')=== true){
				echo "画像のアップロードが完了しました<br><br>";
			}
		}
	}
}


if($err_msg1 ==='' && $err_msg2 ===''&& $err_msg3 ===''&& $err_msg4 ===''){
$db_host ='localhost';
$db_name ='person_db';
$db_user ='root';
$db_pass ='';

/*
CREATE TABLE t_person_tb (
  id int not null auto_increment primary key ,
  count int(20) not null,
  age int(11) not null ,
  image blob NOT NULL,
  sex varchar(20) not null ,
  language varchar(20) not null
);

*/
//データベースへ接続する
$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if($link !== false){
	$query = " INSERT INTO t_person_tb("
				." name  ,"
				." age ,"
				." image ,"
				." sex  ,"
				." language  "
				.")VALUES("
				."'".mysqli_real_escape_string($link, $name) ."',"
				."'".mysqli_real_escape_string($link, $age) ."',"
				."'".$imgdat."',"
				."'".mysqli_real_escape_string($link, $sex) ."',"
				."'".mysqli_real_escape_string($link, $language) ."'"
				.")";
			$res = mysqli_query($link, $query);
			if($res !== false){
			$msg ='書き込みに成功しました';
			}else{
				$err_msg ='書き込みに失敗しました';
			}		
}else{
echo "データベースの接続に失敗しました";
}
mysqli_close($link);
}

}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta chrset="Utf-8">
 <title>小テスト3日目</title>
</head>
<body>
<form method="post" action="" enctype="multipart/form-data">
名前:<input type="text" name="name" value="<?PHP echo $name;?>"/>

<?php echo $err_msg1; ?><br/>

年齢:<input type="text" name="age" value="<?PHP echo $age;?>"/>


<?PHP echo $err_msg2;?><br/>
画像:<input type="file" name="image"/>
<br>

<input type="radio" name="sex" value="men" checked> 男性
<input type="radio" name="sex" value="girl" > 女性
<?PHP echo $err_msg3;?><br/>



<select name='language'>
<option value=''selected></option>
<option value'C/C++'>C/C++</option>
<option value='PHP' >PHP</option>
<option value='Perl'>Perl</option>
<option value='Rudy'>Rudy</option>
</select>
<?PHP echo $err_msg4;?><br/>

<input type="submit" name="send" value="クリック"/>
</form>
<br/><br/>

<?php
//5
/*
CREATE TABLE IF NOT EXISTS `c_person_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `count` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ;
*/
$kazu = (isset($_POST['kazu'])=== true)?$_POST['kazu']:'';

if(isset($_POST["count"]) === true){
$db_host ='localhost';
$db_name ='person_db';
$db_user ='person_user';
$db_pass ='person_pass';

$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if($link !== false){
	if($kazu > 0 ){
	$query_c = " update c_person_tb set count =count +1 where id = '1' ";
	$res_c = mysqli_query($link, $query_c);
	$query_c2 = "SELECT * FROM c_person_tb";
	$res_c2  = mysqli_query($link,$query_c2);
	$data3 = array();
	while($row3 = mysqli_fetch_assoc($res_c2)){
		array_push($data3, $row3);
		}
			
				}else{
				$query_c = " INSERT INTO c_person_tb("
				." count  "
				.")VALUES("
				."'1'"
				.")";
			$res = mysqli_query($link, $query_c);
			$kazu=1;
			}
	}else{
	echo "データベースの接続に失敗しました";
}
foreach($data3 as $key => $val)
{
	echo $val['count'] ;
}

mysqli_close($link);
}

?>


<form method="post" action="" enctype="multipart/form-data">
<input type="hidden" name="kazu" value="<?php echo $kazu;?>"/>
<input type="submit" name="count" value="DBカウント"/>
</form>


<?php
$db_host ='localhost';
$db_name ='person_db';
$db_user ='root';
$db_pass ='';


//データベースへ接続する
$link2 = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if($link2 !== false){

$query2 = "SELECT * FROM t_person_tb";
	$res2   = mysqli_query($link2,$query2);
	$data2 = array();
	while($row2 = mysqli_fetch_assoc($res2)){
		array_push($data2, $row2);
	}

	arsort($data2);
	//arsort 降順(逆順)で表示
}else{
	echo "データベースの接続に失敗しました";
}
//データベースへの接続を閉じる
mysqli_close($link2);


if($msg !=='') echo'<p>'.$msg. '<p>';
if($err_msg !=='')echo '<p style="cplor:#f00;">' .$err_msg. '</p>';
foreach($data2 as $key => $val)
{
	if($val['image'] ===""){
	$img_c = "";
	}else{
	$img_c = "<img src=\"img_get.php?id=" . $val['id'] . "\">";
         }
	echo $val['name'] .'　'. $val['age'] .'　'. $img_c.'　'. $val['sex'] . '　'. $val['language'] . '<br/>';
}
?>
</body>
</html>



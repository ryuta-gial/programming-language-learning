<?php
class CheckError{
public $errArr = array();
//初期化
public function __construct() {
$this->errArr = array(
'name' => '',
 'age' => '',
'sex' => '',
'language' => '',
'image' => '',
); 
}

public function errorCheck( $dataArr, $fil) {
$this->dataArr = $dataArr;
$this->nameCheck(); $this->sexCheck(); 
$this->ageCheck(); $this->languageCheck(); 
$this->imageCheck( $fil);
return $this->errArr; }
public function nameCheck() {
if ( $this->dataArr['name'] === '' ) $this->errArr['name'] = '名前を入力してください'; 
}
public function sexCheck() {
if ( $this->dataArr['sex'] === '' ) $this->errArr['sex'] = '性別を選択してください'; 
}
public function ageCheck() {
if ( preg_match( ' /^[0-9]{1,3}$/ ' , $this->dataArr["age"] ) === 0 ) {
$this->errArr["age"] = '数字で年齢を入力してください'; 
}
elseif( intval( $this->dataArr["age"] ) < 20 ) {
$this->errArr["age"] = '20 歳未満は応募できません'; 
}
}
public function imageCheck( $fil)
 {
if( $_FILES["image"]["error"] !== 4 )
{
$tmp_image = $_FILES['image'];
if ( $tmp_image['error'] === 0 && $tmp_image['size'] !== 0 ) {
if ( is_uploaded_file( $tmp_image['tmp_name'] ) === true ) {
$image_info = getimagesize( $tmp_image['tmp_name'] );
$image_mime = $image_info['mime']; 
}
if ( $tmp_image['size'] > 1048576 ) {
$this->errArr["image"] = "アップロードできる画像のサイズは 1MB までです";
} elseif ( preg_match ( '/^image\/jpeg$/',$image_mime ) === 0 ){ 
$this->errArr["image"] = "アップロードできる画像の形式は JPEG 形式だけです";
}
}
} 
}
public function languageCheck() {
if ( $this->dataArr['language'] === "0" ) $this->errArr['language'] = '言語を入力してください'; 
}
public function getErrorFlg() {
$err_check = true;
foreach( $this->errArr as $key => $value ) {
if( $value !== '' ) $err_check = false;
 }
return $err_check; 
}
}
?>
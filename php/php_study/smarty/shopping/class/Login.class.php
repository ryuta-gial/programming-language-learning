<?php
class Login
{
	public $id = '';
	public $pw = '';
	public $db =NULL;

public function __construct ($db)
{
	$this->db  = $db;
}

//カテゴリーリストの取得
public function checkLogin($id,$pw)
{
	$table = 'login ';
	$col =' id, pw ';
	$where   = 'id = ? and pw  = ? ';
	$arrVal  = array($id , $pw);
	//var_dump($arrVal);
	$res = $this->db->select($table, $col, $where,$arrVal );
	return $res;
	}

}
?>

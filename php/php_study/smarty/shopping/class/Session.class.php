<?php
class Session
{
	public $session_key = ' ';
	public $db = NULL;


public function __construct ($db)
{
	//セッションをスタートする
	session_start();
	//セッションIDを取得する
	$this->session_key = session_id();
	//DBの登録
	$this->db  = $db;
}

public function checkSession()
{
	//セッションIDのチェック
	$customer_no = $this->selectSession();
	//var_dump($customer_no);
	//セッションIDがある(過去にショッピングカートに来たことがある)
	if($customer_no !== false) {
		//var_dump($db);
		$_SESSION['customer_no'] = $customer_no;
	}else{
		//セッションIDがない(初めてこのサイトに来ている)
		$res = $this->insertSession( $this->db );
		if($res === true ){
			$_SESSION['customer_no'] = $this->db->getLastId();
		}else{
			$_SESSION['customer_no'] = '';
		}	
		}
	}
	private function selectSession()
	{
		$table = 'session ';
		$col   = ' customer_no ';
		$where = ' session_key = ? ' ;
		$arrVal = array($this->session_key );
		
		$res = $this->db->select($table, $col, $where,  $arrVal );
		return(count($res) !== 0) ? $res[0]['customer_no'] : false;
	}
	
	private function insertSession()
	{
		$table = ' session ' ;
		$insData = array(' session_key ' => $this->session_key );
		$res = $this->db->insert( $table,  $insData);
		return $res;
	}
}
?>
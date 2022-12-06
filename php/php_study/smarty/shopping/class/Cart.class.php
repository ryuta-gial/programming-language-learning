<?php
class Cart
{
	public $db =NULL;

public function __construct ($db = NULL)
{
	$this->db  = $db;
}

//カートに登録する(必要な情報は、誰が$customer_no、何を($item_id))
public function insCartData($customer_no,  $item_id)
{
	$table = ' cart ';
	$insData = array('customer_no' => $customer_no, ' item_id' =>$item_id);
	var_dump($insData);
	return $this->db->insert($table, $insData);
	}
	//カートの情報を取得する(必要な情報は、誰が$customer_no。必要な商品情報は名前、商品画像、金額
	public function getCartData($customer_no)
	{
		//SELECT
		// c.crt_id,
		//i.item_id,
		//i.item_name,
		//i.price,
		//i.image';
		//FROM
		// cart c
		//LEFT JOIN
		// item i
		//ON
		//c.item_id = i.item_id ';
		//WHERE
		// c.customer_no = ?AND c.delete_flg = ?';
		
		$table = 'cart c LEFT JOIN item i ON c.item_id = i.item_id ';
		$column = ' c.crt_id,  i.item_id,  i.item_name, i.price, i.image' ;
		$where   = ' c.customer_no = ? AND c.delete_flg = ? ';
		$arrVal   = array($customer_no , 0);
		//var_dump($table, $column, $where, $arrVal);
		return $this->db->select($table, $column, $where, $arrVal);
	}
	//カート情報を削除する:必要な情報はどのカートを($crt_id)
	public function delCartData($crt_id)
	{
		$table = 'cart' ;
		$insData = array('delete_flg' => 1 );
		$where =' crt_id = ?';
		
		$arrWhereVal = array($crt_id);
		
		return $this->db->update($table, $insData, $where, $arrWhereVal);
	}
//アイテム数と合計金額を取得すｒ
public function getItemAndSumPrice($customer_no)
{
	//合計金額
	//SELECT
	// SUM(i.price) AS totalPrice ";
	//FROM
	// cart c
	//LEFT JOIN
	//item i
	//ON
	// c.item_id = i.item_id"
	//WHERE
	//c.customer_no = ? AND c.delete_flg =?';
	
	$table = "cart c LEFT JOIN item i ON c.item_id = i.item_id ";
	$column = " SUM(i.price) AS totalPrice ";
	$where  =' c.customer_no = ? AND c.delete_flg = ?';
	$arrWhereVal = array($customer_no, 0);
	
	$res = $this->db->select($table, $column, $where, $arrWhereVal);
	$price = ($res !== false && count($res)!== 0)?$res[0]['totalPrice'] : 0;
	
	//アイテム数
	$table = 'cart c ';
	$column =' SUM(num) AS num ';
	$res = $this->db->select($table, $column, $where, $arrWhereVal);
	
	$num = ($res !== false && count($res)!== 0) ? $res[0]['num']:0;
	
	return array($num, $price);
}

}
	?>

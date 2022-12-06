<?php
class Item
{
	public $cateArr = array();
	public $db =NULL;

public function __construct ($db)
{
	$this->db  = $db;
}

//カテゴリーリストの取得
public function getCategoryList()
{
	$table = 'category ';
	$col ='ctg_id, category_name ';
	$res = $this->db->select($table, $col );
	return $res;
	}
	//商品リストを取得する
	public function getItemList($ctg_id)
	{
		//カテゴリーによって表示させるアイテムをかえる
		$table = ' item ';
		$col = 'item_id, item_name, price,image, ctg_id';
		$where   = ($ctg_id !=='') ? '  ctg_id = ? ':'';
		$arrVal   = ($ctg_id !=='')? array($ctg_id) :array();
		
		$res = $this->db->select($table, $col, $where, $arrVal);
		
		return ($res !== false && count($res) !==0) ? $res : false;
}
	//商品の詳細情報を取得する
	public function getItemDetailData($item_id)
	{
		$table = ' item ';
		$col = 'item_id, item_name, detail,  price, image, ctg_id';
		
		$where   = ($item_id !=='')? ' item_id = ? ':'';
		//カテゴリーによって表示させるアイテムをかえる
		$arrVal   = ($item_id !=='')? array($item_id) :array();
		
		$otherOption['limit']  =1;
		
		$res = $this->db->select($table, $col, $where, $arrVal, $otherOption);
		return ($res !== false && count($res) !==0) ? $res : false;
}

//検索されたワード商品の詳細情報を取得する
	public function getItemLookData($word)
	{		
		$table = ' item ';
		$col = 'item_id, item_name,  price, image, ctg_id';
		$where  .= ($word !=='')? ' item_name like ? ':'';
		$arrVal   = ($word !=='')? array($word) :array();
		
		$res = $this->db->select($table, $col, $where, $arrVal);
		return ($res !== false && count($res) !==0) ? $res : false;
}

}
?>

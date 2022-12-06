<?php
class Common
{
	private $dataArr =array();
	private $errArr  =array();

	public function __construct()
	{
	}
	
	public function errorCheck($dataArr)
	{
		$this->dataArr = $dataArr;
		//クラス内のメソッドを読み込む
		$this->createErrorMessage();
		
		$this->itemNameCheck();
		$this->priceCheck();			
		return $this->errArr;
	}

	private function createErrorMessage()
	{
		foreach($this->dataArr as  $key => $val)
		{
		$this->errArr[$key] = '';
		}
	}
	

	private function itemNameCheck()
	{
		if($this->dataArr['item_name'] === '') $this->errArr['item_name'] = '商品名を入力してください';
	}
	
	private function priceCheck()
	{ 
	//var_dump($this->dataArr['tel3']);
	//var_dump(preg_match('/^¥d{1,6}$/' , $this->dataArr['tel3']));
	//var_dump(strlen($this->dataArr["tel1"].$this->dataArr["tel2"].$this->dataArr["tel3"]));
		if(
		preg_match('/^\d/' ,$this->dataArr['price'] ) === 0 || $this->dataArr['price'] === '') 
		//strlen($this->dataArr["tel1"].$this->dataArr["tel2"].$this->dataArr["tel3"]) >= 12) 
		{
		$this->errArr['price'] = '価格は半角数字で入力 してください';
		}
	}
	public function getErrorFlg()
	{
	$err_check = true;
	foreach($this->errArr as $key => $value)
	{
	if($value !=='' )$err_check = false;
	}
	return $err_check;
	}
	
	//参照渡し
	public function htmlEncode( &$dataArr)
	{
		foreach( $dataArr as $key => &$data)
		{
			if( is_array( $data) !== true)
			{
		//htmlスペシャルキャラズ:&(アンバサンド)->&amp:,"(ダブルクォート)→&quot:'(シングルクオート)'→&#039:(もしくは&apos;)、<(小なり)→&Lt;,>(大なり)→&gt;
		   $dataArr[$key] = htmlspecialchars($data, ENT_QUOTES);
			}
			//配列の場合は再帰な処理が必要になる
			else{
				$this->htmlEncode($data);
			}
			}
			
		}
	}
?>

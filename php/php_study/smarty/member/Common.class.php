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
		
		$this->familyNameCheck();
		$this->firstNameCheck();
		$this->sexCheck();
		$this->birthCheck();
		$this->zipCheck();
		$this->addCheck();
		$this->telCheck();
		$this->mailCheck();
		$this->trafficCheck();
			
		return $this->errArr;
	}

	private function createErrorMessage()
	{
		foreach($this->dataArr as  $key => $val)
		{
		$this->errArr[$key] = '';
		}
	}
	

	private function familyNameCheck()
	{
		if($this->dataArr['family_name'] === '') $this->errArr['family_name'] = 'お名前(氏)を入力してください';
	}
	
	private function firstNameCheck()
	{        //エラーチェックを入れる
		if($this->dataArr['first_name'] === '') $this->errArr['first_name'] = 'お名前(名)を入力してください';
	}
	
	private function sexCheck()
	{
		if($this->dataArr['sex'] === ' ') $this->errArr['sex'] = '性別を選択してください';
	}

	private function birthCheck()
	{
		if($this->dataArr['year'] === ' ') $this->errArr['year'] = '生年月日の年を選択してください';

		if($this->dataArr['month'] === ' ') $this->errArr['month'] = '生年月日の月を選択してください';

		if($this->dataArr['day'] === ' ') $this->errArr['day'] = '生年月日の日を選択してください';
		
	if(checkdate($this->dataArr["month"],$this->dataArr['day'],$this->dataArr["year"]) === false)
	{
		
		$this->errArr['year'] = '正しい日付を入力してください。';
		
	}
	if(strtotime($this->dataArr['year'] ."-". $this->dataArr['month'] ."-". $this->dataArr['day'] ) - strtotime("now") > 0 )
	{
		$this->errArr['year'] = '正しい日付を入力してください。';
	
	}
	}
	private function zipCheck(){
	if(preg_match('/^[0-9]{3}$/' , $this->dataArr['zip1'] )=== 0){
			 $this->errArr['zip1'] = '郵便番号の上は半角数字3桁で入力してください。';
			 }
	if(preg_match('/^[0-9]{4}$/' , $this->dataArr['zip2'] )=== 0){
			 $this->errArr['zip2'] = '郵便番号の下は半角数字4桁で入力してください。';
			 }
			 
	}	
	private function addCheck()
	{
		if($this->dataArr['address'] === '') $this->errArr['address'] = '住所を入力してください';
	}
	private function mailCheck()
	{
		//var_dump(preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9¥._-])*@([a-zA-Z0-9_-])+[a-zA-Z0-9¥._-]+$/', $this->dataArr["email"]));
		if(preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9¥._-])*@([a-zA-Z0-9_-])+[a-zA-Z0-9¥._-]+$/',  $this->dataArr["email"]) === 0)
		{
		$this->errArr['email']  = 'メールアドレスを正しい形式で入力してください';
		}
		}
	
	private function telCheck()
	{ 
	//var_dump($this->dataArr['tel3']);
	//var_dump(preg_match('/^¥d{1,6}$/' , $this->dataArr['tel3']));
	//var_dump(strlen($this->dataArr["tel1"].$this->dataArr["tel2"].$this->dataArr["tel3"]));
		if(
		preg_match('/^\d{1,6}$/' ,$this->dataArr['tel1'] ) === 0 || preg_match('/^\d{1,6}$/' , $this->dataArr['tel2'] ) === 0 || 
		preg_match('/^\d{1,6}$/' , $this->dataArr['tel3']) === 0 || strlen($this->dataArr["tel1"].$this->dataArr["tel2"].$this->dataArr["tel3"]) >= 12) 
		//strlen($this->dataArr["tel1"].$this->dataArr["tel2"].$this->dataArr["tel3"]) >= 12) 
		{
		$this->errArr['tel1'] = '電話番号は、半角数字で11桁以内で入力してください';
		}
	}
	private function trafficCheck()
{
	if($this->dataArr["traffic"] === array() )
	{
		$this->errArr["traffic"] = '最低１つの交通機関を入力してください。';
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

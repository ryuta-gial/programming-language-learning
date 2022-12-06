<?php
$Data = array(
	'name' =>"matumoto",
	'age' =>"32",
	'pref' => "chiba"
);

$output = new student($Data);

$count = 1;
$output->showData($count);

class student
{

	//変数の設定
	public $name ='';
	public $age  ='';
	public $pref ='';

	//この関数だけは必要
	//(部品生成時自動的に呼び出される)
	//コンストラクタ
	//書き方は__(アンダースコア2つ)
	public function __construct($data)
	{
		$this->name = $data["name"];
		$this->age  = $data["age"];
		$this->pref = $data["pref"];
	}
	public function getName()
	{

		echo $this->name ." 's profile<br>";
	}
	
	public function getAge()
	{

		echo $this->name ." 　is　" . $this->age . "years old<br>";
	}
	public function getPref()
	{
		echo $this->name. "　from　" . $this->pref . "<br>";
	}


	public function showdata($tbl_flg)
	{
	if($tbl_flg ===1){
	       echo "<table border='1'>";
		echo "<caption>" . $this->name ."'s prfile</caption>";
		echo "<tr><th>name</th><th>age</th><th>pref</th></tr>";
		echo "<tr><td>" . $this->name . "</td><td>" . $this->age . "</td><td>".$this->pref ."</td></tr>";
		echo "</table><br>";
			
		}else{
			
			echo $this->name ." 's profile<br>";
			echo $this->name ." 　is　" . $this->age . "years old<br>";
			echo $this->name. "　from　" . $this->pref . "<br><br>";

}
}
		
?>


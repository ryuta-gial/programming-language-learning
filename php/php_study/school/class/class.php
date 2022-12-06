<?php


//オブジェクトは関連する複数の変数と関数を一纏めにして部品のように扱えるもの
//クラスはその設計図
//cf.関数
//単一の処理

//部品生成:部品の名前はsaito
//dreamthearという設計書(クラス)をもとに
//saitoという部品(インスタンス)を作る
$saito = new dreamTheater("tomohiko");
$nakata = new dreamTheater("nakata");
var_dump($saito);
//echo $name;
//$saito['name']
//privateなのでエラー
//echo $saito->name."<br>";


//これだとコンピュータが迷う
//setAge("32");

$saito->setAge("32");
//echo $daito->age."<br>";
$saito->setLanguage("PHP");

//var_dump(saito);


$saito->showTable();


$tanakaData = array(
	'name' => "tanaka",
	'age'  => "26",
	'language' => "java"
);

echo "<br><br>";


$tanaka = new dreamTheater2($tanakaData);

//これを実行するとエラー
//echo $tanaka->name;


$tanaka->getAge();
$tanaka->getLanguage();

$tanaka->showTable();

$personData = array(
	'name' =>"satou ichirou",
	'age' =>"50",
	'language' => "C#"
);

$satou = new dreamTheater3($personData);
$satou->viewMessage();

//クラス内で記述した変数はプロパティ、関数はメソッドと呼ぶ
class dreamTheater
{

	//変数の設定
	private $name ='';
	private $age  ='';
	private $language ='';

	//この関数だけは必要
	//(部品生成時自動的に呼び出される)
	//コンストラクタ
	//書き方は__(アンダースコア2つ)
	public function __construct($name)
	{
		//$thisはオブジェクトの中の
		//name,$nameは外からはいってきたname
		$this->name = $name ;
	}
	
	public function setAge($age)
	{
		$this->age = $age;
		echo $this->name . "uses". $this->age ." years lod<br>";

	}

	public function setLanguage($language)
	{
		$this->language = $language;
		echo $this->name . "uses". $this->language."<br>";
	}

	public function showTable()
	{
		echo "<table border='1'>";
		echo "<caption>" . $this->name ."'s prfile</caption>";
		echo "<tr><th>name</th><th>age</th><th>language</th></tr>";
		echo "<tr><td>" . $this->name . "</td><td>" . $this->age . "</td><td>".$this->language ."</td></tr>";
		echo "</table>";
	}
}

class dreamTheater2
{
	//変数の設定
	protected $name = '';
	protected $age  = '';
	protected $lanfuage ='';

	public function __construct($data)
	{
		$this->name = $data["name"];
		$this->age  = $data["age"];
		$this->language = $data["language"];

	}

	public function getAge()
	{
		echo $this->name ." is  " . $this->age . "years old<br>";
	}
	public function getLanguage()
	{
		echo $this->name. "uses" . $this->language . "<br>";
	}
	public function showTable()
	{
		echo "<table border='1'>";
		echo "<caption>" . $this->name ."'s prfile</caption>";
		echo "<tr><th>name</th><th>age</th><th>language</th></tr>";
		echo "<tr><td>" . $this->name . "</td><td>" . $this->age . "</td><td>".$this->language ."</td></tr>";
		echo "</table>";
	}
	}
//継承
class dreamTheater3 extends dreamTheater2{
	
	public function __construct($data)
	{
		parent::__construct($data);
	}

	public function viewMessage($flg = true)
	{
		if($flg === true){
		//親のクラスを呼べる
		$this->showTable();
		
		}
		else
		{
			echo $this->name ."<br>";
			echo $this->age ."<br>";
			echo $this->language. "<br>";
		}
	}

}



?>

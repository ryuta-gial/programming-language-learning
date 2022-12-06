<?php
//file_put_contents($filePath, mb_convert_encoding(file_get_contents($filePath), 'UTF-8', 'SJIS'));
$file = new SplFileObject ('class.csv');
$file->setFlags(SplFileObject::READ_CSV);
$test = array();
foreach($file as $key => $value)
{
	//if($lines[0]=== null)continue;
	//var_dump($lines);

                   $test[] = $value; 

}

$Data = array(
	'name' =>"matumoto",
	'age' =>"32",
	'pref' => "chiba"
);

$myData = array(
	'name' =>"shimizu",
	'age' =>"32",
	'pref' => "chiba"
);

$output = new student($Data);
$shimizu = new shimizu($myData);


/*
$output->getName();
$output->getAge();
$output->getPref();
*/


$count = 1;
$output->showData($count);

$count2 = 2;
$shimizu->showData($count2);

foreach($test as $t_val){
$file_r = new fileread($t_val);
$file_r->showData($t_val);

}

$count3 = 2;
$keisyo = new fileread2($t_val);
$keisyo->viewData($count3);
//1-1
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
		
}

//1-2
class shimizu
{

	//変数の設定
	public $myname ='';
	public $myage  ='';
	public $mypref ='';

	//この関数だけは必要
	//(部品生成時自動的に呼び出される)
	//コンストラクタ
	//書き方は__(アンダースコア2つ)
	public function __construct($data)
	{
		$this->myname = $data["name"];
		$this->myage  = $data["age"];
		$this->mypref = $data["pref"];
	}
	public function getName()
	{

		echo $this->myname ." 's profile<br>";
	}
	
	public function getAge()
	{

		echo $this->myname ." 　is　" . $this->myage . "years old<br>";
	}
	public function getPref()
	{
		echo $this->myname. "　from　" . $this->mypref . "<br>";
	}


	public function showData($tbl_flg2)
	{
	if($tbl_flg2 ===1){
	       echo "<table border='1'>";
		echo "<caption>" . $this->myname ."'s prfile</caption>";
		echo "<tr><th>name</th><th>age</th><th>pref</th></tr>";
		echo "<tr><td>" . $this->myname . "</td><td>" . $this->myage . "</td><td>".$this->mypref ."</td></tr>";
		echo "</table><br>";
			
		}else{
			
			echo $this->myname ." 's profile<br>";
			echo $this->myame ." 　is　" . $this->myage . "years old<br>";
			echo $this->myname. "　from　" . $this->mypref . "<br><br>";

}
}
		
}

//1-3
class fileread
{

	//変数の設定
	public $f_name ='';
	public $f_age  ='';
	public $f_pref ='';
	public $f_tbl_flg ='';
	
	//この関数だけは必要
	//(部品生成時自動的に呼び出される)
	//コンストラクタ
	//書き方は__(アンダースコア2つ)
	public function __construct($fdata)
	{

		$this->f_name = $fdata[0];
		$this->f_age  = $fdata[1];
		$this->f_pref = $fdata[2];
		$this->f_tbl_flg = $fdata[3];
	}
	public function getName()
	{

		echo $this->f_name ." 's profile<br>";
	}
	
	public function getAge()
	{

		echo $this->f_name ." 　is　" . $this->f_age . "years old<br>";
	}
	public function getPref()
	{
		echo $this->f_name. "　from　" . $this->f_pref . "<br>";
	}


	public function showData($test)
	{

	if($test[3]==="1"){
	       echo "<table border='1'>";
		echo "<caption>" . $this->f_name ."'s prfile</caption>";
		echo "<tr><th>name</th><th>age</th><th>pref</th></tr>";
		echo "<tr><td>" . $this->f_name . "</td><td>" . $this->f_age . "</td><td>".$this->f_pref ."</td></tr>";
		echo "</table><br>";
			
		}else{
			
			echo $this->f_name ." 's profile<br>";
			echo $this->f_name ." 　is　" . $this->f_age . "years old<br>";
			echo $this->f_name. "　from　" . $this->f_pref . "<br><br>";

}
}
		
}
//1-4
class fileread2 extends fileread{
	public function __construct($data)
	{
	parent::__construct($data);
	}
public function viewData($test)
	{

	if($test==="1"){
	       //親クラスを呼び出し
		$this>showData($t_val);
		}else{
			echo "これは継承クラスで呼びました<br>";
			}

}
}
?>


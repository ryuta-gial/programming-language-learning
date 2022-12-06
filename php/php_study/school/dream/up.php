<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<meta http-equiv="Content-Type" charset="utf-8"/>
	<title>予習</title>
	<style>


	</style>
</head>


<body>
<?PHP
class myClass
{

    public function myKaibun()
    {
		$count = array();
        for($str = 1;$str <= 10000; $str++){
			if($str%7 == 0){
				
        //echo "Checking this word ----> " . $str . "は<br>";
        $len = strlen($str);
		$palindrome = TRUE;
		//半分の数だけ繰り返し
        for ($x = 0; $x < $len / 2; $x++) {
            if (substr($str,$x,1)!= substr($str,$len - $x - 1,1)) {
				
                $palindrome = FALSE;
            }
        }
        if ($palindrome) {
			$count[] = $str;
            //echo "回文数です!<br>";
        } else {
           // echo "回文数ではありません!<br>";
        }
			}
		}
		$cnt = count($count);
		echo $cnt;
		}
}


$a = new myClass();
$a->myKaibun();
?>

</body>
</html>

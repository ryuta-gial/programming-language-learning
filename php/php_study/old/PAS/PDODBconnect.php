<?php
$dsn = 'mysql:host=localhost;dbname=ryudb';
$user = 'root';
$password = 'root';

try {
$pdo = new PDO($dsn,$user);
//print('�ڑ��ɐ������܂����B<br>');
} catch (PDOException $e) {
 exit('�f�[�^�x�[�X�ڑ����s�B'.$e->getMessage());
}
?>

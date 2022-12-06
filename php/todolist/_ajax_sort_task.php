<?php

require_once('config.php');
require_once('functions.php');

$dbh = connectDb();

// var_dump($_POST['task']);

parse_str($_POST['task']); // $task
//文字列が変数に変換
// var_dump($task);

foreach ($task as $key => $val) {
    $sql = "update tasks set seq = :seq where id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(
        ":seq" => $key,
        ":id" => $val
    ));
}
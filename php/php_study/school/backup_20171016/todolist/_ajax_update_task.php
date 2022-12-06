<?php

require_once('config.php');
require_once('functions.php');

$dbh = connectDb();

$sql = "update tasks set title = :title, point = :point, modified = now() , created = now() where id = :id";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(
    ":id" => (int)$_POST['id'],
     ":title" => $_POST['title'],
    ":point" => $_POST['point'],
    ":limit" => $_POST['limit']
    ));
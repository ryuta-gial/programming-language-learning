<?php

require_once('config.php');
require_once('functions.php');

$dbh = connectDb();

$sql = "select max(seq)+1 from tasks where type != 'deleted'";
$seq = $dbh->query($sql)->fetchColumn();

$sql = "insert into tasks
        (seq, title, point, created, limit_day , modified)
        values
        (:seq, :title, :point, now(), :limit , now())";
$stmt = $dbh->prepare($sql);
$stmt->execute(array(
    ":seq" => $seq,
    ":title" =>  (string)$_POST['title'],
    ":point" =>  (string)$_POST['point'],
    ":limit" =>  (string)$_POST['limit']
));

echo $dbh->lastInsertId();
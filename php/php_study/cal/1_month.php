<?php
require 'Calendar.php';

$cal = new \Myapp\Calendar();

function h($s) {
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

ini_set( 'display_errors', 1 );
ini_set('error_reporting', E_ALL);

 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="styles.css">
  <title>カレンダー</title>
</head>
<body>
  <table>
    <thead>
      <tr>
        <th><a href="?t=<?php echo h($cal->prev); ?>">&laquo;</a></th>
        <th colspan="5"><?php echo h($cal->yearMonth_t); ?></th>
        <th><a href="?t=<?php echo h($cal->next); ?>">&raquo;</a></th>
      </tr>
    </thead>
    <tbody>
    </tr>
      <tr>
      <td>日</td>
      <td>月</td>
      <td>火</td>
      <td>水</td>
      <td>木</td>
      <td>金</td>
      <td>土</td>
    </tr>

   <?php $cal->show(); ?>
    
    </tbody>
    <tfoot>
      <tr>
        <th colspan="7"><a href="?t=<?php echo h($cal->month); ?>">本日</a></th>
      </tr>
    </tfoot>
  </table>
</body>
<html>
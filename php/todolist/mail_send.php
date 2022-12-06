<?php
require_once('config.php');
require_once('functions.php');

$dbh = connectDb();

mb_language("Japanese");
mb_internal_encoding("UTF-8");
if (mb_send_mail(
    "desert_shift@yahoo.co.jp",  // 送信先メールアドレス
    "期限が近づいています",
    "の期限まで1週間です。",
    "From :".mb_encode_mimeheader("TODO管理")."<ryu555777@gmail.com>"
))
{
    echo "成功\n";
}
else {
    echo "失敗\n";
}
?>

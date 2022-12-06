<?php
require_once('Smarty.class.php');

$smarty = new Smarty();

//テンプレートの指定
$smarty->template_dir = '/Applications/MAMP/htdocs/smarty/templates';
$smarty->compile_dir ='/Applications/MAMP/htdocs/smarty/templates_c';

$smarty->display('/Applications/MAMP/htdocs/smarty/templates/item/complete.tpl');
?>
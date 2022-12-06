<?php
// load Smarty library
require('Smarty.class.php');

$smarty = new Smarty;

$smarty->template_dir = '/Applications/MAMP/htdocs/smarty/templates';
$smarty->compile_dir ='/Applications/MAMP/htdocs/smarty/templates_c';

$smarty->assign('name','shimizu!');

$smarty->display('smarty.tpl');
?>


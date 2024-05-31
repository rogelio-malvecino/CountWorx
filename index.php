<?php
echo "make 2nd changes"
echo "change only at branchname"
require_once('inc/functions.php'); 
require_once('inc/languages.php'); 
require_once('Smarty.class.php');

if(function_exists('date_default_timezone_set'))
{
    date_default_timezone_set('GMT');
}


$smarty = new Smarty;
$current_lang = set_lang();
$smarty->assign('lang',$lang[$current_lang]);
$extensions = '';
$loaded_ext = get_loaded_extensions(); foreach ($loaded_ext as $ext) $extensions.=$ext.', ';
$smarty->assign('extensions',$extensions);

if (((extension_loaded('mysqli')))&&(@mysqli_connect('localhost','root','vertrigo'))) 
 $smarty->assign('password_status', false); 
else 
 $smarty->assign('password_status', true);

$smarty->assign('php_version', phpversion());
 
$smarty->display('index.tpl');

?>
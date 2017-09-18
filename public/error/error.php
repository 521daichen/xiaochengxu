<?php
/**
 * Created by PhpStorm daichen.
 * User: Administrator
 * Date: 2017/9/18
 * Time: 12:44
 */
error_reporting(-1);
$num = NULL;
try{
    $num = 3/0;
    var_export($num);
}catch (Exception $e){
    echo $e->getMessage();
}
echo '<hr>';

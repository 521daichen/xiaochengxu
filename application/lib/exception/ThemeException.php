<?php
/**
 * Created by PhpStorm.
 * User: daichen
 * Date: 2017/9/19
 * Time: 下午9:05
 */

namespace app\lib\exception;


class ThemeException extends BaseException
{
    public $code = 404;
    public $msg = '指定的主题不存在';
    public $errorCode =  30000;
}
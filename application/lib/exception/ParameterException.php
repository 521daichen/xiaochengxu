<?php
/**
 * Created by PhpStorm.
 * User: daichen
 * Date: 2017/9/17
 * Time: 下午8:52
 */

namespace app\lib\exception;


class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = '参数错误';
    public $errorCode =  10000;
}
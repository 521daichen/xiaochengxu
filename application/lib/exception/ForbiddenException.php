<?php
/**
 * Created by PhpStorm daichen.
 * User: Administrator
 * Date: 2017/9/20
 * Time: 14:20
 */

namespace app\lib\exception;


class ForbiddenException extends BaseException
{
    public $code = 403;
    public $msg = '权限不足';
    public $errorCode = 10001;
}
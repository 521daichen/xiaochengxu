<?php
/**
 * Created by PhpStorm.
 * User: daichen
 * Date: 2017/9/17
 * Time: 下午6:38
 */

namespace app\lib\exception;


class BannerMissException extends BaseException
{
    public $code = 400;
    public $msg = '请求的banner不存在';
    public $errorCode =  40000;
}
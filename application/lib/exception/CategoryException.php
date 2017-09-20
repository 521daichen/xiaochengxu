<?php
/**
 * Created by PhpStorm.
 * User: daichen
 * Date: 2017/9/19
 * Time: 下午11:09
 */

namespace app\lib\exception;

class CategoryException extends BaseException
{
    public $code = 404;
    public $msg = '请求的类目不存在，请检查参数';
    public $errorCode =  50000;
}
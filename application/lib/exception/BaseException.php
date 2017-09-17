<?php
/**
 * Created by PhpStorm.
 * User: daichen
 * Date: 2017/9/17
 * Time: 下午6:35
 */

namespace app\lib\exception;
use think\Exception;

class BaseException extends Exception
{
    //http状态码
    public $code = 400;
    //错误具体处理
    public $msg = '参数错误';
    //自定义错误码
    public $errorCode = 10000;

    public function __construct($params = [])
    {
        if(!is_array($params))
        {
            return;
//            throw new Exception('必须是数组');
        }
        //code是否存在
        if(array_key_exists('code',$params)){
            $this->code = $params['code'];
        }

        if(array_key_exists('msg',$params)){
            $this->msg = $params['msg'];
        }

        if(array_key_exists('errorCode',$params)){
            $this->errorCode = $params['errorCode'];
        }
    }
}
<?php
/**
 * Created by PhpStorm daichen.
 * User: Administrator
 * Date: 2017/9/20
 * Time: 10:19
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    //require不能防止传空值 如 code=
    protected $rule = [
        'code'=>'require|isNotEmpty'
    ];

    protected $message = [
        'code'=>'没有code还想获取token，dreaming'
    ];

}
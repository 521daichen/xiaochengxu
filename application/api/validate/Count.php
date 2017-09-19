<?php
/**
 * Created by PhpStorm.
 * User: daichen
 * Date: 2017/9/19
 * Time: 下午10:07
 */

namespace app\api\validate;


class Count extends BaseValidate
{
    protected $rule = [
        'count'=>'isPostitiveInteger|between:1,15'
    ];
}
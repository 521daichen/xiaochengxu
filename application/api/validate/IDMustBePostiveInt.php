<?php
/**
 * Created by PhpStorm.
 * User: daichen
 * Date: 2017/9/17
 * Time: 下午1:34
 */

namespace app\api\validate;
class IDMustBePostiveInt extends BaseValidate
{
    protected $rule = [
      'id'=>'number'
    ];
}
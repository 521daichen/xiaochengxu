<?php
/**
 * Created by PhpStorm.
 * User: daichen
 * Date: 2017/9/17
 * Time: 上午12:46
 */

namespace app\api\validate;
use think\Validate;

class TestValidate extends Validate
{
    protected $rule = [
        'name'=>'require|max:10',
        'email'=>'email'
    ];

}
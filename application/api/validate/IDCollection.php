<?php
/**
 * Created by PhpStorm daichen.
 * User: Administrator
 * Date: 2017/9/19
 * Time: 17:49
 */

namespace app\api\validate;


class IDCollection extends BaseValidate
{
    protected $rule = [
        'ids'=>'require|checkIDs'
    ];

    protected $message = [
        'ids'=>'ids参数必须是以逗号分隔的正整数'
    ];

    //$value 客户端传过来的ids
    protected function checkIDs($value){
        $values = explode(',',$value);
        if(empty($values)){
            return false;
        }
        foreach ($values as $id){
            if(!$this->isPostitiveInteger($id)){
                return false;
            }
        }
        return true;
    }
}
<?php
/**
 * Created by PhpStorm daichen.
 * User: Administrator
 * Date: 2017/9/20
 * Time: 15:07
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;

class OrderPlace extends BaseValidate
{
    //对大项做校验 自动检验
    protected $rule = [
        'products'=>'checkProducts'
    ];
    //对子项做校验 手动检验
    protected $singleRule = [
        'product_id'=>'require|isPostitiveInteger',
        'count'=>'require|isPostitiveInteger',
    ];

    protected function checkProducts($values){
        if(is_array($values)){
            throw new ParameterException([
                'msg'=>'商品参数不正确'
            ]);
        }

        if(empty($values)){
            throw new ParameterException([
                'msg'=>'商品列表不能为空'
            ]);
        }
        foreach ($values as $value){
            $this->checkProduct($value);
        }
        return true;
    }
    protected function checkProduct($value){
        $validate = new BaseValidate($this->singleRule);
        $result = $validate->check($value);
        if(!$result){
            throw new ParameterException([
                'msg'=>'商品列表参数错误',
            ]);
        }
    }

}
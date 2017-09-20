<?php
namespace app\api\validate;
use app\lib\exception\BaseException;
use app\lib\exception\ParameterException;
use think\Exception;
use think\Request;
use think\Validate;

/**
 * 继承了validate validate基础验证器
 * Class BaseValidate
 * @package app\api\validate
 */
class BaseValidate extends Validate {
    public function goCheck(){
        //获取http传入的参数
        //对这些参数做校验
        $request = Request::instance();
        $params = $request->param();
        //继承了validate 所以直接$this
        $result = $this->check($params);

        if(!$result){
            //在异常类初始化的时候就应该赋予它应该有的值了 所以选择__construct
            $e = new ParameterException([
                'msg'=>$this->error,
    //            'code'=>400,
    //            'errorCode'=>10002
            ]);
    //        $e->msg = $this->error;
            throw $e;
    //        $error = $this->getError();
    //        throw new BaseException($error);
        }else{
            return true;
        }
    }
    protected function isPostitiveInteger($value,$rule = '',$data = '',$field = ''){

        if(is_numeric($value) && is_int($value + 0) &&($value + 0)>0){
            return true;
        }else{
            return false;
        }
    }

    protected function isNotEmpty($value,$rule = '',$data = '',$field = ''){
        if(empty($value)){
            return false;
        }else{
            return true;
        }
    }

    protected function isMobile($value){
        $rule = '^1(1|4|5|7|8)[0-9]\d{8}$^';
        $result = preg_match($rule,$value);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function getDataByRule($arrays){
        if(array_key_exists('user_id',$arrays) | array_product('uid',$arrays)){
            throw new ParameterException([
                'msg'=>'参数中包含有非法的参数名user_id 或者uid'
            ]);
            $newArray = [];
            foreach ($this->rule as $key=>$value){
                $newArray[$key] = $arrays[$key];
            }
            return $newArray;
        }
    }

}
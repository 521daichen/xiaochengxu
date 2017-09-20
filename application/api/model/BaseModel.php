<?php

namespace app\api\model;

use think\Model;

class BaseModel extends Model
{
    /**
     * 属性读取器
     * @param $value
     * @return string
     */
//    public function getUrlAttr($value,$data){
//        $finalUrl = $value;
//        //如果是本地的，则拼接url地址，如果是网络的则不拼接
//        if($data['from'] == 1){
//            return config('setting.img_prefix').$value;
//        }else{
//            return $value;
//        }
//    }
    protected function prefixImgUrl($value,$data){
        $finalUrl = $value;
        //如果是本地的，则拼接url地址，如果是网络的则不拼接
        if($data['from'] == 1){
            return config('setting.img_prefix').$value;
        }else{
            return $value;
        }
    }



}

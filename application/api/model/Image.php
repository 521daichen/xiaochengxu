<?php

namespace app\api\model;

use think\Model;

class Image extends BaseModel
{
    protected $hidden = ['id','from','delete_time','update_time'];

    /**
     * 属性读取器
     * @param $value
     * @return string
     */
    public function getUrlAttr($value,$data){
        return $this->prefixImgUrl($value,$data);
    }
}

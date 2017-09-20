<?php
/**
 * Created by PhpStorm daichen.
 * User: Administrator
 * Date: 2017/9/20
 * Time: 10:24
 */

namespace app\api\model;


class User extends BaseModel
{
    public function address(){
        return $this->hasOne('UserAddress','user_id','id');
    }


    public static function getByOpenID($openid){
        $user = self::where('openid','=',$openid)
            ->find();
        return $user;
    }
}
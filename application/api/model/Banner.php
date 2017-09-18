<?php
/**
 * Created by PhpStorm.
 * User: daichen
 * Date: 2017/9/17
 * Time: 下午3:28
 */

namespace app\api\model;
use think\Db;
use think\Exception;

class Banner
{
    public static function getBannerByID($id){
        //TODO:根据bannerid号获取banner信息
//        $result = Db::query('select * from banner_item where banner_id=?',[$id]);

        //Db::table('banner_item')->where('banner_id','=',$id) 返回query对象
        //使用了find[一条] select[多条] 才会最终生成sql语句并且执行sql调用

        $result = Db::table('banner_item')->where('banner_id','=',$id)->select();
        
        return $result;
    }
}
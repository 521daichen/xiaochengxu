<?php
/**
 * Created by PhpStorm daichen.
 * User: Administrator
 * Date: 2017/9/19
 * Time: 17:24
 */

namespace app\api\model;


class Product extends BaseModel
{
    protected $hidden = [
        'delete_time','main_img_id','pivot','from','crtegory_id','create_time','update_time'
    ];

    public function getMainImgUrlAttr($value,$data){
        return $this->prefixImgUrl($value,$data);
    }

    public static function getMostRecent($count){
        $products = self::limit($count)
            ->order('create_time desc')
            ->select();
        return $products;
    }

    public static function getProductsByCategoryID($categoryID){
        $products = self::where('category_id','=',$categoryID)
            ->select();
        return $products;
    }


}
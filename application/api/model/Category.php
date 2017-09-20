<?php
/**
 * Created by PhpStorm.
 * User: daichen
 * Date: 2017/9/19
 * Time: 下午11:01
 */

namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden = [
        'delete_time','update_time','create_time'
    ];

    public function Img(){
        return $this->belongsTo('Image','topic_img_id','id');
    }
}
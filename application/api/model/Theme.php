<?php
/**
 * Created by PhpStorm daichen.
 * User: Administrator
 * Date: 2017/9/19
 * Time: 17:25
 */

namespace app\api\model;


class Theme extends BaseModel
{
    /**
     * 一个theme 包含一个topic_img
     * @return \think\model\relation\BelongsTo
     */
    public function topicImg(){
//        $this->hasOne();
        //如果外键在这张表里 那就用belongsTo 另一个就用hasOne()
        return $this->belongsTo('Image','topic_img_id','id');
    }

    /**
     * 一个theme 包含一个head_img
     * @return \think\model\relation\BelongsTo
     */
    public function headImg(){
        return $this->belongsTo('Image','head_img_id','id');
    }

}
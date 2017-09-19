<?php

namespace app\api\model;

use think\Model;

class BannerItem extends BaseModel
{
    protected $hidden = ['delete_time','update_time'];
    //关联关系是 谁访问谁 就在谁这边编写关联关系
    //比如这个是 一个banneritem 下要访问到一个img

    /**
     *
     * BannerItem 一对一 img
     * @return \think\model\relation\BelongsTo
     */
    public function img(){
        return $this->belongsTo('Image','img_id','id');
    }
}

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
    protected $hidden = [
        'create_time','update_time','delete_time'
    ];
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

    /**
     * 多个产品对应多个主题 多个主题对应多个产品
     * @return \think\model\relation\BelongsToMany
     */
    public function products(){
        //关联的模型名、中间表名、外键、主键
        return $this->belongsToMany('Product','theme_product','product_id','theme_id');
    }

    public static function getThemeWithProducts($id){
        $themes = self::with('products,topicImg,headImg')
            ->find($id);
        return $themes;
    }


}
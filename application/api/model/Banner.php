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
use think\Model;


class Banner extends BaseModel
{
    protected $hidden = ['delete_time','update_time'];

    /**
     * 模型关联 Banner BannerItem
     * @return \think\model\relation\HasMany
     */
    public function items(){
        //关联模型的名子 外键 当前模型主键
        return $this->hasMany('BannerItem','banner_id','id');
    }

    public static function getBannerByID($id){
        //TODO:根据bannerid号获取banner信息
//      $result = Db::query('select * from banner_item where banner_id=?',[$id]);

        //Db::table('banner_item')->where('banner_id','=',$id) 返回query对象
        //使用了find[一条] select[多条] 才会最终生成sql语句并且执行sql调用
        $banner = self::with(['items','items.img'])->find($id);
//        $banner->hidden(['delete_time','update_time']); 隐藏
//        $banner->visible(['id']); 显示
//        $result = Db::table('banner_item')->where('banner_id','=',$id)->select();
        return $banner;
    }
}
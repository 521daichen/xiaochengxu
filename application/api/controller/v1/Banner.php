<?php
/**
 * Created by PhpStorm.
 * User: daichen
 * Date: 2017/9/16
 * Time: 下午11:00
 */

namespace app\api\controller\v1;
use app\api\validate\IDMustBePostiveInt;
use \app\api\model\Banner as BannerModel;
use app\lib\exception\BannerMissException;
use think\Exception;
use think\Validate;

class Banner
{
    /**
     * 获取指定id的banner信息
     * @url /banner/:id
     * @id banner的id号
     * @http GET
     */

    public function getBanner($id){ 
        //参数拦截器 校验层
        (new IDMustBePostiveInt())->goCheck();
        //独立验证
        //验证器
        $banner = BannerModel::getBannerByID($id);
        if(!$banner){
            //bannermissexception 自己或者父类必须继承Exception 不然会报错
            throw new BannerMissException();
        }

        return $banner;
    }
}
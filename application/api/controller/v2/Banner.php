<?php
/**
 * Created by PhpStorm.
 * User: daichen
 * Date: 2017/9/16
 * Time: 下午11:00
 */

namespace app\api\controller\v2;
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

        return 'this is v2 version';
    }
}
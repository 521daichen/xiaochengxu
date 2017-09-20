<?php
/**
 * Created by PhpStorm daichen.
 * User: Administrator
 * Date: 2017/9/20
 * Time: 13:09
 */

namespace app\api\controller\v1;
use app\api\model\User as UserModel;
use app\api\service\Token as TokenService;
use app\api\validate\AddressNew;
use app\lib\exception\SuccessMessage;
use app\lib\exception\UserException;

class Address extends BaseController
{

    //前置方法方法名=>
    protected $beforeActionList = [
        'checkPrimaryScope'=>['only'=>'createOrUpdateAddress']
    ];


    public function createOrUpdateAddress(){
        $validate = new AddressNew();
        $validate->goCheck();
//        (new AddressNew())->goCheck();
        // 根据token获取用户uid
        // 根据uid查找用户数据，判断用户是否存在 如果不存在 抛出异常
        // 获取用户从客户端提交来的地址信息
        // 根据用户地址信息是否存在 判断是添加地址还是更新地址
        $uid = TokenService::genCurrentUid();
        $user = UserModel::get($uid);
        if(!$user){
            throw new UserException();
        }
        $dataArray = $validate->getDataByRule(input('post.'));
        $userAddress = $user->address;
        if(!$userAddress){
            $user->address()->save($dataArray);
        }else{
            $user->address->save($dataArray);
        }
        return new SuccessMessage();
    }
}
<?php
/**
 * Created by PhpStorm daichen.
 * User: Administrator
 * Date: 2017/9/20
 * Time: 14:27
 */

namespace app\api\controller\v1;
use app\api\validate\OrderPlace;
use app\lib\exception\ForbiddenException;
use app\lib\exception\TokenException;
use think\Controller;
use app\api\service\Token as TokenService;

class Order extends BaseController
{

    protected $beforeActionList = [
        'checkExclusiceScope'=>['only'=>'placeOrder']
    ];

//    /**
//     * 排除管理员 以经重构进了token service基类
//     * @return bool
//     */
//    protected function checkExclusiceScope(){
//
//        $scope = TokenService::getCurrentTokenVar('scope');
//        if($scope){
//            //只允许用户访问 管理员不能访问
//            if($scope == ScopeEnum::User){
//                return true;
//            }else{
//                throw new ForbiddenException();
//            }
//        }else{
//            throw new TokenException();
//        }
//    }


    // 用户选择商品后，向api提交包含它锁选择商品的相关信息
    // api在接收到消息之后，需要检查订单相关商品的库存量
    // 有库存，把订单数据存入数据库中 = 下单成功了 返回客户端信息 告诉客户端可以支付了
    // 调用我们的支付接口，进行支付
    // 还需要再次进行库存量检测
    // 服务器调用微信支付接口进行支付
    // 微信会返回给我们一个支付的结果(异步)
    // 成功：也需要进行库存量的检测
    // 成功：进行库存量的扣除 失败：返回一个支付失败的结果

    public function placeOrder(){
        (new OrderPlace())->goCheck();
        //获取数组参数 /a
        $products = input('post.products/a');
        $uid = TokenService::gengrateToken();





    }
}
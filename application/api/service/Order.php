<?php
/**
 * Created by PhpStorm daichen.
 * User: Administrator
 * Date: 2017/9/20
 * Time: 15:20
 */

namespace app\api\service;


use app\api\model\Product;

class Order
{
    // 客户端传递过来的products参数
    protected $oProducts;
    // 真实的商品信息（包括库存量）
    protected $products;

    protected $uid;

    public function place($uid,$oProducts,$products){
        //oProducts 和products对比
        //从数据库中查出products
        $this->oProducts = $oProducts;
        $this->products = $this->getProductsByOrder($oProducts);
        $this->uid = $uid;
    }

    private function getProductsByOrder($oProducts){

        $oPIDs = [];
        foreach ($oProducts as $item){
            array_push($oPIDs,$item['product_id']);
        }
        $products = Product::all($oPIDs)
            ->visible(['id','price','stock','name','main_img_url'])
            ->toArray();
        return $products;

    }
}
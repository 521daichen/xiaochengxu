<?php
/**
 * Created by PhpStorm.
 * User: daichen
 * Date: 2017/9/19
 * Time: 下午11:00
 */

namespace app\api\controller\v1;
use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;

class Category
{
    public function getAllCategories(){
//        $categories = CategoryModel::with('img')->select();
        $categories = CategoryModel::all([],'img');
        if($categories->isEmpty()){
            throw new CategoryException();
        }
        return $categories;
    }

}
<?php
/**
 * Created by PhpStorm daichen.
 * User: Administrator
 * Date: 2017/9/20
 * Time: 14:56
 */

namespace app\api\controller\v1;

use think\Controller;
use app\api\service\Token as TokenService;

class BaseController extends Controller
{

    protected function checkPrimaryScope(){
        TokenService::needPrimaryScope();
    }


    protected function checkExclusiceScope(){
        TokenService::checkExclusiceScope();
    }
}
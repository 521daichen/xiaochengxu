<?php
/**
 * Created by PhpStorm daichen.
 * User: Administrator
 * Date: 2017/9/20
 * Time: 11:32
 */

namespace app\api\service;


use app\lib\exception\ForbiddenException;
use app\lib\exception\TokenException;
use think\Cache;
use think\Exception;
use think\Request;

class Token
{
    public static function gengrateToken(){
        // 32字符组成一组随机字符串
        $randChars = getRandChar(32);
        // 用三组字符串进行md5加密
        $timestamp = $_SERVER['REQUEST_TIME'];
        // $salt 盐
        $salt = config('secure.token_salt');
        return md5($randChars.$timestamp.$salt);
    }

    public static function getCurrentTokenVar($key){
        $token = Request::instance()
            ->header('token');
        $vars = Cache::get($token);
        if(!$vars){
            throw new TokenException();
        }else{
            if(!is_array($vars))
            {
                $vars = json_decode($vars,true);
            }
            if(array_key_exists($key,$vars)){
                return $vars[$key];
            }else{
                throw new Exception('尝试 获取的TOKEN变量并不存在');
            }
        }

    }
    public static function genCurrentUid(){
        //token
        $uid = self::getCurrentTokenVar('uid');
        return $uid;
    }

    public static function needPrimaryScope(){
        $scope = self::getCurrentTokenVar('scope');
        if($scope){
            //只允许用户访问 管理员不能访问
            if($scope == ScopeEnum::User){
                return true;
            }else{
                throw new ForbiddenException();
            }
        }else{
            throw new TokenException();
        }
    }

    public static function checkExclusiceScope(){

        $scope = self::getCurrentTokenVar('scope');
        if($scope){
            //只允许用户访问 管理员不能访问
            if($scope == ScopeEnum::User){
                return true;
            }else{
                throw new ForbiddenException();
            }
        }else{
            throw new TokenException();
        }
    }
}
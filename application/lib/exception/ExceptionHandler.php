<?php
/**
 * Created by PhpStorm.
 * User: daichen
 * Date: 2017/9/17
 * Time: 下午6:33
 */
namespace app\lib\exception;
use Exception;
use think\Config;
use think\exception\Handle;
use think\Log;
use think\Request;

class ExceptionHandler extends Handle {
    //所有的异常都会通过render渲染到前端
    private $code;
    private $msg;
    private $errorCode;
    //还需要返回客户端当前请求的url路径
    public function render(Exception $e)
    {
        //两类异常 由用户验证错误所发生的异常 返回问题给前端
        //系统自身发生的异常 如代码错误 不返回问题给前端 记录日志
        if($e instanceof BaseException){

            //如果是自定义的异常
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        }
        else{
            // 获取配置文件信息 Config::get();
            if(config('app_debug')){
                //return default error page
                return parent::render($e);
            }else{
                $this->code = 500;
                $this->msg = '服务器内部错误，不想告诉你';
                $this->errorCode = 999;
                //记录日志
                $this->recordErrorLog($e);
            }
        }
        $request = Request::instance();

        $result = [
            'msg'=>$this->msg,
            'errorCode'=>$this->errorCode,
            'request_url'=>$request->url()
        ];
        return json($result,$this->code);
    }
    private function recordErrorLog(Exception $e){
        //因为config里面已经关闭了记录log 所以在这里要进行初始化一下
        Log::init([
                'type'=>'file',
                'path'=>LOG_PATH,
                'leave'=>['error'],
            ]
        );
        Log::record($e->getMessage(),'error');
    }
}
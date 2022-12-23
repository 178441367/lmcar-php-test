<?php

namespace App\Service;

use think\facade\Log;
//适配器模式
class ThinkLog
{
    public function __construct($conf){
         Log::init($conf);
    }
    //模板模式
    private function beforeLog($message){
       return  $message = strtoupper($message);
    }

    public function info($message = '')
    {
        $message = $this->beforeLog($message);
        Log::info($message);
    }

    public function debug($message = '')
    {
        $message = $this->beforeLog($message);
        Log::debug($message);
    }

    public function error($message = '')
    {
        $message = $this->beforeLog($message);
        Log::error($message);
    }
}
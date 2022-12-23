<?php

namespace App\Service;

use think\facade\Log;

class AppLogger
{
    const TYPE_LOG4PHP = 'log4php';
    const TYPE_LOG_THINKTOP = 'think-log';
    private $logger;

    //工厂模式
    public function __construct($type = self::TYPE_LOG4PHP)
    {
        if ($type == self::TYPE_LOG4PHP) {
            $this->logger = \Logger::getLogger("Log");
        }else if($type == self::TYPE_LOG_THINKTOP){
            $this->logger = new ThinkLog([
                'default'	=>	'file',
                'channels'	=>	[
                    'file'	=>	[
                        'type'	=>	'file',
                        'path'	=>	'./logs/',
                    ],
                ],
            ]);
        }
    }

    public function info($message = '')
    {
        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        $this->logger->error($message);
    }
}
<?php
namespace App\App;

use App\Util\HttpRequest;
class Demo {
    const URL = "http://some-api.com/user_info";
    private $_logger;
    private $_req;
    public UserInterface $service;
    function __construct($logger, HttpRequest $req,UserInterface $service) {
        $this->_logger = $logger;
        $this->_req = $req;
        $this->service = $service;
    }
    function set_req(HttpRequest $req) {
        $this->_req = $req;
    }
    function foo() {
        return "bar";
    }
    function get_user_info() {
        $result = $this->service->requestUserInfo();
        $result_arr = json_decode($result, true);
        if (in_array('error', $result_arr) && $result_arr['error'] == 0) {
            if (in_array('data', $result_arr)) {
                $this->_logger->info("fetch data error.");
                return $result_arr['data'];
            }
        } else {
            $this->_logger->error("fetch data error.");
        }
        return null;
    }

}

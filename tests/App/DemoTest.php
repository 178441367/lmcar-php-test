<?php

namespace Test\App;

use App\App\Demo;
use App\App\UserInterface;
use App\Service\AppLogger;
use App\Util\HttpRequest;
use PHPUnit\Framework\TestCase;


class DemoTest extends TestCase
{

    public function test_foo()
    {
        $stub = $this->createStub(UserInterface::class);
        $demo = new Demo(new AppLogger(), new HttpRequest(), $stub);
        $this->assertEquals("bar",$demo->foo());
    }

    public function test_get_user_info()
    {
        $stub = $this->createStub(UserInterface::class);
        $stub->method("requestUserInfo")->willReturn(json_encode([
            "error" => 0,
            "data" => [
                "id" => 1,
                "username" => "hello word"
            ]
        ]));
        $demo = new Demo(new AppLogger(), new HttpRequest(), $stub);
        $this->assertEquals(1, $demo->get_user_info()["id"]);
    }
}

<?php
namespace app\controller;

use app\BaseController;
use rpc\contract\Test\DemoInterface;
use Swoole\Server;

class Index extends BaseController
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V6<br/><span style="font-size:30px">13载初心不改 - 你值得信赖的PHP框架</span></p></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="eab4b9f840753f8e7"></think>';
    }

    public function hello($name = 'ThinkPHP6')
    {
        return 'hello,' . $name;
    }

    public function testRpc(DemoInterface $demo)
    {
        return $demo->sqrt(1048576);
    }

    /**
     * 测试异步任务
     * @param Server $server
     * @return string
     */
    public function testTask(Server $server)
    {
        $time_start = $this->microtime_float();
        $server->task('hello task');
        $time_end = $this->microtime_float();
        $time = number_format(($time_end - $time_start),6);

        return "运行时间 : {$time}s";
    }

    /**
     * 获取时间戳（毫秒）
     * @return float
     */
    private function microtime_float()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }
}

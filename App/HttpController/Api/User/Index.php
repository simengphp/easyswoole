<?php
namespace App\HttpController\Api\User;

use EasySwoole\Http\AbstractInterface\Controller;

class Index extends Controller
{

    function index()
    {
        // TODO: Implement index() method.
        $conf = new \EasySwoole\Mysqli\Config(\EasySwoole\EasySwoole\Config::getInstance()->getConf('MYSQL'));
        $db = new \EasySwoole\Mysqli\Client($conf);
        $data = $db->get('test');//获取一个表的数据
        var_dump($data);
    }
}
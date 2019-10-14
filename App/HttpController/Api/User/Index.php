<?php
namespace App\HttpController\Api\User;

use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Mysqli\QueryBuilder;

class Index extends Controller
{

    function index()
    {
        // TODO: Implement index() method.
        $conf = new \EasySwoole\Mysqli\Config(\EasySwoole\EasySwoole\Config::getInstance()->getConf('MYSQL'));
        $client = new \EasySwoole\Mysqli\Client($conf);
        go(function ()use($client){
            //构建sql
            $client->queryBuilder()->get('test');
            //执行sql
            $client->execBuilder();
        });
        $builder = new QueryBuilder();
        $ret = $builder->where('m_id',2)->get('test');
        $data = json_encode($ret);
        $this->response()->write($data);
    }
}
<?php
namespace App\HttpController\Api\User;

use EasySwoole\Http\AbstractInterface\Controller;
use EasySwoole\Mysqli\QueryBuilder;

class Index extends Controller
{

    function index()
    {
        echo 33333333;
        // TODO: Implement index() method.
        $conf = new \EasySwoole\Mysqli\Config(\EasySwoole\EasySwoole\Config::getInstance()->getConf('MYSQL'));
        $client = new \EasySwoole\Mysqli\Client($conf);
        go(function ()use($client){
            //构建sql
            $client->queryBuilder()->get('test');
            //执行sql
            var_dump('table:'.PHP_EOL.$client->execBuilder());
        });
        $builder = new QueryBuilder();
        $ret = $builder->where('m_id',2)->get('test');
        var_dump('SQL_G'.PHP_EOL.$ret);
    }
}
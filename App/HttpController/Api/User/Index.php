<?php
namespace App\HttpController\Api\User;

use App\Utility\Pool\MysqlObject;
use App\Utility\Pool\MysqlPool;
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
        var_dump($ret);
    }

    public function test()
    {
        $db = MysqlPool::defer(); //用到你结束为止
        $db->where('id', 1)->get('test');
        $db->where('id', 1)->get('test');

        MysqlPool::invoke(function (MysqlObject $mysqlObject) {
            $mysqlObject->where('id', 1)->get('test');
        }); //用完即归还，也就是注册一个之后立马就归还了，所以再次调用就会是两个数据库对象
        MysqlPool::invoke(function (MysqlObject $mysqlObject) {
            $mysqlObject->where('id', 1)->get('test');
        });
    }
}
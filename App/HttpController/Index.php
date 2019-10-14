<?php
namespace App\HttpController;

use EasySwoole\Http\AbstractInterface\Controller;

class Index extends Controller
{

    function index()
    {
        echo 111;
        // TODO: Implement index() method.
        $this->response()->write('hello world');
    }
}
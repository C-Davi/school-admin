<?php


namespace app\admin\controller;

/**
 * Created By 校园助手
 * User: 壹零弍肆
 * Desc:
 * Date: 2019/8/27 0027
 * Time: 22:52
 */
class Students extends Common
{
    public function index()
    {
        $list = \app\admin\model\Students::getCMC();
        return view('index',['list'=>$list,'count'=> count($list)]);
    }

    public function add()
    {

    }

    public function create()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }
}
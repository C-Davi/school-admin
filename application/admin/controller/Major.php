<?php


namespace app\admin\controller;

use think\Controller;
use app\admin\model\Major as MajorModel;
/**
 * Created By 校园助手
 * User: 壹零弍肆
 * Desc:
 * Date: 2019/8/10 0010
 * Time: 21:24
 */
class major extends Common
{
    public function index()
    {
        $res = MajorModel::getCollege();
        $this->assign(['list'=> $res,'count'=> count($res)]);
        return $this->fetch();
    }

    public function changeType()
    {
        $params = input('post.');
        if (!$params){
            return show(2,'fail',[],200);
        }else{
            $where = ['id'=>$params['id']];
            $data = ['is_use'=>$params['type']];
            $result = MajorModel::update($data,$where);
            if ($result){
                return show(1,'success',[],200);
            }else{
                return show(2,'fail',[],200);
            }
        }
    }

    public function add()
    {
        $res = \app\admin\model\College::all();
        $this->assign('res',$res);
        return $this->fetch();
    }

    public function create()
    {
        $params = input('post.');
        if (!$params){
            return show(2,'fail',[],200);
        }else{
            $data = [
                'major_name'=>$params['adminName'],
                'major_code'   => $params['code'],
                'college_id'   => $params['adminRole'],
                'is_use'    => 2
            ];
            $admin = MajorModel::create($data);
            if (!$admin){
                return show(2,'fail',[],200);
            }else{
                return show(1,'success',[],200);
            }
        }
    }

    public function edit()
    {
        $params = input('get.');
        $id =$params['id'];
        $res = MajorModel::get($id);
        $college = \app\admin\model\College::all();
        $this->assign(['res'=>$res,'college'=>$college]);
        return $this->fetch();
    }

    public function update()
    {
        $params = input('post.');
        $where = ['id'=>$params['id']];
        $data = [
            'major_name'=>$params['adminName'],
            'major_code'   => $params['code'],
            'college_id'  => $params['adminRole']
        ];
        $res = MajorModel::update($data,$where);
        if ($res){
            return show(1,'success',[],200);
        }else{
            return show(2,'fail',[],200);
        }
    }
}
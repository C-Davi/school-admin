<?php


namespace app\admin\controller;
use app\admin\model\SchoolCollege as SchoolCollegeModel;
/**
 * Created By 校园助手
 * User: 壹零弍肆
 * Desc:
 * Date: 2019/8/17 0017
 * Time: 21:36
 */
class SchoolCollege extends Common
{
    public function index()
    {
        $res = SchoolCollegeModel::all();
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
            $result = SchoolCollegeModel::update($data,$where);
            if ($result){
                return show(1,'success',[],200);
            }else{
                return show(2,'fail',[],200);
            }
        }
    }

    public function add()
    {
        return $this->fetch();
    }

    public function create()
    {
        $params = input('post.');
        if (!$params){
            return show(2,'fail',[],200);
        }else{
            $data = [
                's_name'=>$params['adminName'],
                'phone'   => $params['code'],
                'is_use'    => 2
            ];
            $admin = SchoolCollegeModel::create($data);
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
        $res = SchoolCollegeModel::get($id);
        $this->assign(['res'=>$res]);
        return $this->fetch();
    }

    public function update()
    {
        $params = input('post.');
        $where = ['id'=>$params['id']];
        $data = [
            's_name'=>$params['adminName'],
            'phone'   => $params['code'],
        ];
        $res = SchoolCollegeModel::update($data,$where);
        if ($res){
            return show(1,'success',[],200);
        }else{
            return show(2,'fail',[],200);
        }
    }
}
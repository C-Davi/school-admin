<?php


namespace app\admin\controller;

use app\admin\model\College as CollegeModel;
use app\admin\model\Major as MajorModel;
/**
 * Created By 校园助手
 * User: 壹零弍肆
 * Desc:
 * Date: 2019/8/10 0010
 * Time: 21:25
 */
class classic extends Common
{
    public function index()
    {
        $college = CollegeModel::all();
        $res = \app\admin\model\Classic::CollegeAndMajor();
        $this->assign(['list'=> $res,'count'=> count($res),'college'=>$college]);
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
            $result = \app\admin\model\Classic::update($data,$where);
            if ($result){
                return show(1,'success',[],200);
            }else{
                return show(2,'fail',[],200);
            }
        }
    }

    public function add()
    {
        $res = \app\admin\model\Major::all();
        $this->assign('res',$res);
        return $this->fetch();
    }

    public function create()
    {
        $params = input('post.');
        if (!$params){
            return show(2,'fail',[],200);
        }else{
            $college_id = MajorModel::get($params['adminRole'])->getData('college_id');
            $data = [
                'class_name'=>$params['adminName'],
                'major_id'   => $params['adminRole'],
                'college_id'   => $college_id,
                'is_use'    => 2
            ];
            $admin = \app\admin\model\Classic::create($data);
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
        $res = \app\admin\model\Classic::get($id);
        $major = MajorModel::all();
        $this->assign(['res'=>$res,'major'=>$major]);
        return $this->fetch();
    }

    public function update()
    {
        $params = input('post.');
        $where = ['id'=>$params['id']];
        $data = [
            'class_name'=>$params['adminName'],
            'major_id'  => $params['adminRole']
        ];
        $res = \app\admin\model\Classic::update($data,$where);
        if ($res){
            return show(1,'success',[],200);
        }else{
            return show(2,'fail',[],200);
        }
    }
}
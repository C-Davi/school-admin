<?php


namespace app\admin\controller;
use app\admin\model\College as  CollegeModel;
/**
 * Created By 校园助手
 * User: 壹零弍肆
 * Desc:
 * Date: 2019/8/10 0010
 * Time: 21:24
 */
class college extends Common
{
    public function index()
    {
        $colleges = CollegeModel::all();
        return view('index',['list'=>$colleges,'count'=> count($colleges)]);
    }

    public function changeType()
    {
        $params = input('post.');
        if (!$params){
            return show(2,'fail',[],200);
        }else{
            $where = ['id'=>$params['id']];
            $data = ['is_use'=>$params['type']];
            $result = CollegeModel::update($data,$where);
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
                'college_name'=>$params['adminName'],
                'college_code'   => $params['code'],
                'is_use'    => 2
            ];
            $admin = CollegeModel::create($data);
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
        $res = CollegeModel::get($id);
        $this->assign(['res'=>$res]);
        return $this->fetch();
    }

    public function update()
    {
        $params = input('post.');
        $where = ['id'=>$params['id']];
        $data = [
            'college_name'=>$params['adminName'],
            'college_code'   => $params['code']
        ];
        $res = CollegeModel::update($data,$where);
        if ($res){
            return show(1,'success',[],200);
        }else{
            return show(2,'fail',[],200);
        }
    }
}
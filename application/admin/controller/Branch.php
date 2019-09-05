<?php


namespace app\admin\controller;

use  app\admin\model\Branch as BranchModel;
/**
 * Created By 校园助手
 * User: 壹零弍肆
 * Desc:部门相关
 * Date: 2019/8/8 0008
 * Time: 23:07
 */
class Branch extends Common
{
    /**
     * User: 壹零弍肆
     * Desc:列表
     * Time: 2019/8/10 0010 00:42
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $branch = BranchModel::all();
        $this->assign(['list'=>$branch,'count'=>count($branch)]);
        return $this->fetch();
    }

    /**
     * User: 壹零弍肆
     * Desc:修改状态
     * Time: 2019/8/10 0010 00:42
     * @return \think\response\Json
     */
    public function changeType()
    {
        $params = input('post.');
        if (!$params){
            return show(2,'fail',[],200);
        }else{
            $where = ['id'=>$params['id']];
            $data = ['is_use'=>$params['type']];
            $result = BranchModel::update($data,$where);
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

    /**
     * User: 壹零弍肆
     * Desc:添加部门
     * Time: 2019/8/10 0010 00:48
     * @return \think\response\Json
     */
    public function create()
    {
        $params = input('post.');
        if (!$params){
            return show(2,'fail',[],200);
        }else{
            $data = [
                'branch_name'=>$params['adminName'],
                'branch_info'  => $params['dec'],
                'branch_work'      => $params['work'],
                'is_use'    => 2
            ];
            $admin = BranchModel::create($data);
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
        $res = BranchModel::get($id);
        $this->assign(['res'=>$res]);
        return $this->fetch();
    }

    public function update()
    {
        $params = input('post.');
        $where = ['id'=>$params['id']];
        $data = [
            'branch_name'=>$params['adminName']
        ];
        if (!empty($params['dec'])){
            $data['branch_info']  = $params['dec'];
        }
        if (!empty($params['work'])){
            $data['branch_work']  = $params['work'];
        }
        $res = BranchModel::update($data,$where);
        if ($res){
            return show(1,'success',[],200);
        }else{
            return show(2,'fail',[],200);
        }
    }
}
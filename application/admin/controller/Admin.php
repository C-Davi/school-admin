<?php
/**
 * Date: 2019/8/8
 * Time: 11:15
 */

namespace app\admin\controller;
use app\admin\model\Admin as AdminModel;
use app\admin\model\Branch as BranchModel;
use app\admin\model\Roles as RolesModel;
use think\Request;

class Admin extends Common
{
    public function index()
    {
        $adminList = AdminModel::getBranchAndRoles();
        $this->assign('list',$adminList);
        $this->assign('count',count($adminList));
        return $this->fetch();
    }
    public function add()
    {
        $branch = BranchModel::all();
        $roles = RolesModel::all();
        $this->assign(['branch'=>$branch,'roles'=>$roles]);
        return $this->fetch();
    }

    public function create()
    {
        $params = input('post.');
        if (!$params){
            return show(2,'fail',[],200);
        }else{
            $data = [
                'admin_name'=>$params['adminName'],
                'admin_pwd' => md5($params['password']),
                'role_id'   => $params['adminRole'],
                'tel'       => $params['phone'],
                'branch_id' => $params['adminBranch'],
                'dec_txt'  => $params['dec'],
                'img_url'      => $params['icon'],
                'sex'       => $params['sex'],
                'is_use'    => 2
            ];
            $admin = AdminModel::create($data);
            if (!$admin){
                return show(2,'fail',[],200);
            }else{
                return show(1,'success',[],200);
            }
        }
    }

    public function changeType()
    {
        $params = input('post.');
        if (!$params){
            return show(2,'fail',[],200);
        }else{
            $where = ['id'=>$params['id']];
            $data = ['is_use'=>$params['type']];
            $result = AdminModel::update($data,$where);
            if ($result){
                return show(1,'success',[],200);
            }else{
                return show(2,'fail',[],200);
            }
        }
    }

    public function edit()
    {
        $params = input('get.');
        $id =$params['id'];
        $res = AdminModel::get($id);
        $branch = BranchModel::all();
        $roles = RolesModel::all();
        $this->assign(['res'=>$res,'branch'=>$branch,'roles'=>$roles]);
        return $this->fetch();
    }

    public function update()
    {
        $params = input('post.');
        $where = ['id'=>$params['id']];
        $data = [
            'admin_name'=>$params['adminName'],
            'admin_pwd' => md5($params['password']),
            'role_id'   => $params['adminRole'],
            'tel'       => $params['phone'],
            'branch_id' => $params['adminBranch'],
            'img_url'      => $params['icon'],
            'sex'       => $params['sex'],
        ];
        if (!empty($params['dec'])){
            $data['dec_txt']  = $params['dec'];
        }
        $res = AdminModel::update($data,$where);
        if ($res){
            return show(1,'success',[],200);
        }else{
            return show(2,'fail',[],200);
        }
    }

    public function role()
    {
        $roles = RolesModel::all();
        $this->assign(['list'=>$roles,'count'=>count($roles)]);
        return $this->fetch();
    }

    public function changeTypeRole()
    {
        $params = input('post.');
        if (!$params){
            return show(2,'fail',[],200);
        }else{
            $where = ['id'=>$params['id']];
            $data = ['is_use'=>$params['type']];
            $result = RolesModel::update($data,$where);
            if ($result){
                return show(1,'success',[],200);
            }else{
                return show(2,'fail',[],200);
            }
        }
    }

    public function addRole()
    {
        return view('role_add');
    }

    public function createRole()
    {
        $params = input('post.');
        if (!$params){
            return show(2,'fail',[],200);
        }else{
            $data = [
                'name'=>$params['adminName'],
                'role_type' => count(RolesModel::all())+1,
                'is_use' => 2
            ];
            $admin = RolesModel::create($data);
            if (!$admin){
                return show(2,'fail',[],200);
            }else{
                return show(1,'success',[],200);
            }
        }
    }

    public function editRole()
    {
        $params = input('get.');
        $id =$params['id'];
        $res = RolesModel::get($id);
        return view('role_edit',['res'=>$res]);
    }

    public function updateRole()
    {
        $params = input('post.');
        $where = ['id'=>$params['id']];
        $data = [
            'name'=>$params['adminName']
        ];
        $res = RolesModel::update($data,$where);
        if ($res){
            return show(1,'success',[],200);
        }else{
            return show(2,'fail',[],200);
        }
    }
}
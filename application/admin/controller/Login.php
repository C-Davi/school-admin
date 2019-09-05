<?php
namespace app\admin\controller;

use app\admin\model\Admin;
use think\Controller;
use think\Session;


class Login extends Controller
{

    /**
     * @desc 登录页
     * @return mixed|void
     */
    public function login()
    {
        return $this->fetch();
    }

    /**
     * 登录相关业务
     */
    public function check()
    {
        $params = input('param.');
        $admin = model('Admin');
        $res = $admin->where('tel',$params['name'])->find();
        if($res && md5($params['pwd']) == $res->getData('admin_pwd')){
            Session::set('admin_id',$res->id);
            Session::set('admin_info',$res);
            return $this->redirect('/admin/index');
        }else{
            return $this->redirect('/admin/login');
        }
    }

    /**
     * 退出登录的逻辑
     * 1、清空session
     * 2、 跳转到登录页面
     */
    public function logout() {
        Session::delete('admin_id');
        $this->redirect('/admin/login');
    }
}

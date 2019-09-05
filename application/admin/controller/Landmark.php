<?php


namespace app\admin\controller;
use app\admin\model\LandMark as LmModel;
use think\Request;

/**
 * Created By 校园助手
 * User: 壹零弍肆
 * Desc:
 * Date: 2019/8/10 0010
 * Time: 01:07
 */
class Landmark extends Common
{
    public function index()
    {
        $adminList = LmModel::all();
        $this->assign('list',$adminList);
        $this->assign('count',count($adminList));
        return $this->fetch();
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
                'name'=>$params['adminName'],
                'latitude' => md5($params['latitude']),
                'longitude'   => $params['longitude'],
                'type'       => $params['type'],
                'is_show'    => 2
            ];
            $admin = LmModel::create($data);
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
            $data = ['is_show'=>$params['type']];
            $result = LmModel::update($data,$where);
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
        $res = LmModel::get($id);
        $typeArr = [
            ['key'=>'0','val' =>'基础'],
            ['key'=>'1', 'val'=> '校门'],
            ['key'=>'2', 'val'=> '教学楼'],
            ['key'=>'3', 'val'=> '宿舍楼'],
            ['key'=>'4' ,'val'=> '图书馆'],
            ['key'=>'5' ,'val'=> '餐厅'],
            ['key'=>'6' ,'val'=> '医务室'],
            ['key'=>'7' ,'val'=> '实训楼'],
            ['key'=>'8' ,'val'=> '体育场所'],
            ['key'=>'10','val'=> '生活服务']
        ];
        $this->assign(['res'=>$res,'temp'=>$typeArr]);
        return $this->fetch();
    }

    public function update()
    {
        $params = input('post.');
        $where = ['id'=>$params['id']];
        $data = [
            'name'=>$params['adminName'],
            'latitude'   => $params['latitude'],
            'longitude'       => $params['longitude'],
            'type' => $params['adminRole']
        ];
        $res = LmModel::update($data,$where);
        if ($res){
            return show(1,'success',[],200);
        }else{
            return show(2,'fail',[],200);
        }
    }
}
<?php


namespace app\admin\controller;

use app\admin\model\Banner;
use app\admin\model\Logo;
use app\admin\model\ShareImg;

/**
 * Created By 校园助手
 * User: 壹零弍肆
 * Desc:
 * Date: 2019/8/17 0017
 * Time: 23:33
 */
class System extends Common
{
    public function logo()
    {
        $logo = Logo::all();
        $img_pre = config('setting.img_pre');
        return view('logo/index',['list'=>$logo,'count'=>count($logo),'img_pre'=>$img_pre]);
    }

    public function logo_add()
    {
        return view('logo/add');
    }

    public function logo_create()
    {
        $params = input('post.');
        $name = $params['adminName'];
        $img_url = $params['image_thumb_url'];
        if (!$params){
            return show(2,'fail',[],200);
        }else{
            $data = [
                'name'  => $name,
                'img_url'=>$img_url,
                'is_use'=>2
            ];
            $logo = Logo::create($data);
            if (!$logo){
                return show(2,'fail',[],200);
            }else{
                return show(1,'success',[],200);
            }
        }
    }

    public function logoChangeType(){
        $params = input('post.');
        if (!$params){
            return show(2,'fail',[],200);
        }else{
            $where = ['id'=>$params['id']];
            $data = ['is_use'=>$params['type']];
            $result = Logo::update($data,$where);
            if ($result){
                return show(1,'success',[],200);
            }else{
                return show(2,'fail',[],200);
            }
        }
    }

    public function banner()
    {
        $banner = Banner::all();
        $img_pre = config('setting.img_pre');
        return view('banner/index',['list'=>$banner,'count'=>count($banner),'img_pre'=>$img_pre]);
    }

    public function banner_add()
    {
        return view('banner/add');
    }

    public function banner_create()
    {
        $params = input('post.');
        $name = $params['adminName'];
        $img_url = $params['image_thumb_url'];
        if (!$params){
            return show(2,'fail',[],200);
        }else{
            $data = [
                'name'  => $name,
                'img_url'=>$img_url,
                'is_use'=>2
            ];
            $logo = Banner::create($data);
            if (!$logo){
                return show(2,'fail',[],200);
            }else{
                return show(1,'success',[],200);
            }
        }
    }

    public function bannerChangeType(){
        $params = input('post.');
        if (!$params){
            return show(2,'fail',[],200);
        }else{
            $where = ['id'=>$params['id']];
            $data = ['is_use'=>$params['type']];
            $result = Banner::update($data,$where);
            if ($result){
                return show(1,'success',[],200);
            }else{
                return show(2,'fail',[],200);
            }
        }
    }

    public function share()
    {
        $share = ShareImg::all();
        $img_pre = config('setting.img_pre');
        return view('share/index',['list'=>$share,'count'=>count($share),'img_pre'=>$img_pre]);
    }

    public function share_add()
    {
        return view('share/add');
    }

    public function share_create()
    {
        $params = input('post.');
        $name = $params['adminName'];
        $img_url = $params['image_thumb_url'];
        if (!$params){
            return show(2,'fail',[],200);
        }else{
            $data = [
                'name'  => $name,
                'img_url'=>$img_url,
                'is_use'=>2
            ];
            $logo = ShareImg::create($data);
            if (!$logo){
                return show(2,'fail',[],200);
            }else{
                return show(1,'success',[],200);
            }
        }
    }

    public function shareChangeType()
    {
        $params = input('post.');
        if (!$params){
            return show(2,'fail',[],200);
        }else{
            $where = ['id'=>$params['id']];
            $data = ['is_use'=>$params['type']];
            $result = ShareImg::update($data,$where);
            if ($result){
                return show(1,'success',[],200);
            }else{
                return show(2,'fail',[],200);
            }
        }
    }
}
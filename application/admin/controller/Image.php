<?php
/**
 * Date: 2019/8/8
 * Time: 17:15
 */

namespace app\admin\controller;


use think\Controller;
use think\Request;

class Image extends Controller
{
    public function upload()
    {
        try{
            //获取图片对象
//            $filetemp = $request->file('file');
            $filetemp = Request::instance()->file('file');
            //存放服务器上地址
            $serverFile = $filetemp->move(ROOT_PATH . 'public' . DS . 'images');
            //访问地址
            $imageUrl = $serverFile->getSaveName();
            $ajaxJson['success'] = true;
            $ajaxJson['msg'] = $imageUrl;
            $ajaxJson['thumb_msg'] = $imageUrl;
        }catch (\Exception $e){
            $ajaxJson['success'] = false;
        }
        return json_encode($ajaxJson);
    }
}
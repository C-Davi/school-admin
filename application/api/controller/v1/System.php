<?php


namespace app\api\controller\v1;
use app\admin\model\Bill;
use app\admin\model\Logo;
use app\admin\model\ShareImg;
use app\api\controller\BaseController;
use app\api\service\AccessToken;
use app\api\service\Token;
use think\Controller;

use think\Db;
use think\Request;

class System extends BaseController
{
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxMaxQrCodeUrl;
    protected $accessToken;
    protected $imgPrefix;
    protected $bill;
    public function __construct(Request $request = null)
    {
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxAccessTokenUrl = sprintf(
            config('wx.access_token_url'), $this->wxAppID, $this->wxAppSecret);
        $this->accessToken = new AccessToken();
        $this->imgPrefix=config('setting.img_pre');
        $this->bill = new Bill();
        parent::__construct($request);
    }

    public function getLogo()
    {
        $params = input('get.');
        $token = $params['token'];
        if ($token=='wxshelian'){
            $logo = Logo::get(1);
            $img_url = config('setting.img_pre').$logo->img_url;
            if ($img_url){
                return show(1,'success',['img_url'=>$img_url],200);
            }else{
                return show(2,'fail',[],200);
            }
        }
    }

    public function getBanner()
    {
        $params = input('get.');
        $token = $params['token'];
        if ($token=='wxshelian'){
            $logo = \app\api\model\Banner::get(1);
            $img_url = config('setting.img_pre').$logo->img_url;
            $data = ['img_url'=>$img_url];
            $temp = [];
            array_push($temp,$data);
            if ($img_url){
                return show(1,'success',$temp,200);
            }else{
                return show(2,'fail',[],200);
            }
        }
    }

    public function getShareImg()
    {
        $params = input('get.');
        $token = $params['token'];
        if ($token=='wxshelian'){
            $logo = ShareImg::get(1);
            $img_url = config('setting.img_pre').$logo->img_url;
            if ($img_url){
                return show(1,'success',['img_url'=>$img_url],200);
            }else{
                return show(2,'fail',[],200);
            }
        }
    }

    public function makeShareImg()
    {
        $params = input('get.');
        $tk = $params['token'];
        $scene = 'phone='.'17854288794';
        $result = ShareImg::get(4);
        if ($tk=='wxshelian'){
            if ($result){
                return show(1,'success',['url' => $this->imgPrefix.$result->img_url],200);
            }else{
                $token = $this->accessToken->get();
                $ACCESS_TOKEN = $token;
                //判断目录是否存在
                $Path = ROOT_PATH.'public/images/qr_code';
                if (is_dir($Path)==false){
                    mkdir($Path, 0777);
                }
                //构建请求二维码
                $this->wxMaxQrCodeUrl = sprintf(
                    config('wx.max_qr_code_url'), $ACCESS_TOKEN);
                $param = json_encode([
                    'scene' => $scene,
                    'is_hyaline'=>true
                ]);
                $getQrCodeResult = httpRequest($this->wxMaxQrCodeUrl,$param,"POST");
                $save_qrcode_img_url = 'qr_code/'.'_qrcode_wx.png';
                $file_name = ROOT_PATH.'public/images/qr_code/'.'_qrcode_wx.png';
                file_put_contents($file_name,$getQrCodeResult);
                if (file_exists($file_name)){
                    Db::startTrans();
                    try{
                        $data = [
                            'img_url'=> $save_qrcode_img_url,
                        ];
                        $result = ShareImg::create($data);
                        Db::commit();
                        return show(1,'success',['url' => $this->imgPrefix.$save_qrcode_img_url],200);
                    }catch (\Exception $e){
                        Db::rollback();
                        $this->writeLog($e);
                    }

                }else{
                    return show(2,'fail',[],200);
                }
            }
        }
    }

    public function getShareCanv()
    {
        $params = input('get.');
        $id = $params['id'];
        $article = \app\api\model\Articles::get($id);
        $member = $article->content;
        $author = $article->userNick;
        $qr_code = ShareImg::get(4)->img_url;
        $logo = ShareImg::get(1);
        $img_url = config('setting.img_pre').$logo->img_url;
        $token = $params['token'];
        if ($token=='wxshelian'){
            $userPath = ROOT_PATH.'public/images/canv';
            if (is_dir($userPath)==false){
                mkdir($userPath, 0777);
            }
            $data = [
                'title' =>$member,
                'nick'  =>$author,
                'qr_code'   => $this->imgPrefix.$qr_code
            ];
            //share
            $data['backImg'] = $img_url;
            $data['type'] =1;
            $data['new_img'] = $userPath.'/quan_'.$id.'.jpg';
            $quanImg = $this->bill->getBillImage($data);
            if ($quanImg){
                $img_url = $this->imgPrefix.'/canv'.'/quan_'.$id.'.jpg';
                return show(1,'success',['img_url'=>$img_url],200);
            }
        }else{
            return show(2,'fail',[],200);
        }
    }
}
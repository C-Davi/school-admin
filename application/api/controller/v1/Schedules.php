<?php
/**
 * Date: 2019/8/21
 * Time: 16:25
 */

namespace app\api\controller\v1;

use app\api\model\Schedules as SchedulesModel;
use app\api\controller\BaseController;
use app\api\model\SchoolCollege;

class Schedules extends BaseController
{
    public function getAddressByType($id)
    {
        $res = SchedulesModel::getAddressByType($id);
        if ($res){
            $response = show(1,'success',$res,200);
        }else{
            $response = show(2,'fail',[],200);
        }
        return $response;
    }

    public function getAllPhone()
    {
        $params = input('get.');
        $token = $params['token'];
        if ($token=='wxshelian'){
            $res = SchoolCollege::getAll();
            if ($res){
                return show(1,'success',$res,200);
            }else{
                return show(2,'fail',[],200);
            }
        }
    }
}
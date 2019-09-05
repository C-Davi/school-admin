<?php

namespace app\admin\controller;

use app\admin\model\Admin;
use app\admin\model\Articles;
use app\admin\model\Students;
use PHPExcel_IOFactory;
use think\Controller;
use think\Log;
use think\Session;
require_once EXTEND_PATH . '/PHPExcel/Classes/PHPExcel/IOFactory.php';
/**
 * Class Index
 * @package app\admin\controller
 */
class Index extends Controller
{
    public function index()
    {
        $id = Session::get('admin_id');
        $admin = Admin::where('id',$id)->find();
        $adminName = $admin->admin_name;
        $this->assign('admin_name',$adminName);
        return $this->fetch();
    }


    public function importRexcel()
    {
        $file = ROOT_PATH.'public/222.xlsx';
        if (strstr($file,'.xlsx')){
            $PHPReader = new \PHPExcel_Reader_Excel2007();
        }else{
            $PHPReader = new \PHPExcel_Reader_Excel5();
        }
        $PHPExcel = $PHPReader->load($file);
        $sheet = $PHPExcel->getActiveSheet(1);
        $data=$sheet->toArray();
        $temp = [];
        foreach ($data as $k => $v){
            if ($k>0){
                $temp[] = [
                    'student_code'=>$v[1],
                    'student_name'=>$v[2],
                    'sex'         =>$v[3],
                    'id_card'     =>$v[4],
                    'college_id'  =>$v[5],
                    'major_id'    =>$v[6],
                    'class_id'    =>$v[7]
                ];
            }
        }
        $model = new Students();
        $result = $model->insertAll($temp);
        if ($result){
            var_dump('success');
        }else{
            var_dump('fail');
        }
    }
}

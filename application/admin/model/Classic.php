<?php


namespace app\admin\model;

use think\Model;

/**
 * Created By 校园助手
 * User: 壹零弍肆
 * Desc:
 * Date: 2019/8/10 0010
 * Time: 21:26
 */
class Classic extends Model
{
    protected $table = 'class';
    protected $autoWriteTimestamp = 'datetime';
    protected $createTime = 'created_at';
    protected $updateTime = 'update_at';

    public function college()
    {
        return $this->hasOne('College','id','college_id');
    }

    public function major()
    {
        return $this->hasOne('Major','id','major_id');
    }

    public static function CollegeAndMajor()
    {
        $result = self::with('college','major')
            ->where('id','>=',0)->select();
        return $result;
    }

}
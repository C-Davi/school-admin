<?php


namespace app\admin\model;

use think\Model;

/**
 * Created By 校园助手
 * User: 壹零弍肆
 * Desc:
 * Date: 2019/8/27 0027
 * Time: 22:29
 */
class Students extends Model
{
    protected $table = 'students';
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

    public function isClass()
    {
        return $this->hasOne('Classic','id','class_id');
    }

    public static function getCMC()
    {
        $result = self::with('college','major','isClass')
            ->where('id','>=',0)
            ->select();
        return $result;
    }
}
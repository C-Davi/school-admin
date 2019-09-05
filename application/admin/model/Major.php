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
class Major extends Model
{
    protected $table = 'major';
    protected $autoWriteTimestamp = 'datetime';
    protected $createTime = 'created_at';
    protected $updateTime = 'update_at';

    public function college()
    {
        return $this->hasOne('College','id','college_id');
    }

    public static function getCollege()
    {
        $result = self::with('college')
            ->where('id','>=',0)->select();
        return $result;
    }
}
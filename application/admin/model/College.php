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
class College extends Model
{
    protected $table = 'colleges';
    protected $autoWriteTimestamp = 'datetime';
    protected $createTime = 'created_at';
    protected $updateTime = 'update_at';

    public static function getAllUseColleges()
    {
        return self::where('is_use','=',1)->select();
    }
}
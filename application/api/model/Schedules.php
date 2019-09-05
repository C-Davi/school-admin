<?php
/**
 * Date: 2019/8/21
 * Time: 16:25
 */

namespace app\api\model;


use think\Model;

class Schedules extends Model
{
    protected $table = 'school_address';
    protected $autoWriteTimestamp = 'datetime';
    protected $createTime = 'created_at';
    protected $updateTime = 'update_at';

    public static function getAddressByType($type)
    {
        return self::where('type',$type)->select();
    }
}
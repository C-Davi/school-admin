<?php


namespace app\api\model;

use think\Model;

/**
 * Created By 校园助手
 * User: 壹零弍肆
 * Desc:
 * Date: 2019/8/21 0021
 * Time: 23:17
 */
class SchoolCollege extends Model
{
    protected $table = 'school_college';
    protected $autoWriteTimestamp = 'datetime';
    protected $createTime = 'created_at';
    protected $updateTime = 'update_at';

    public static function getAll()
    {
        return self::all();
    }
}
<?php


namespace app\admin\model;

use think\Model;

/**
 * Created By 校园助手
 * User: 壹零弍肆
 * Desc: 学校地标
 * Date: 2019/8/10 0010
 * Time: 01:07
 */
class LandMark extends Model
{
    protected $table = 'school_address';
    protected $autoWriteTimestamp = 'datetime';
    protected $createTime = 'created_at';
    protected $updateTime = 'update_at';
}
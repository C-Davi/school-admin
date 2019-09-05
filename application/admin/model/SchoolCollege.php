<?php


namespace app\admin\model;

use think\Model;

/**
 * Created By 校园助手
 * User: 壹零弍肆
 * Desc:
 * Date: 2019/8/17 0017
 * Time: 21:36
 */
class SchoolCollege extends Model
{
    protected $table = 'school_college';
    protected $autoWriteTimestamp = 'datetime';
    protected $createTime = 'created_at';
    protected $updateTime = 'update_at';

}
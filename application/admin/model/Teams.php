<?php


namespace app\admin\model;

use think\Model;

/**
 * Created By 校园助手
 * User: 壹零弍肆
 * Desc:
 * Date: 2019/9/5 0005
 * Time: 16:15
 */
class Teams extends Model
{
    protected $table = 'team';
    protected $autoWriteTimestamp = 'datetime';
    protected $createTime = 'created_at';
    protected $updateTime = 'update_at';
}
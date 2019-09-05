<?php
/**
 * Date: 2019/8/20
 * Time: 11:43
 */

namespace app\admin\model;


use think\Model;

class Articles extends Model
{
    protected $table = 'articles';
    protected $autoWriteTimestamp = 'datetime';
    protected $createTime = 'created_at';
    protected $updateTime = 'update_at';
}
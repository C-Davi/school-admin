<?php
/**
 * Date: 2019/8/8
 * Time: 14:31
 */

namespace app\admin\model;


use think\Model;

class Branch extends Model
{
    protected $table = 'branch';
    protected $autoWriteTimestamp = 'datetime';
    protected $createTime = 'created_at';
    protected $updateTime = 'update_at';

    public function admin()
    {
        return $this->belongsTo('Admin','id','branch_id');
    }
}
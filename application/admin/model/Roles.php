<?php
/**
 * Date: 2019/8/8
 * Time: 14:13
 */

namespace app\admin\model;


use think\Model;

class Roles extends Model
{
    protected $table = 'roles';
    protected $autoWriteTimestamp = 'datetime';
    protected $createTime = 'created_at';
    protected $updateTime = 'update_at';

    public function admin()
    {
        return $this->belongsTo('Admin','id','role_id');
    }
}
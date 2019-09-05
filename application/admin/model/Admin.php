<?php
namespace app\admin\model;
use think\Model;

/**
 * Created By 校园助手
 * User: 壹零弍肆
 * Desc:
 * Date: 2019/8/7 0007
 * Time: 21:56
 */
class Admin extends Model
{
    protected $table = 'admin';
    protected $autoWriteTimestamp = 'datetime';
    protected $createTime = 'created_at';
    protected $updateTime = 'update_at';

    public function roles()
    {
        return $this->hasOne('Roles','id','role_id');
    }

    public function branch()
    {
        return $this->hasOne('Branch','id','branch_id');
    }

    public static function getBranchAndRoles()
    {
        $result = self::with('roles','branch')
            ->where('id','>=',0)->select();
        return $result;
    }
}
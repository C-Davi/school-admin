<?php

namespace app\api\model;

use think\Model;

class User extends BaseModel
{
    protected $table = 'user';
    protected $autoWriteTimestamp = 'datetime';
    protected $createTime ='created_at';
    protected $updateTime = 'update_at';

    /**
     * 用户是否存在
     * 存在返回uid，不存在返回0
     */
    public static function getByOpenID($openid)
    {
        $user = User::where('openid', '=', $openid)
            ->find();
        return $user;
    }

    public static function getById($id)
    {
        $user = User::get($id);
        return $user;
    }
}

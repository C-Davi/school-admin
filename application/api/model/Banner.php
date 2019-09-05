<?php

namespace app\api\model;

use think\Model;

class Banner extends Model
{
    protected $table = 'banner';
    protected $autoWriteTimestamp = 'datetime';
    protected $createTime = 'created_at';
    protected $updateTime = 'update_at';
}

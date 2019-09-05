<?php
/**
 * Date: 2019/8/26
 * Time: 10:43
 */

namespace app\admin\model;


use think\Model;

class ShareImg extends Model
{
    protected $table = 'share_img';
    protected $autoWriteTimestamp = 'datetime';
    protected $createTime = 'created_at';
    protected $updateTime = 'update_at';
}
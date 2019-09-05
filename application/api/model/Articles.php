<?php
/**
 * Date: 2019/8/20
 * Time: 15:18
 */

namespace app\api\model;


use think\Model;

class Articles extends Model
{
    protected $table = 'articles';
    protected $autoWriteTimestamp = 'datetime';
    protected $createTime = 'created_at';
    protected $updateTime = 'update_at';

    public static function getTypeArticles($type,$page,$pageSize)
    {
        return self::where('type',$type)
            ->order('created_at','desc')
            ->limit($page,$pageSize)
            ->select();
    }

    public static function getTotalPage($pageSize,$type)
    {
        $total = count(self::where('type',$type)->select());
        $totalPage = $total/$pageSize;
        return ceil($totalPage);
    }
}
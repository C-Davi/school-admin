<?php
/**
 * Date: 2019/8/20
 * Time: 15:17
 */

namespace app\api\controller\v1;

use app\api\controller\BaseController;
use app\api\model\Articles as ArticlesModel;
class Articles extends BaseController
{
    public function getArticles()
    {
        $params = input('post.');
        $type=$params['type'];
        $pageSize = 10;
        $page = ($params['page']-1)*$pageSize;
        $pageIndex = $params['page'];
        $totalPage = ArticlesModel::getTotalPage($pageSize,$type);
        $res = ArticlesModel::getTypeArticles($type,$page,$pageSize);
        if ($res){
            $data = [
                'list'      =>$res,
                'pageIndex' =>$pageIndex,
                'totalPage' =>$totalPage
            ];
            return show(1,'success',$data,200);
        }
    }

    public function changeArticles()
    {
        $params = input('post.');
        $type = $params['type'];
        $id = $params['id'];
        $res = ArticlesModel::where('id',$id)->find();
        $count = $res->likeNum;
        if ($type==1){
            $result = ArticlesModel::where('id',$id)->update(['likeNum'=>$count+1]);
        }else{
            $result = ArticlesModel::where('id',$id)->update(['likeNum'=>$count-1]);
        }
        if ($result){
            return show(1,'success',[],200);
        }
    }
}
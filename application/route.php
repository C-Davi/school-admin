<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;
//小程序路由
Route::group('api/:version/token',function (){
    Route::post('/user','api/:version.Token/getToken');
    Route::post('/app','api/:version.Token/getAppToken');
    Route::post('/verify','api/:version.Token/verifyToken');
});
Route::group('api/:version/article',function(){
    Route::post('','api/:version.Articles/getArticles');
    Route::post('/change','api/:version.Articles/changeArticles');
});
Route::group('api/:version/schedules',function (){
    Route::get('/:id','api/:version.Schedules/getAddressByType');
});
Route::group('api/:version/system',function (){
    Route::get('/logo','api/:version.System/getLogo');
    Route::get('banner','api/:version.System/getBanner');
    Route::get('/share','api/:version.System/getShareImg');
    Route::get('/getShareCanv','api/:version.System/getShareCanv');
});
Route::group('api/:version/schoolCollege',function (){
    Route::get('','api/:version.Schedules/getAllPhone');
});
Route::get('index/index/import','admin/Index/importRexcel');
//后台路由
Route::group('admin/login',function(){
    Route::get('', 'admin/Login/login');
    Route::post('check', 'admin/Login/check');
    Route::get('/out', 'admin/Login/logout');
});
Route::post('admin/image/upload', 'admin/Image/upload');
//管理员
Route::group('admin/admin',function (){
    Route::get('','admin/admin/index');
    Route::post('/change','admin/admin/changeType');
    Route::get('/add','admin/admin/add');
    Route::post('/add','admin/admin/create');
    Route::get('/edit','admin/admin/edit');
    Route::post('/edit','admin/admin/update');
});
//职务
Route::group('admin/role',function (){
    Route::get('','admin/admin/role');
    Route::post('/change','admin/admin/changeTypeRole');
    Route::get('/add','admin/admin/addRole');
    Route::post('/add','admin/admin/createRole');
    Route::get('/edit','admin/admin/editRole');
    Route::post('/edit','admin/admin/updateRole');
});
//学生管理
Route::group('admin/students',function (){
    Route::get('','admin/students/index');
    Route::get('/add','admin/students/add');
    Route::post('/add','admin/students/create');
    Route::get('/edit','admin/students/edit');
    Route::post('/edit','admin/students/update');
});
//部门
Route::group('admin/branch',function (){
    Route::get('','admin/branch/index');
    Route::post('/change','admin/branch/changeType');
    Route::get('/add','admin/branch/add');
    Route::post('/add','admin/branch/create');
    Route::get('/edit','admin/branch/edit');
    Route::post('/edit','admin/branch/update');
});
//学校地标
Route::group('admin/landmark',function (){
    Route::get('','admin/landmark/index');
    Route::post('/change','admin/landmark/changeType');
    Route::get('/add','admin/landmark/add');
    Route::post('/add','admin/landmark/create');
    Route::get('/edit','admin/landmark/edit');
    Route::post('/edit','admin/landmark/update');
});
//院系-专业-班级
Route::group('admin/college',function (){
    Route::get('','admin/college/index');
    Route::post('/change','admin/college/changeType');
    Route::get('/add','admin/college/add');
    Route::post('/add','admin/college/create');
    Route::get('/edit','admin/college/edit');
    Route::post('/edit','admin/college/update');
});
Route::group('admin/major',function (){
    Route::get('','admin/major/index');
    Route::post('/change','admin/major/changeType');
    Route::get('/add','admin/major/add');
    Route::post('/add','admin/major/create');
    Route::get('/edit','admin/major/edit');
    Route::post('/edit','admin/major/update');
});
Route::group('admin/classic',function (){
    Route::get('','admin/classic/index');
    Route::post('/change','admin/classic/changeType');
    Route::get('/add','admin/classic/add');
    Route::post('/add','admin/classic/create');
    Route::get('/edit','admin/classic/edit');
    Route::post('/edit','admin/classic/update');
});
Route::group('admin/SchoolCollege',function (){
    Route::get('','admin/SchoolCollege/index');
    Route::post('/change','admin/SchoolCollege/changeType');
    Route::get('/add','admin/SchoolCollege/add');
    Route::post('/add','admin/SchoolCollege/create');
    Route::get('/edit','admin/SchoolCollege/edit');
    Route::post('/edit','admin/SchoolCollege/update');
});
//系统设置
Route::group('admin/system',function (){
    Route::get('/logo','admin/system/logo');
    Route::post('/logo/change','admin/system/logoChangeType');
    Route::get('/logo/add','admin/system/logo_add');
    Route::post('/logo/add','admin/system/logo_create');
    Route::get('/banner','admin/system/banner');
    Route::post('/banner/change','admin/system/bannerChangeType');
    Route::get('/banner/add','admin/system/banner_add');
    Route::post('/banner/add','admin/system/banner_create');
    Route::get('/share','admin/system/share');
    Route::post('/share/change','admin/system/shareChangeType');
    Route::get('/share/add','admin/system/share_add');
    Route::post('/share/add','admin/system/share_create');
});

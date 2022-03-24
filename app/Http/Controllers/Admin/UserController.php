<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Completed_Shopping_List as CompletedModel;
use App\Models\User as UserModel;


class UserController extends Controller
{
    public function list(){
        //ページネーション
        $per_page=10;
        //一覧の取得
        $complete = CompletedModel:://where('user_id',Auth::id())
                                groupBy('user_id');
        //$complete->count();
        var_dump($complete->count());exit;
                                //->paginate($per_page);
                               
        $list = UserModel::orderBy('id','ASC')
                            ->paginate($per_page);
        //var_dump($list);exit;
        return view('admin.user.list',['list'=>$list]);
    }
    
 
}

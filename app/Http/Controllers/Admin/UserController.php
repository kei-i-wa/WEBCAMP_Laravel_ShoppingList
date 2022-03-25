<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\CompletedShoppingList as CompletedModel;
use App\Models\User as UserModel;


class UserController extends Controller
{
    public function list(){
        $list = UserModel::join('completed_shopping_lists','completed_shopping_lists.user_id','=','users.id')->get();
        var_dump($list);exit;
        //$list = UserModel::all();
        return view('admin.user.list',['list'=>$list]);
        //ページネーション
        //$per_page=10;
        //一覧の取得
        //$complete = CompletedModel:://where('user_id',Auth::id())
          //                      groupBy('user_id');
        //$complete->count();
        //var_dump($complete->count());exit;
                                //->paginate($per_page);
        
        //$user = UserModel::withCount('posts')->get();
        //$user->posts_count;                       
        //$list = UserModel::orderBy('id','ASC')
          //                  ->paginate($per_page);
        //var_dump($user);exit;
        //return view('admin.user.list',['list'=>$list]);
    }
    
 
}

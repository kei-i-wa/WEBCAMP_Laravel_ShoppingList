<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Completed_Shopping_List as CompletedModel;

class UserController extends Controller
{
    public function list(){
        //ページネーション
        $per_page=2;
        //一覧の取得
        $list = CompletedModel:://where('user_id',Auth::id())
                                orderBy('user_id','DESC')
                                ->groupBy('name')
                                ->paginate($per_page);
        return view('admin.user.list',['list'=>$list]);
    }
    
 
}

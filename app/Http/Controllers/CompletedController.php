<?php
declare(strict_types=1);
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CompletedShoppingList as CompletedModel;

class CompletedController extends Controller
{
    //
    public function list(){
        //shoppinglistフォルダ内にあるlist.blade.phpを表示させる
        //ページネーション
        $per_page=2;
        //一覧の取得
        $list = CompletedModel::where('user_id',Auth::id())
                                ->orderBy('name','DESC')
                                ->orderBy('created_at','ASC')
                                ->paginate($per_page);
        return view('shoppinglist.completed_list',['list'=>$list]);
    }
    
}

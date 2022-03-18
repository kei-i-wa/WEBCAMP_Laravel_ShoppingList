<?php
declare(strict_types=1);
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShoppingListRegisterPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\ShoppingLists as ShoppingListModel;

class ShoppingListController extends Controller
{
    //
    public function list(){
        //shoppinglistフォルダ内にあるlist.blade.phpを表示させる
        return view('shoppinglist.list');
    }
    
    public function register(ShoppingListRegisterPostRequest $request){
        $datum = $request->validated();
        $user = Auth::user();
        $datum['user_id']=Auth::id();
        try{
            $r = ShoppingListModel::create($datum);
        }catch(\Throwable $e){
            echo $e->getMessage();
            exit;
        }
        // var_dump($r); exit;
        // var_dump($datum);exit;
        //登録成功
        $request->session()->flash('front.shoppinglist_register_success',true);
        return redirect('/shopping_list/list');
    }
}

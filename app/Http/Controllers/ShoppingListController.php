<?php
declare(strict_types=1);
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShoppingListRegisterPostRequest;

class ShoppingListController extends Controller
{
    //
    public function list(){
        //shoppinglistフォルダ内にあるlist.blade.phpを表示させる
        return view('shoppinglist.list');
    }
    
    public function register(ShoppingListRegisterPostRequest $request){
        $datum = $request->validated();
        var_dump($datum);exit;
    }
}

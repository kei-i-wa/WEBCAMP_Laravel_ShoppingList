<?php
declare(strict_types=1);
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShoppingListController extends Controller
{
    //
    public function list(){
        //shoppinglistフォルダ内にあるlist.blade.phpを表示させる
        return view('shoppinglist.list');
    }
}

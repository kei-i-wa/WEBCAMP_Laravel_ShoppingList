<?php
declare(strict_types=1);
namespace App\Http\Controllers;
//requestクラス使用のため
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    //
    public function index(){
        return view('index');
    }
    
    public function login(Request $request){
        $validatedData = $request->validated();
        var_dump($validatedData);exit;
    }
}

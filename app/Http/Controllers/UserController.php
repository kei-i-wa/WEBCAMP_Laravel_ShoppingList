<?php
declare(strict_types=1);
namespace App\Http\Controllers;
//requestクラス使用のため
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;

class Userontroller extends Controller
{
    //
    public function index(){
        return view('user.index');
    }
    
    public function register(Request $request){
        $datum = $request->validated();
        var_dump($validatedData);exit;
    }
}

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
    
   public function register(UserRegisterPost $request)
    {
        $datum = $request->validated();
        $datum['password'] = Hash::make($datum['password']);
        try{
            $r= UserModel::create($datum);
            $request->session()->flash('front.user_register_success',true);
        }catch(\Throwable $e){
            // echo $e->getMessage();
            $request->session()->flash('front.user_register_failure', true);
        }
        return redirect('/');
    }
}

<?php
declare(strict_types=1);
namespace App\Http\Controllers;
//requestクラス使用のため
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//authクラス利用のため
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginPostRequest;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function index(){
        return view('index');
    }
    
    public function login(LoginPostRequest $request){
        $datum = $request->validated();
        if(Auth::attempt($datum) === false){
            return back()
                ->withInput()
                ->withErrors(['auth'=>'emailかパスワードに誤りがあります。',]);
        }
        $request->session()->regenerate();
        return redirect()->intended('shopping_list/list');
    }
    
    public function logout(Request $request){
        Auth::logout();
        //CSRFトークンの再生成
        $request->session()->regenerateToken();
        //セッションIDの再生成
        $request->session()->regenerate();
        return redirect(route('front.index'));
    }
}

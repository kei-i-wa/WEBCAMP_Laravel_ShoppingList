<?php
declare(strict_types=1);
namespace App\Http\Controllers;
//requestクラス使用のため
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//authクラス利用のため
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginPostRequest;

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
    
    public function logout(){
        Auth::logout();
        //CSRFトークンの再生成
        $request->session()->regenerateToken();
        //セッションIDの再生成
        $request->session()->regenerate();
        return redirect(route('front.index'));
    }
//   public function register(UserRegisterPost $request)
//     {
//         $datum = $request->validated();
//         $datum['password'] = Hash::make($datum['password']);
//         try{
//             $r= UserModel::create($datum);
//             $request->session()->flash('front.user_register_success',true);
//         }catch(\Throwable $e){
//             // echo $e->getMessage();
//             $request->session()->flash('front.user_register_failure', true);
//         }
//         return redirect('/');
//     }
}

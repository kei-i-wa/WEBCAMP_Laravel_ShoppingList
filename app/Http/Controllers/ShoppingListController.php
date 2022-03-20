<?php
declare(strict_types=1);
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShoppingListRegisterPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\ShoppingLists as ShoppingListModel;
use Illuminate\Support\Facades\DB;
use App\Models\Completed_Shopping_List as CompletedModel;

class ShoppingListController extends Controller
{
    //
    public function list(){
        //shoppinglistフォルダ内にあるlist.blade.phpを表示させる
        //ページネーション
        $per_page=2;
        //一覧の取得
        $list = ShoppingListModel::where('user_id',Auth::id())
                                ->orderBy('name','DESC')
                                ->paginate($per_page);
        return view('shoppinglist.list',['list'=>$list]);
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
    
    protected function getShoppingListModel($shopping_list_id){
        $shopping_list=ShoppingListModel::find($shopping_list_id);
        if($shopping_list===null){
            return null;
        }
        if($shopping_list->user_id!==Auth::id()){
            return null;
        }
        return $shopping_list;
    }
    
    public function delete(Request $request,$shopping_list_id){
        $shopping_list = $this->getShoppingListModel($shopping_list_id);
        //中身があれば削除する
        if($shopping_list !== null){
            $shopping_list->delete();
            $request->session()->flash('front.shopping_list_delete_success',true);
        }
        return redirect('shopping_list/list');
    }
    
    public function complete(Request $request,$shopping_list_id){
        try{
            DB::beginTransaction();
            $shopping_list=$this->getShoppingListModel($shopping_list_id);
            if($shopping_list===null){
                throw new \Exception('');
            }
            //買い物リストからは削除する
            $shopping_list->delete();
            //var_dump($shopping_list->toArray()); exit;
            $shop_datum = $shopping_list->toArray();
            unset($shop_datum['created_at']);
            unset($shop_datum['updated_at']);
            $r = CompletedModel::create($shop_datum);
            if($r===null){
                throw new \Exception('');
            }
            Db::commit();
            $request->session()->flash('front.shopping_list_completed_success',true);
        }catch(\Throwable $e){
            var_dump($e->getMessage()); exit;
            DB::rollBack();
            $request->session()->flash('front.shopping_list_completed_failure',true);
        }
        return redirect('shopping_list/list');
    }
}

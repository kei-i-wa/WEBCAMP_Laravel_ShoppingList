@extends('layout')

@section('title')@endsection

@section('contents')
@if($errors->any())
    <div>
        @foreach($errors->all() as $error)
        {{ $error }}<br>
        @endforeach
    </div>
@endif
@if(session('front.shoppinglist_register_success')===true)
    買うものリストに追加しました。<br>
@endif
@if(session('front.shopping_list_delete_success')===true)
    削除しました。
@endif
@if(session('front.shopping_list_completed_success')===true)
    買い物完了にしました。
@endif
@if(session('front.shopping_list_completed_failure')===true)
    買い物の完了処理に失敗しました。
@endif

    <h1>「買うもの」の登録</h1>
    <form action="./register" method="post">
        @csrf
        「買うもの」名：<input name="name" value="{{ old('name') }}"><br>
        <button>「買うもの」を登録する</button><br>
    </form>
    
    <h1>「買うもの」一覧</h1>
    <a href="../completed_shopping_list/list">購入済み一覧</a>
    <table border="1">
        <tr>
            <th>登録日</th>
            <th>「買うもの」名</th>
        </tr>
        @foreach($list as $shopping)
        <tr>
            <td>{{ date('Y年m月d日',strtotime($shopping->created_at)) }}</td>
            <td>{{ $shopping->name }}</td>
            <td><form action="{{ route('complete',['shopping_list_id'=>$shopping->id])}}"method ="post">
                @csrf<button onclick='return confirm("「完了」にします。よろしいですか？");'>完了</button>
            </form></td> 
            <td><form action="{{ route('delete',['shopping_list_id'=>$shopping->id]) }}" method ="post">
                @csrf
                @method('DELETE')
            <button onclick='return confirm("削除します。よろしいですか？");'>削除</button>
            </form></td>
        </tr>
        @endforeach
    </table>
        <!-- ページネーション -->
        現在 {{ $list->currentPage() }} ページ目<br>
        @if ($list->onFirstPage() === false)
        <a href="/shopping_list/list">最初のページ</a>
        @else
        最初のページ
        @endif
        /
        @if ($list->previousPageUrl() !== null)
            <a href="{{ $list->previousPageUrl() }}"><<</a>
        @else
            <<
        @endif
        /
        @if ($list->nextPageUrl() !== null)
            <a href="{{ $list->nextPageUrl() }}">>></a>
        @else
            >>
        @endif
        <br>
        <hr>
    
    
    <a href="/logout">ログアウト</a>
@endsection


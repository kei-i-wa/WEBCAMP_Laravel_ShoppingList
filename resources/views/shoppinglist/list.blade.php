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
    <h1>買い物リスト</h1>
    <form action="./register" method="post">
        @csrf
        「買うもの」名：<input name="name" value="{{ old('name') }}"><br>
        <button>登録する</button><br>
    </form>
    <a href="/logout">ログアウト</a>
@endsection


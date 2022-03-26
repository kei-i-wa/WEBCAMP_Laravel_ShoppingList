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
@if(session('front.user_register_success')==true)
    ユーザーを登録しました。<br>
@endif
    <h1>ログイン</h1>
    <form action="/login" method="post">
        @csrf
        email：<input name="email" value="{{ old('email') }}"><br>
        パスワード：<input  name="password" type="password"><br>
        <button>ログインする</button><br>
    </form>
    <a href ="user/register">会員登録</a>
@endsection

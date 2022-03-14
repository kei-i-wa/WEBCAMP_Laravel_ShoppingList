@extends('layout')

@section('title')@endsection

@section('contents')
    <h1>ログイン</h1>
    <form action="/login" method="post">
        email：<input name="email"><br>
        パスワード：<input  name="password" type="password"><br>
        <button>ログインする</button><br>
        <button>会員登録</button>
    </form>
@endsection

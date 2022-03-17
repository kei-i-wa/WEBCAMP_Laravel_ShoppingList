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
    <h1>買い物リスト</h1>
    <form action="shopping_list/register" method="post">
        @csrf
        「買うもの」名：<input name="name" value="{{ old('name') }}"><br>
        <button>登録する</button><br>
    </form>
    <a href="/logout">ログアウト</a>
@endsection


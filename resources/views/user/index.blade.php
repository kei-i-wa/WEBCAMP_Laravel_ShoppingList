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
    <h1>会員登録</h1>
    <form action="/user/register" method="post">
        @csrf
        name:<input name="name" value="{{old('name')}}"><br>
        email：<input name="email" value="{{ old('email') }}"><br>
        パスワード：<input  name="password" type="password"><br>
        <button>会員登録する</button>
    </form>
@endsection
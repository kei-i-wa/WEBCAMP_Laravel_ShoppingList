@extends('layout')

@section('title')@endsection

@section('contents')
    <h1>ユーザー一覧</h1>
    <table border="1">
        <tr>
            <th>ユーザーID</th>
            <th>ユーザー名</th>
            <th>購入した「買うもの」数</th>
        </tr>
       @foreach($list as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>カウント</td>
        </tr>
        @endforeach
    </table>*/
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

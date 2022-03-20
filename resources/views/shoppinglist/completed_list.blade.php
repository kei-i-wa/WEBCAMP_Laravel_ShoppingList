@extends('layout')

@section('title')@endsection

@section('contents')
    <h1>購入済みリスト</h1>
    <br>
    <a href="../shopping_list/list">買い物リストへ戻る</a>
    <table border="1">
        <tr>
            <th>買うもの</th>
            <th>購入日</th>
        </tr>
        @foreach($list as $shopping)
        <tr>
            <td>{{ $shopping->name }}</td>
            <td>{{ $shopping->created_at }}</td>
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


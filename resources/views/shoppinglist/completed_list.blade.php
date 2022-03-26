@extends('layout')

@section('title')@endsection

@section('contents')
    <h1>購入済み一覧</h1>
    <br>
    <a href="../shopping_list/list">「買うもの」一覧へ戻る</a>
    <table border="1">
        <tr>
            <th>「買うもの」名</th>
            <th>購入日</th>
        </tr>
        @foreach($list as $shopping)
        <tr>
            <td>{{ $shopping->name }}</td>
            <td>{{ date('Y年m月d日',strtotime($shopping->created_at)) }}</td>
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


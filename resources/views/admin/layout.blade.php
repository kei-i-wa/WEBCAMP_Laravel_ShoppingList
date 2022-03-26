<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>お買い物リスト 管理画面</title> @yield('title')</title>
    </head>
    <body>
    <menu label="リンク">
        <a href="/admin/top">管理画面TOP</a><br>
        <a href="/admin/user/list">ユーザ一覧</a><br>
        <a href="/admin/logout">ログアウト</a><br>
    </menu>
@yield('contents')
    </body>
</html>
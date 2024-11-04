<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>買い物リスト(一覧画面)</title>
    </head>
    <body>
        <h1>「買うもの」の登録</h1>
            <form action="./top.html" method="post">
                「買うもの」名:<input><br>

                <button>タスクを登録する</button>
            </form>

        <h1>タスクの一覧</h1>
        <a href="./top.html">CSVダウンロード</a><br>
        <table border="1">
        <tr>
            <th>登録日
            <th>「買うもの」名
        <tr>
            <td>2022/01/01
            <td>焼肉
            <td><form action="./top.html"><button>完了</button>
            <td><form action="./top.html"><button>削除</button>
            </form>
        <tr>

        </table>
        <!-- ページネーション -->
        現在 1 ページ目<br>
        <a href="./top.html">最初のページ</a> /
        <a href="./top.html">前に戻る</a> /
        <a href="./top.html">次に進む</a>
        <br>
        <hr>
        <menu label="リンク">
        <a href="./index.html">ログアウト</a><br>
        </menu>
    </body>
</html>
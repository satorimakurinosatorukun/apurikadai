<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="gamen2.css">
    <title>おみくじ</title>
</head>
<style>
    h1{
        text-align: center;
    }

    #back_button1{
        text-align: center;
        writing-mode: horizontal-tb;
    }

</style>
<body>
    <h1>おみくじを引いてみよう！ </h1>
    <div id="button_01">
        <!-- 運気設定画面にいく -->
        <a class="Button" href="page4.php">内容設定</a>
    </div>

    <div id="back_button1">
        <!-- スタート画面にいく -->
        <a class="Button1" href="page1.php">戻る</a>
    </div>

    <div>
        <table border="1"  id="hyou" >
            <tr>
                <th width="50">1</th>
                <th width="100" height="80">大吉</th>
            </tr>
            <tr>
                <th width="50">2</th>
                <th width="100" height="80">中吉</th>
            </tr>
            <tr>
                <th width="50">3</th>
                <th width="100" height="80">小吉</th>
            </tr>
            <tr>
                <th width="50">4</th>
                <th width="100" height="80">吉</th>
            </tr>
            <tr>
                <th width="50">5</th>
                <th width="100" height="80">凶</th>
            </tr>
            <tr>
                <th width="50">6</th>
                <th width="100" height="80">大凶</th>
            </tr>

        </table>
    </div>

</body>
</html>
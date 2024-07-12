<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "omikuji";
$dsn = "mysql:host={$host};dbname={$dbname};charset=utf8";

// HTMLエスケープ用の関数
function es($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}
try {
    //データベースの接続
    $pdo = new PDO($dsn , $user , $password);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);//->　は　〜の
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($_SERVER["REQUEST_METHOD"]  == "POST"){
        if(isset($_POST['roguin_b'])){//ログインボタンが押された場合
            //usernameの登録
            $new_un1 = $_POST[''];
            $sql_update = "UPDATE unki SET un = :sql_1 WHERE ID = 1 ";
            $stm_update = $pdo->prepare($sql_update);
            $stm_update->bindParam(':sql_1', $new_un1, PDO::PARAM_STR);
            $stm_update->execute();

            //passwordの登録
            $new_un2 = $_POST[''];
            $sql_update = "UPDATE unki SET un = :sql_2 WHERE ID = 2 ";
            $stm_update = $pdo->prepare($sql_update);
            $stm_update->bindParam(':sql_2', $new_un2, PDO::PARAM_STR);
            $stm_update->execute();

            //上のやつは持ってきただけやしデータベースないけ見れんけ、壮亜があとは変えてくれ！！！！！！！！！！！！！！！！！
            //ラインでも言った通りそもそもデータベースに登録するなら上の奴が必要と思うけど、間に合わんそうなら元々データベース
            //に入れとって、うったユーザーネーム、パスワードがデータベースにあるやつと同じならログインボタンを押したらpage1に
            //にいけるみたいにするかどうかやね、
            //やりよることはもうpage4と変わらんと思うけど、ログインボタンを押してログインできる時の条件を書くのがワンチャン
            //大変かもしれん！！できそうにないならもう変えてもうろてもけっこう！！！！おやすみ...

        }
    }
    
} catch(Exception $e) {
    echo '<span>エラー</span><br>';
    echo $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>hurikugi</title>
        <link rel="stylesheet" href="gamen0.css">
    </head>

<body>
    <div class="login">
        <div class="login-screen">
            <div class="app-title">
                <h1>Login</h1>
            </div>

            <div class="login-form">

                <div class="control-group">
                <input name="user_name" type="text" class="login-field" value="ユーザーネーム" placeholder="username" id="login-name"><!--そうあくんvalueの中身なくてもいいかもしれん-->
                <label class="login-field-icon fui-user" for="login-name"></label>
                </div>

                <div class="control-group">
                <input name="user_password" type="password" class="login-field" value="パスワード" placeholder="password" id="login-pass"><!--上記と同じかも-->
                <label class="login-field-icon fui-lock" for="login-pass"></label>
                </div>

                <input name = "roguin_b" type="submit" value="ログイン" class="btn btn-primary btn-large btn-block" href="page1.php">
                <a class="login-link" href="#">Lost your password?</a>

            </div>
        </div>
    </div>
</body>
</html>

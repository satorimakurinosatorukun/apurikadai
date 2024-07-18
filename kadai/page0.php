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
    $pdo = new PDO($dsn , $user , $password);//pdoというデータベースにつなぐための機械を生成（インスタンスの作成）
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);//pdoの中身に機能を入れてる
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//pdoの中身に機能を入れてる

    if($_SERVER["REQUEST_METHOD"]  == "POST"){//ポストメソッドが発動されたら実行
        if(isset($_POST['touroku_b'])){//新規登録ボタンが押された場合
            // ユーザー名とパスワードの取得（HTMLエスケープを適用）
            $user_name_sql = es($_POST['user_name']);        //POSTメソッドで受け取ったモノを変数に格納
            $user_password_sql = es($_POST['user_password']);//es関数を使うことによってsqlインジェクション対策になる

            $sql_insert = "INSERT INTO `login_table` (`username_d`, `userpassword_d`) VALUES (:sql_1, :sql_2)";
            $stm_insert = $pdo->prepare($sql_insert);//与えられたSQL文をデータベースに対して準備
            $stm_insert->bindParam(':sql_1', $user_name_sql, PDO::PARAM_STR);
            $stm_insert->bindParam(':sql_2', $user_password_sql, PDO::PARAM_INT);
            $stm_insert->execute();

            echo "新規登録が完了しました。";
        }
        if (isset($_POST['roguin_b'])) { // ログインボタンが押された場合
            // ユーザー名とパスワードの取得
            $user_name_sql = es($_POST['user_name']);
            $user_password_sql = es($_POST['user_password']);

            // ユーザー認証のSQLクエリ
            $sql_authenticate = "SELECT * FROM `login_table` WHERE `username_d` = :username AND `userpassword_d` = :password";
            $stm_authenticate = $pdo->prepare($sql_authenticate);
            $stm_authenticate->bindParam(':username', $user_name_sql, PDO::PARAM_STR);
            $stm_authenticate->bindParam(':password', $user_password_sql, PDO::PARAM_INT);
            $stm_authenticate->execute();

            // ユーザーが存在するかチェック
            if ($stm_authenticate->rowCount() > 0) {//実行された結果として１行以上帰ってきたら実行
                // 認証成功した場合は次の画面にリダイレクト
                header("Location: page1.php");
                exit();
            } else {
                // 認証失敗時の処理
                echo '<span>ユーザネームもしくはパスワードが違います</span><br>';
            }
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
            <form action="page0.php" method="post">
                <div class="login-form">

                    <div class="control-group">
                        <input name="user_name" type="text" class="login-field" value="" placeholder="username" id="login-name">
                        <label class="login-field-icon fui-user" for="login-name"></label>
                    </div>

                    <div class="control-group">
                        <input name="user_password" type="password" class="login-field" value="" placeholder="password" id="login-pass">
                        <label class="login-field-icon fui-lock" for="login-pass"></label>
                    </div>
                    <input name = "roguin_b" type="submit" value="ログイン" class="btn btn-primary btn-large btn-block">
                    <input name = "touroku_b" type="submit" value="新規登録" class="buttom_1">

                </div>
            </form>
            <a class="login-link" href="#">パスワードをお忘れの方はこちら</a>
        </div>
    </div>
</body>
</html>

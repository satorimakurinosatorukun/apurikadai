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
    echo 'a';
    $pdo = new PDO($dsn , $user , $password);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "データベース{$dbname}接続<br>";

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
    <link rel="stylesheet" href="gamen3.css">
    <title>おみくじ</title>
</head>
<body>
    <h1>結果発表！！ </h1>
    <style>
        h1{
            text-align: center;
        }
        #ar_button{
            display: block;
            margin: auto;
        }
        #sr{
            line-height:10px;
        }
    </style>
    <button id="result">結果を見る</button>
<!-- 戻るボタン -->
<div id="back_button2">
    <a class="Button2" href="page1.html">戻る</a>
</div>
</body>
</html>
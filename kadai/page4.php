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
    $pdo = new PDO($dsn , $user , $password);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "データベース{$dbname}接続<br>";

    $sql = "SELECT * FROM unki";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    
    #es関数の処理は上のfunction esに記述している
    foreach ($result as $row) {
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
    <link rel="stylesheet" href="gamen4.css">
    <title>おみくじ</title>
</head>
<body>
    <h1>運気設定</h1>
    <div>
        <table border="1" align="center">
            <tr>
                <th width="100" height="80">恋愛運</th>
                <th width="100" height="80">仕事運</th>
            </tr>
            <tr>
                <th width="100" height="80">金運</th>
                <th width="100" height="80">健康運</th>
            </tr>
        </table>
    </div>

<!-- 戻るボタン -->
<div id="back_button3">
    <a class="Button3" href="page3.html" text align="center">戻る</a>
</div>
</body>
</html>
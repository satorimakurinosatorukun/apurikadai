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
    <div class="space">
        <table class="Table">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // form method = postからデータを受け取る
                $un_1 = $_POST[''];
                $kiti = $_POST[''];
                try {
                    echo 'a';
                    $pdo = new PDO($dsn , $user , $password);
                    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    echo "データベース{$dbname}接続<br>";
                
                    if($_SERVER["REQUEST_METHOD"]  == "POST"){
                        echo 'a';
                        $new_un1 = $_POST['un_1'];
                        $stm_update = "SELECT DISTINCT * FROM  WHERE";
                        $stm_update = $pdo->prepare($sql_update);
                        $stm_update->bindParam(':sql_1', $new_un1, PDO::PARAM_STR);
                        $stm_update->execute();
                        
                
                
                    }
                
                } catch(Exception $e) {
                    echo '<span>エラー</span><br>';
                    echo $e->getMessage();
                    exit();
                }
            }

                echo "<thead><tr>";
                echo "<th>運勢</th><th>今日の運勢</th>";
                echo "</tr></thead>";

                echo "<tbody>";
                #es関数の処理は上のfunction esに記述している

                foreach ($result as $row) {
                    echo "<tr>";
                    echo "<td>", es($row['']), "</td>";
                    echo "<td>", es($row['']), "</td>";
                    echo "</tr>";

                }

                echo "</tbody>";
            ?>
        </table>
    </div>

    <button id="result">結果を見る</button>
<!-- 戻るボタン -->
<div id="back_button2">
    <a class="Button2" href="page1.html">戻る</a>
</div>
</body>
</html>
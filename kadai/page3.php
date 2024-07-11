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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // form method = postからデータを受け取る
    if(isset($_POST['touroku_b'])){//登録ボタンが押された場合
        echo 'a';
        try {
            echo 'b';
            $sql_select = "SELECT un FROM `unki`WHERE ID IN (1, 2, 3, 4)   ORDER BY RAND() LIMIT 1 ";
            $stm_select = $pdo->prepare($sql_update);
            $stm_update->execute();
            echo $sql_select;
        } catch(Exception $e) {
            echo '<span>エラー</span><br>';
            echo $e->getMessage();
            exit();
        }
    }
    
}
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
        <table>
            <tr><!-- 3つのth -->
                <th>運勢</th> <th>内容</th> 
            </tr>
            <tr><!-- 3つのtd -->
                <td></td> <td></td> 
            </tr>
        </table>
        
        

        <form action="page3.php" method="post">
            <button id="result" type="submit" name ="kekka_b" >結果を見る</button>
        </form>
        <!-- 戻るボタン -->
        <div id="back_button2">
            <a class="Button2" href="page1.php">戻る</a>
        </div>
    </body>
</html>
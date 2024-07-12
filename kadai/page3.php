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
        // データベースへの接続
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($_POST['touroku_b'])){//登録ボタンが押された場合
            try {
                $sql_select = "SELECT un FROM `unki`WHERE ID IN (1, 2, 3, 4)   ORDER BY RAND() LIMIT 1 ";
                $stm_select = $pdo->prepare($sql_select);
                $stm_select->execute();
                $row = $stm_select->fetch(PDO::FETCH_ASSOC); // 結果を取得

                $sql_select2 = "SELECT naiyou FROM `unsei`WHERE ID_0 IN (1, 2, 3, 4,5,6)   ORDER BY RAND() LIMIT 1 ";
                $stm_select2 = $pdo->prepare($sql_select2);
                $stm_select2->execute();
                $row2 = $stm_select2->fetch(PDO::FETCH_ASSOC); // 結果を取得
            } catch(Exception $e) {
                echo '<span>エラー</span><br>';
                echo $e->getMessage();
                exit();
            }
        }
        
    }
?>  
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="gamen3.css">
        <title>おみくじ</title>
    </head>
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
    <body>
        <h1>結果発表！！</h1>
        <form action="page3.php" method="post">
            <table border="1" bgcolor="pink">
                <tr>
                    <div id="a-1">
                        <th>運勢</th> 
                    </div>
                    <div id="a-1">
                        <th>内容</th> 
                    </div>
                </tr>
                <tr>
                    <td>
                        <div id="a-1">
                            <?php echo isset($row2['naiyou']) ? es($row2['naiyou']) : ''; ?>  
                        </div>
                    </td> 
                    <td>
                        <div id="a-1">
                            <?php echo isset($row['un']) ? es($row['un']) : ''; ?>  
                        </div>   
                    </td> 
                </tr>
            </table>
            <!-- 結果ボタン -->
            
            <input name = "touroku_b" type="submit" id="kekka" value="結果を見る" class="keka">
            <style>
                .keka{
                    font-size: 25pt;
                    text-align: center;
                    cursor: pointer;
                    padding: 20px 20px;
                    background: #ff0000;
                    color: #ffffff;
                    line-height: 1em;
                    transition: 3s;
                    box-shadow: 6px 6px 3px #ff0000;
                    border: 2px solid #ff0000;
                }
            </style>
            
        </form>
        <!-- 戻るボタン -->
        <div id="back_button2">
            <a class="Button2" href="page1.php">タイトルへ戻る</a>
        </div>
    </body>
</html>
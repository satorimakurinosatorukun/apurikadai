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
        <form action="page3.php" method="post">
            <table border="5">
                <tr>
                    <th>運勢</th> <th>内容</th> 
                </tr>
                <tr>
                    <td>
                        <div>
                            <?php echo isset($row2['naiyou']) ? es($row2['naiyou']) : ''; ?>  
                        </div>
                    </td> 
                    <td>
                        <div>
                            <?php echo isset($row['un']) ? es($row['un']) : ''; ?>  
                        </div>   
                    </td> 
                </tr>
            </table>
            <!-- <button id="result" type="submit" name ="kekka_b" >
                結果を見る
            </button> -->
            <div class="touroku_button" id="Touroku">
                <input name = "touroku_b" type="submit" value="結果を見る">
            </div>


        </form>
        <!-- 戻るボタン -->
        <div id="back_button2">
            <a class="Button2" href="page1.php">戻る</a>
        </div>
    </body>
</html>
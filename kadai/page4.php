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
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);//->　は　〜の
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($_SERVER["REQUEST_METHOD"]  == "POST"){
        if(isset($_POST['touroku_b'])){//登録ボタンが押された場合
            //ID１の登録
            $new_un1 = $_POST['un_1'];
            $sql_update = "UPDATE unki SET un = :sql_1 WHERE ID = 1 ";
            $stm_update = $pdo->prepare($sql_update);
            $stm_update->bindParam(':sql_1', $new_un1, PDO::PARAM_STR);
            $stm_update->execute();

            //ID2の登録
            $new_un2 = $_POST['un_2'];
            $sql_update = "UPDATE unki SET un = :sql_2 WHERE ID = 2 ";
            $stm_update = $pdo->prepare($sql_update);
            $stm_update->bindParam(':sql_2', $new_un2, PDO::PARAM_STR);
            $stm_update->execute();

            //ID3の登録
            $new_un3 = $_POST['un_3'];
            $sql_update = "UPDATE unki SET un = :sql_3 WHERE ID = 3 ";
            $stm_update = $pdo->prepare($sql_update);
            $stm_update->bindParam(':sql_3', $new_un3, PDO::PARAM_STR);
            $stm_update->execute();

            //ID4の登録
            $new_un4 = $_POST['un_4'];
            $sql_update = "UPDATE unki SET un = :sql_4 WHERE ID = 4 ";
            $stm_update = $pdo->prepare($sql_update);
            $stm_update->bindParam(':sql_4', $new_un4, PDO::PARAM_STR);
            $stm_update->execute();   
        }
    }
    if($_SERVER["REQUEST_METHOD"]  == "POST"){
        if(isset($_POST['sakujo_b'])){//削除ボタンが押された場合
            //ID１の削除
            // $new_un1 = $_POST['un_1'];
            $sql_update = "UPDATE unki SET un = NULL WHERE ID = 1 ";
            $stm_update = $pdo->prepare($sql_update);
            //$stm_update->bindParam(':sql_1', $new_un1, PDO::PARAM_STR);
            $stm_update->execute();

            // ID2の登録
            // $new_un2 = $_POST['un_2'];
            $sql_update = "UPDATE unki SET un = NULL WHERE ID = 2 ";
            $stm_update = $pdo->prepare($sql_update);
            // $stm_update->bindParam(':sql_2', $new_un2, PDO::PARAM_STR);
            $stm_update->execute();

            // ID3の登録
            // $new_un3 = $_POST['un_3'];
            $sql_update = "UPDATE unki SET un = NULL WHERE ID = 3 ";
            $stm_update = $pdo->prepare($sql_update);
            // $stm_update->bindParam(':sql_3', $new_un3, PDO::PARAM_STR);
            $stm_update->execute();

            // //ID4の登録
            // $new_un4 = $_POST['un_4'];
            $sql_update = "UPDATE unki SET un = NULL WHERE ID = 4 ";
            $stm_update = $pdo->prepare($sql_update);
            // $stm_update->bindParam(':sql_4', $new_un4, PDO::PARAM_STR);
            $stm_update->execute();   
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
    <link rel="stylesheet" href="gamen4.css">
    <title>おみくじ</title>
</head>
<body>
    <h1>内容設定</h1>
    <form action="page4.php" method="post">
        <div>
            <table border="1" bgcolor="pink">
                <div >
                    <tr>
                        <th>
                            <div id="aaa-1">
                                <input type="text" name="un_1" value="<?php echo es($_POST['un_1'] ?? '恋愛運'); ?>">
                            </div>
                        </th>
                        <th>
                            <div id="aaa-1">
                                <input type="text" name="un_2" value="<?php echo es($_POST['un_2'] ?? '仕事運'); ?>">
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div id="aaa-1">
                                <input type="text" name="un_3" value="<?php echo es($_POST['un_3'] ?? '金運'); ?>">

                            </div>
                        </th>
                        <th>
                            <div id="aaa-1">
                                <input type="text" name="un_4" value="<?php echo es($_POST['un_4'] ?? '健康運'); ?>">
                            </div>
                        </th>
                    </tr>
                </div>
                
            </table>
            <div class="flex">
                <!--登録ボタン-->
                <div >
                    <input name = "touroku_b" type="submit" value="登録" class="button1">
                </div>
                <!--削除ボタン!-->
                <div>
                    <input name="sakujo_b" type="submit" value="削除" class="button2" onclick="clearFields()">
                </div>
            </div>
            <style>
                .button1{
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
                .button2{
                    font-size: 25pt;
                    text-align: center;
                    cursor: pointer;
                    padding: 20px 20px;
                    background: #000066;
                    color: #ffffff;
                    line-height: 1em;
                    transition: 3s;
                    box-shadow: 6px 6px 3px #000066;
                    border: 2px solid #000066;
                }
            </style>
        </div>

    </form>
    <!-- 戻るボタン -->

    <div id="back_button3">
        <a class="Button3" href="page1.php" text align="center">戻る</a>
    </div>
    <!--引くボタン -->

    <div id="push_button3">
        <a class="Button4" href="page3.php" text align="center">引く！</a>
    </div>

    <script>
        function clearFields() {
            document.getElementsByName('un_1')[0].value = '';
            document.getElementsByName('un_2')[0].value = '';
            document.getElementsByName('un_3')[0].value = '';
            document.getElementsByName('un_4')[0].value = '';
        }
    </script>
</body>
</html>
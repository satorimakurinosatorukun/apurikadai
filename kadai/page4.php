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
    <h1>運気設定</h1>
    <form action="page4.php" method="post">
        <div>
            <table border="1" bgcolor="pink">
                <div >
                    <tr>
                        <th>
                            <div id="aaa-1">
                                <input type="text" name = "un_1" value="恋愛運">
                            </div>
                        </th>
                        <th>
                            <div id="aaa-1">
                                <input type="text" name = "un_2" value="仕事運">
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <th>
                            <div id="aaa-1">
                                <input type="text" name = "un_3" value="金運">
                            </div>
                        </th>
                        <th>
                            <div id="aaa-1">
                                <input type="text" name = "un_4" value="健康運">
                            </div>
                        </th>
                    </tr>
                </div>
                
            </table>
            <div class="flex">
                <!--登録ボタン-->
                <div class="touroku_button" id="Touroku">
                    <input name = "touroku_b" type="submit" value="登録">
                </div>

                <!--削除ボタン!-->
                <div class="sakujo_button" id="Sakuzyo">
                    <input name = "sakujo_b" type="submit" value="削除">
                </div>
            </div>
        </div>

    </form>
    <!-- 戻るボタン -->

    <div id="back_button3">
        <a class="Button3" href="page3.php" text align="center">戻る</a>
    </div>
</body>
</html>
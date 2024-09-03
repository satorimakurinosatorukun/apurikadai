<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>パスワードお忘れの場合</title>
    <link rel="stylesheet" href="gamen0_1.css">
</head>
<body>
    <div class="container">
        <h2>パスワードを忘れた場合</h2>
        <p>登録したメールアドレスを入力してください。<br>
            パスワードリセットの手順をメールで送信します。
        </p>
        <form action="password_reset.php" method="post">
            <label for="email">メールアドレス：</label>
            <input type="email" id="email" name="email" required>
            <input type="submit" value="送信">
        </form>
        <!-- 戻るボタン -->
            <a class="Button" href="page0.php">ログイン画面に戻る</a>
    </div>

    
</body>
</html>
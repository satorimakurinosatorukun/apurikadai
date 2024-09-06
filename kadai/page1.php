<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="gamen1.css">
    <title>おみくじ</title>
    <style>
        h1{
            text-align: center;
        }
        .center{
            text-align: center;
        }
        #startbutton{
            display:block;
            margin: auto;
            /*width:1men;
            height:10en;
            */
        }
    </style>
    <style> button {  /*width:10em;*/ height:10em;
        background-color: #eee; }
    </style>
    <style>
        .right {
            float: right; /* 画像を右に寄せる */
            margin: 0 0 10px 10px; /* 画像の周囲に余白を付ける（任意の設定） */
        }
    </style>
</head>
<body>
    
<h1>あなたの運勢おみくじタッチで占いましょう！！ </h1>
<div id="startbutton">
    <a class="Button3" href="page4.php"> ス タ ー ト </a>
</div>
<div id="modoru">
    <a class="Button4" href="page0.php"> ログイン画面に戻る </a>
</div>
    
    <img id="om" src="omikuziirasuto1.jpeg" alt="おみくじの画像" class="right" width="150">
    <img id="om2"src="omikuzirasuto2.jpeg" width="230">
</body>
</html>
<?php
// おみくじの結果の配列
$omikuji_results = [
    "大吉です、明るい未来が待っています。",
    "中吉です、悪くないプラス５点",
    "小吉です、少しいつもと違うことが起こるでしょう",
    "吉です、運を上げるためにいいことをしましょう。",
    "凶です、足元と背中に注意！！",
    "大凶です、周りの人に気を付けましょう！"
];

// ランダムにおみくじの結果を選ぶ
$random_index = array_rand($omikuji_results);
$omikuji_result = $omikuji_results[$random_index];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>おみくじ</title>
</head>
<body>
    <h1>　　　今日の運勢は...</h1>
    <p><?php echo $omikuji_result; ?>です！</p>
</body>
</html>
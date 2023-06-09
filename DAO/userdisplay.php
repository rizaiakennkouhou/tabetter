<?php

//画像を表示テスト（使わない関数）

//データベースに接続
$pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
'webuser', 'abccsd2');

$sql = 'SELECT * FROM user WHERE user_id = avocado1';
$sql ->execute();
// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(1, $_GET['id'], PDO::PARAM_STR);
// $stmt->execute();
$image = $sql->fetch();

header('Content-type: ' . $image['image_type']);
echo $image['profile_image'];
exit();

?>
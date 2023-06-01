<?php

//画像を表示テスト（使わない関数）

//データベースに接続
$pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
'webuser', 'abccsd2');

$sql = 'SELECT * FROM post_images WHERE post_id = :image_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':image_id', (int)$_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$image = $stmt->fetch();

header('Content-type: ' . $image['image_type']);
foreach($image as $row){
echo $image['post_image'];
}
exit();

?>
<?php

$dsn  = 'mysql:dbname=tabetterdb;host=localhost;charset=utf8';
$user = 'webuser';
$pw   = 'abccsd2';
$driver_options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
];

//データベースに接続
$pdo = new PDO(
    $dsn,
    $user,
    $pw,
    $driver_options
);

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



//$sql = 'SELECT * FROM `post_images` WHERE post_id = 2';
//$stmt = $pdo->query($sql);

// 今回はgif画像なので、image/gifになります
//echo '<img src="data:image/png;base64,' . base64_encode($stmt->fetchAll()[0]['post_image']) . '>';

?>
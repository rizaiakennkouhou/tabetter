
<?php

//保存テスト（使わない関数）

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

    $name = $_FILES['image']['name'];
    $type = $_FILES['image']['type'];
    $content = file_get_contents($_FILES['image']['tmp_name']);
    $size = $_FILES['image']['size'];

    $sql = 'INSERT INTO post_images(post_id, image_name, image_type, post_image, image_size)
                VALUES (?, ?, ?, ?, ?)';
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(1, 2, PDO::PARAM_INT);
                $stmt->bindValue(2, $name, PDO::PARAM_STR);
                $stmt->bindValue(3, $type, PDO::PARAM_STR);
                $stmt->bindValue(4, $content, PDO::PARAM_STR);
                $stmt->bindValue(5, $size, PDO::PARAM_INT);
                $stmt->execute();

/*
$sql = '
    INSERT INTO
        `post_images` (post_id, post_image)
    VALUES
        (:post_id, :post_image)
';
*/

// 画像データ
//$img_data = file_get_contents($_FILES['image']['tmp_name']);

// DBに保存
/*$stmt = $pdo->prepare($sql);
$stmt->bindValue(':post_id', 2);
$stmt->bindValue(':post_image', $img_data);
$stmt->execute();


?>
*/
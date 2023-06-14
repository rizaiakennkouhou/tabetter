<?php

require_once '../DAO/userdb.php';
$userdao = new DAO_userdb();




//データベースに接続
$pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
'webuser', 'abccsd2');

$sql = "SELECT * FROM user_image WHERE user_id = ? ";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(1, $_POST['user_id'], PDO::PARAM_STR);
$stmt->execute();
$image = $stmt->fetch(PDO::FETCH_ASSOC);

$img = base64_encode($image['user_image']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="../css/Oyamadaprofile.css">
</head>
<body>

<img src="../svg/tpyosaka.svg" alt="編集ボタン" onclick="openModal()">

<div id="modal" class="modal">
    <div id="overlay" class="modal-content">
    <div id="content" class="content">
    <form method="POST" action="../DAO/comment.php" enctype="multipart/form-data">
    <h2>キャンセル</h2>
    <div class="icon-image">
            <img src="data:<?php echo $image['image_type'] ?>;base64,<?php echo $img; ?>">
    </div>
    <p>コメント先:</p>
        <p>ユーザー名:</p>
        <input type="text" name="user_name" id="edit-username" value="<?= $userdao->getUserName($_POST['user_id'])?>">
        <p>自己紹介文:</p>
        <input type="text" name="bio" id="edit-bio" value="<?= $userdao->getUserBio($_POST['user_id'])?>">
        <input type="hidden" name="id" value="<?= $_POST['user_id']?>">
        <button onclick="saveChanges()" type="submit">保存</button>
    </form>
    <button onclick="closeModal()">キャンセル</button>
    </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<script src="../js/MaedaTest.js"></script>
<script src="../js/Oyamadaprofile.js"></script>
</body>
</html>
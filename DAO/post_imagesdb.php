<?php
        //post画像を保存する

        //データベースに接続
        $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                        'webuser', 'abccsd2');

        $MAXS = count($_FILES["image"]["tmp_name"] ?? []);
if(isset($_POST['detail']) && $_POST['detail'] !== ''){
    if($MAXS <= 4){
$sql = 'INSERT INTO post(post_detail, post_date, user_id, store, menu, price, address)
                    VALUES (?, CURRENT_TIMESTAMP, ?, ?, ?, ?, ?)';
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(1, $_POST['detail'], PDO::PARAM_STR);
                    $stmt->bindValue(2, $_POST['userid'], PDO::PARAM_STR);
                    $stmt->bindValue(3, $_POST['store'], PDO::PARAM_STR);
                    $stmt->bindValue(4, $_POST['menu'], PDO::PARAM_STR);
                    $stmt->bindValue(5, $_POST['price'], PDO::PARAM_STR);
                    $stmt->bindValue(6, $_POST['address'], PDO::PARAM_STR);
                    $stmt->execute();

    if ($_FILES['image']['error'][0] === UPLOAD_ERR_OK){
            $sql = $pdo->prepare("SELECT MAX(post_id) AS max_postid FROM post");
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            $maxpostid = $result['max_postid'];
            //$id = intval($_POST['id']);  //$idをstring型からint型に変換

            for($i=0; $i < $MAXS; $i++){

            $name = $_FILES['image']['name'][$i];
            $type = $_FILES['image']['type'][$i];
            $content = file_get_contents($_FILES['image']['tmp_name'][$i]);
            $size = $_FILES['image']['size'][$i];

            $sql = 'INSERT INTO post_images(post_id, image_name, image_type, post_image, image_size)
                    VALUES (?, ?, ?, ?, ?)';
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(1, $maxpostid, PDO::PARAM_INT);
                    $stmt->bindValue(2, $name, PDO::PARAM_STR);
                    $stmt->bindValue(3, $type, PDO::PARAM_STR);
                    $stmt->bindValue(4, $content, PDO::PARAM_STR);
                    $stmt->bindValue(5, $size, PDO::PARAM_INT);
                    $stmt->execute();
            }
    }

    header('Location: https://localhost/tabetter/html/timeLine.php');
}else{
    header('Location: https://localhost/tabetter/html/postImageCheck.php');
}
}else{
    header('Location: https://localhost/tabetter/html/postCheck.php');
}

        
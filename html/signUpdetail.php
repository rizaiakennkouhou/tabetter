<?php 
//新規登録処理
$pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
'webuser', 'abccsd2');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// レコードの数をチェックしてメッセージを表示

$sql3 = "SELECT * FROM user WHERE mail = ? OR user_id = ?";
$ps2 = $pdo->prepare($sql3);
$ps2 -> bindValue(1,$_POST['mail'],PDO::PARAM_STR);
$ps2 -> bindValue(2,$_POST['userId'],PDO::PARAM_STR);
$ps2->execute();
$row = $ps2->fetch(PDO::FETCH_ASSOC);
//データベース内のメールアドレスと重複していない場合、登録する。
if (!isset($row['mail']) && !isset($row['user_id'])) {
        if(strlen($_POST['userId']) == 8){

$sql = "INSERT INTO user(user_id,user_name,mail,password)
        VALUES(?,?,?,?)";
$ps = $pdo->prepare($sql);
$ps -> bindValue(1,$_POST['userId'],PDO::PARAM_STR);
$ps -> bindValue(2,$_POST['userName'],PDO::PARAM_STR);
$ps -> bindValue(3,$_POST['mail'],PDO::PARAM_STR);
$ps -> bindValue(4,password_hash($_POST['pass'],PASSWORD_DEFAULT),PDO::PARAM_STR);

//SQLの実行
$ps->execute();

$name = $_FILES['image']['name'];
$type = $_FILES['image']['type'];
$content = file_get_contents($_FILES['image']['tmp_name']);
$size = $_FILES['image']['size'];

$sql2 = "INSERT INTO user_image(image_name, image_type, user_image, image_size, user_id)
        VALUES(?,?,?,?,?)";
        $stmt = $pdo->prepare($sql2);
        $stmt->bindValue(1, $name, PDO::PARAM_STR);
        $stmt->bindValue(2, $type, PDO::PARAM_STR);
        $stmt->bindValue(3, $content, PDO::PARAM_STR);
        $stmt->bindValue(4, $size, PDO::PARAM_INT);
        $stmt->bindValue(5, $_POST['userId'], PDO::PARAM_STR);
        $stmt->execute();


header('Location: http://localhost/tabetter/html/login.php');
}else{
header('Location: http://localhost/tabetter/html/signUpIdMsg.php');
}
}else{
header('Location: http://localhost/tabetter/html/signUpMsg.php');
}



?>
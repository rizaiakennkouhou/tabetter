<?php 
//新規登録処理
$pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
'webuser', 'abccsd2');
$sql = "INSERT INTO user(user_id,user_name,mall,password)
        VALUES(?,?,?,?)";
$ps = $pdo->prepare($sql);
$ps -> bindValue(1,$_POST['userid'],PDO::PARAM_STR);
$ps -> bindValue(2,$_POST['username'],PDO::PARAM_STR);
$ps -> bindValue(3,$_POST['mall'],PDO::PARAM_STR);
$ps -> bindValue(4,password_hash($_POST['password'],PASSWORD_DEFAULT),PDO::PARAM_STR);



?>
<?php

//データベースに接続
$pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                'webuser', 'abccsd2');


$id = intval($_POST['id']);  //$idをstring型からint型に変換
$sql = "INSERT INTO likes(post_id,user_id)
        VALUES(?,?)";
$ps = $pdo->prepare($sql);
$ps -> bindValue(1$id,PDO::PARAM_INT);
$ps -> bindValue(2,$_POST['userId'],PDO::PARAM_STR);
//SQLの実行
$ps->execute();

?>

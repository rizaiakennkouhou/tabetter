<?php

        //データベースに接続
        $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                        'webuser', 'abccsd2');
if(isset($_POST['detail']) && $_POST['detail'] !== '' && isset($_POST['title']) && $_POST['title'] !== ''){
$sql = 'INSERT INTO forum(forum_detail, title, forum_date, user_id)
                    VALUES (?, ?, CURRENT_TIMESTAMP, ?)';
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(1, $_POST['detail'], PDO::PARAM_STR);
                    $stmt->bindValue(2, $_POST['title'], PDO::PARAM_STR);
                    $stmt->bindValue(3, $_POST['userid'], PDO::PARAM_STR);
                    $stmt->execute();
    header('Location: http://localhost/tabetter/html/forum.php');
}else{
    header('Location: http://localhost/tabetter/html/forumCheck.php');
}

        
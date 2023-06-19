<?php
$pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                        'webuser', 'abccsd2');


    $id = intval($_GET['postid']);  //$idをstring型からint型に変換

    $sql = "DELETE FROM post_comment WHERE post_id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();

    $sql2 = "DELETE FROM likes WHERE post_id = ?";
            $stmt2 = $pdo->prepare($sql);
            $stmt2->bindValue(1, $id, PDO::PARAM_INT);
            $stmt2->execute();

    $sql3 = "DELETE FROM post WHERE post_id = ?";
            $stmt3 = $pdo->prepare($sql);
            $stmt3->bindValue(1, $id, PDO::PARAM_INT);
            $stmt3->execute();
            
            header('Location: https://localhost/tabetter/html/userTime.php');
?>
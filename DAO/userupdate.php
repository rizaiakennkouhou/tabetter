<?php
            //userprofile画像を保存する

            //データベースに接続
            $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                            'webuser', 'abccsd2');

            $name=$_POST['user_name'];

            if(strlen($name)< 1 || strlen($name)> 30){
                header('Location: https://localhost/tabetter/html/profileCheck.php');
            }else{
                $sql = 'UPDATE user
                    SET user_name = ?,bio = ?
                    WHERE user_id = ?';
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(1, $_POST['user_name'], PDO::PARAM_STR);
                    $stmt->bindValue(2, $_POST['bio'], PDO::PARAM_STR);
                    $stmt->bindValue(3, $_POST['id'], PDO::PARAM_STR);
                    $stmt->execute();
            
                    header('Location: https://localhost/tabetter/html/myProfile.php');
            } 
// ?>
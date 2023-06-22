<?php
            //userprofile画像を保存する

            //データベースに接続
            $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                            'webuser', 'abccsd2');

            $content = file_get_contents($_FILES['image']['tmp_name']);
            
            $sql = 'UPDATE user
                    SET profile_image = ?
                    WHERE user_id = ?';
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(1, $content, PDO::PARAM_STR);
                    $stmt->bindValue(2, $_POST['id'], PDO::PARAM_STR);
                    $stmt->execute();

                    header('Location: https://localhost/tabetter/html/myProfile.php');
?>
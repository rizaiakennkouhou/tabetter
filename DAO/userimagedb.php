<?php
            //userprofile画像を保存する

            //データベースに接続
            $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                            'webuser', 'abccsd2');

            $id = intval($_POST['id']);  //$idをstring型からint型に変換     
            $content = file_get_contents($_FILES['image']['tmp_name']);
            
            $sql = 'UPDATE user
                    SET profile_image = ?,
                    WHERE user_id = ?';
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(1, $content, PDO::PARAM_STR);
                    $stmt->bindValue(2, $id, PDO::PARAM_INT);
                    $stmt->execute();

                    header('Location: https://localhost/tabetter/html/M.test.php');
?>
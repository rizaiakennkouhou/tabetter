<?php
            //userprofile画像を保存する

            //データベースに接続
            $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                            'webuser', 'abccsd2');
            $name = $_FILES['image']['name'];
            $type = $_FILES['image']['type'];
            $content = file_get_contents($_FILES['image']['tmp_name']);
            $size = $_FILES['image']['size'];
            
            $sql = 'UPDATE user_image
                    SET image_name = ?, image_type = ?, user_image = ?, image_size = ?
                    WHERE user_id = ?';
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(1, $name, PDO::PARAM_STR);
                    $stmt->bindValue(2, $type, PDO::PARAM_STR);
                    $stmt->bindValue(3, $content, PDO::PARAM_STR);
                    $stmt->bindValue(4, $size, PDO::PARAM_INT);
                    $stmt->bindValue(5, $_POST['id'], PDO::PARAM_STR);
                    $stmt->execute();

                    header('Location: https://localhost/tabetter/html/Oyamadaprofile.php');
?>
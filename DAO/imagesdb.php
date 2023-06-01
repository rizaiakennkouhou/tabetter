<?php
            //post画像を保存する

            //データベースに接続
            $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                            'webuser', 'abccsd2');

            
            $id = intval($_POST['id']);  //$idをstring型からint型に変換
            $name = $_FILES['image']['name'];
            $type = $_FILES['image']['type'];
            $content = file_get_contents($_FILES['image']['tmp_name']);
            $size = $_FILES['image']['size'];

            $sql = 'INSERT INTO post_images(post_id, image_name, image_type, post_image, image_size)
                    VALUES (?, ?, ?, ?, ?)';
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(1, $id, PDO::PARAM_INT);
                    $stmt->bindValue(2, $name, PDO::PARAM_STR);
                    $stmt->bindValue(3, $type, PDO::PARAM_STR);
                    $stmt->bindValue(4, $content, PDO::PARAM_STR);
                    $stmt->bindValue(5, $size, PDO::PARAM_INT);
                    $stmt->execute();

                    header('Location: https://localhost/tabetter/html/M.test.php');

        
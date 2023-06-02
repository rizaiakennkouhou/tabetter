<?php
session_start();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>セッションテスト</title>
</head>
<body>
    <?php
   echo $_SESSION['user_id'];
    ?>
</body>
</html>
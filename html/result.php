
<img src="../DAO/userdisplay.php?id=1" width="100">

<img src="../DAO/display.php?id=1" width="100">



<?php 
    //データベースに接続
    $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
    'webuser', 'abccsd2');

    $sql = "SELECT * FROM user_image WHERE user_id = ? ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, "avocado1", PDO::PARAM_STR);
    $stmt->execute();
    $image = $stmt->fetch(PDO::FETCH_ASSOC);

    $img = base64_encode($image['user_image']);

    /*$dbname='db_dino';
    $dsn = 'mysql:dbname='.$dbname.';host=localhost:3308;charset=utf8mb4';
    $user = 'root';
    $password = 'root123';
    $dbh = new PDO($dsn, $user, $password);

    $sql_select = "SELECT ext,img FROM tbl_dinoimg WHERE id = ?";
    $result1=$dbh->prepare($sql_select);
    //パラメータをセット
    $id=1;
    $result1->bindparam(1,$id,PDO::PARAM_INT);
    $result1->execute();
    $row = $result1 -> fetch(PDO::FETCH_ASSOC);
    //取得した画像バイナリデータをbase64で変換。
    $img = base64_encode($row['img']);
    */
 ?>
    <!-- エンコードした情報をimgタグに表示 -->
    <img src="data:<?php echo $image['image_type'] ?>;base64,<?php echo $img; ?>"><br>
    <img src="data:<?php echo $row['ext'] ?>;base64,<?php echo $img; ?>"><br>
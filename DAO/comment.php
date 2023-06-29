<?php
$pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
'webuser', 'abccsd2');



if(isset($_POST['comment_detail']) && $_POST['comment_detail'] !== ''){


// 投稿に対してのコメントができる機能

// $sql = "INSERT INTO post_comment(comment_detail,comment_date, user_id, post_id)
// VALUES(?,CURRENT_TIMESTAMP,?,1)";
// $ps = $pdo->prepare($sql);
// $ps -> bindValue(1,$_POST['comment_detail'],PDO::PARAM_STR);
// $ps -> bindValue(2,$_POST['user_id'],PDO::PARAM_STR);
// $ps->execute();
$sql = "INSERT INTO post_comment(comment_detail,comment_date, user_id, post_id,reply_id)
VALUES(?,CURRENT_TIMESTAMP,?,?,?)";
$ps = $pdo->prepare($sql);
$ps -> bindValue(1,$_POST['comment_detail'],PDO::PARAM_STR);
$ps -> bindValue(2,$_POST['user_id'],PDO::PARAM_STR);
$ps -> bindValue(3,$_POST['post_id'],PDO::PARAM_INT);
if($_POST['reply_id']=='null'){
    $ps -> bindValue(4,null,PDO::PARAM_NULL);
}else{
    $ps -> bindValue(4,$_POST['reply_id'],PDO::PARAM_INT);
}
$ps->execute();

header('Location: https://localhost/tabetter/html/T.syosai.php');
// header('Location: https://localhost/tabetter/html/T.syosai2.php');
}else{
    header('Location: https://localhost/tabetter/html/commentcheck.php');
}

?>
<?php
$pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
'webuser', 'abccsd2');



if(isset($_POST['forum_comment_detail']) && $_POST['forum_comment_detail'] !== ''){


// 投稿に対してのコメントができる機能

$sql = "INSERT INTO forum_comment(forum_comment_detail,forum_comment_date, user_id,forum_id)
VALUES(?,CURRENT_TIMESTAMP,?,1)";
$ps = $pdo->prepare($sql);
$ps -> bindValue(1,$_POST['forum_comment_detail'],PDO::PARAM_STR);
$ps -> bindValue(2,$_POST['user_id'],PDO::PARAM_STR);
$ps->execute();



header('Location: https://localhost/tabetter/html/forumDetail.php');
}else{
    header('Location: https://localhost/tabetter/html/forum_commentCheck.php');
}

?>
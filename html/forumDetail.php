<?php 
    session_start();
    require_once '../DAO/forumdb.php';
    require_once '../DAO/forumcommentdb.php';
    $forumdao = new DAO_forumdb();
    $forumCommentDao = new DAO_forumcommentdb();



    //データベースに接続
    $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
    'webuser', 'abccsd2');

    $sql = "SELECT * FROM user_image WHERE user_id = ? ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $_SESSION['user_id'], PDO::PARAM_STR);
    $stmt->execute();
    $image = $stmt->fetch(PDO::FETCH_ASSOC);

    $img = base64_encode($image['user_image']);




?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フォーラム</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    .custom-hr {
        border: 1px solid #FFAC4A; /* カラーコードを指定 */
    }
    </style>
    <link rel="stylesheet" href="../css/forum.css">
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="../css/Oyamadaprofile.css">
</head>
<body>
    <!-- ヘッダー -->
    <header class="mb-3 border-bottom" id="header">
    <div class="container-fluid">
        <div class="row row justify-content-between">

            <div class="d-flex align-items-center mb-0 text-dark text-decoration-none col-7 text-left px-0" style="height: 50px; padding-top: 55px;">
                <img src="../svg/a.svg">
            </div>

            <button class="navbar-toggler col-3 p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation" style="height: 50px; box-shadow: none;">
                <img src="../svg/b.svg">       
            </button>

        </div>
        <div class="collapse navbar-collapse" id="navbarsExample05">
            <form wtx-context="0C9FB6AB-0B58-4B25-A43A-44B7ADC851E5" class="mx-4">
              <input class="form-control text-center mb-3" type="text" placeholder="キーワードを入力" aria-label="Search" wtx-context="AA84657A-0F9B-4A04-B5FA-D24659B477FD"
              style="height: 34px;
              border: 3px solid #FFAC4A; 
              box-shadow: none;">
            </form>
        </div>
    </div>
    </header>
  
  <!-- ヘッダー↑ -->

    <div class="container-fluid">

        <div class="card mt-2">
            <div class="top_row row ms-1">
                <h5 class="title col mb-0">
                <?= $forumdao->getForumTitle($_GET['forumid']); ?>
                </h5>
            </div>
            <hr class="custom-hr">
            <div class="top_row row ms-1">
                <p class="title col mb-0" style="font-size: 16px;">
                <?= $forumdao->getForumDetail($_GET['forumid']); ?>
                </p>
            </div>
            <hr class="custom-hr">

            <div class="bottom_row row mx-1 mb-1">
                <p class="col mb-0">
                <img src="../svg/comment.svg" onclick="openModal()">
                    <!-- コメント数 -->
                    件のコメント
                </p>
                <div id="modal" class="modal">
                    <div id="overlay" class="modal-content">
                    <div id="content" class="content">
                    <form method="POST" action="../DAO/forum_commentdb.php" enctype="multipart/form-data">
                    <h2>キャンセル</h2>
                    <div class="icon-image">
                            <img src="data:<?php echo $image['image_type'] ?>;base64,<?php echo $img; ?>">
                    </div>
                    <p>コメント先:</p>
                        
                        <input type="text" name="forum_comment_detail" id="edit-username">
                        
                        <input type="hidden" name="user_id" value="<?= $_SESSION['user_id']?>">
                        <button onclick="saveChanges()" type="submit">保存</button>
                    </form>
                    <button onclick="closeModal()">キャンセル</button>
                    </div>
                    </div>
                </div>
                <p class="col mb-0 text-end">
                    <!-- 投稿時間 -->
                    <?= $forumdao->getForumDate($_GET['forumid']); ?>分前
                </p>
            </div>
        </div>

    </div>

    <div class = "top_row row ms-1">
        コメント
    </div>

    
<?php
    $commentIds = array();
    $commentIds = $forumCommentDao->getCommentIds($_GET['forumid']);
    foreach($commentIds as $commentId){
?>
    <div class="container-fluid">

        <div class="card mt-2">
            <div class="top_row row ms-1">
                <p class="title col mb-0" style="font-size: 16px;">
                <?= $forumCommentDao->getForumCommentDetail($commentId); ?>
                </p>
            </div>
            <hr class="custom-hr">

            <div class="bottom_row row mx-1 mb-1">
                <p class="col mb-0 text-end">
                    <!-- 投稿時間 -->
                    <?= $forumCommentDao->getForumCommentDate($commentId); ?>分前
                </p>
            </div>
        </div>

    </div>
    <?php
        }
        ?>

    <script src="../js/Oyamadaprofile.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
</html>
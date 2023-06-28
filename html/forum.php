<?php 
    session_start();
    require_once '../DAO/forumdb.php';
    $forumdao = new DAO_forumdb();
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フォーラム</title>
        <link rel="stylesheet" href="../css/Bar4.css?<?php echo date('YmdHis'); ?>"/>
        <!-- <link rel="stylesheet" href="../css/OyamadaBar.css"> -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/forum1.css?<?php echo date('YmdHis'); ?>"/>
        <link rel="stylesheet" href="../css/forummodal.css?<?php echo date('YmdHis'); ?>"/>
        <link rel="stylesheet" href="../css/Oyamadaprofile.css?<?php echo date('YmdHis'); ?>"/>
        <form method="GET" action="../DAO/forumDetail.php" enctype="multipart/form-data">
        <link rel="stylesheet" href="../css/scrollable2.css?<?php echo date('YmdHis'); ?>"/>
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
            <form wtx-context="0C9FB6AB-0B58-4B25-A43A-44B7ADC851E5" action="./searchresult.php" class="mx-4" id="search" method="post">
              <input class="form-control text-center mb-3" type="text" placeholder="キーワードを入力" aria-label="Search" wtx-context="AA84657A-0F9B-4A04-B5FA-D24659B477FD"
              style="height: 34px;
              border: 3px solid #FFAC4A; 
              box-shadow: none;">
               <input type="submit" style="height:50px; width:50px;" form="search">
            </form>
        </div>
    </div>
    </header>
  
  <!-- ヘッダー↑ -->

  <div class="scrollable">
  <div style="height: 800px;">
  <?php
        $forumIds = array();
        $forumIds = $forumdao->getForumIds();
        $userIds = array();
        

        foreach($forumIds as $forumId){
            ?>
    <div class="container-fluid">
    <form method="GET" action="./M.test.php" enctype="multipart/form-data">
        <input type="hidden" name="formuid" value="<?= $forumId ?>">
        <div class="card mt-2">
            <div class="top_row row ms-1">
            <a class="link-style" href="./forumDetail.php?forumid=<?= $forumId ?>">
                <h6 class="title col mb-0">
                    <?php
                $title = $forumdao->getForumTitle($forumId);
                        $maxCharacters = 25; // 表示する最大文字数
                        if (mb_strlen($title) > $maxCharacters) {
                            $title = mb_substr($title, 0, $maxCharacters) . '...';
                        }
                        echo $title;
                        ?>
                </h6>
            </a>
            </div>
            
            <div class="bottom_row row mx-1 mb-1">
                <p class="col mb-0">
                    <svg width="21" height="21" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4H21V17H9V15H19V6H5V16H3V4Z" fill="#424242"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5 17.5858V15H3V22.4142L8.41421 17H12.5V15H7.58579L5 17.5858Z" fill="#424242"/>
                    <rect x="7" y="9" width="2" height="2" fill="#424242"/>
                    <rect x="11" y="9" width="2" height="2" fill="#424242"/>
                    <rect x="15" y="9" width="2" height="2" fill="#424242"/>
                    </svg>
                    <!-- コメント数 -->
                    件のコメント
                </p>
                <p class="col mb-0 text-end">
                    <?= $forumdao->getForumDate($forumId); ?>
                </p>
            </div>
        </div>
    </form>
    </div>
      <?php } ?>

    </div>
    </div>

      <div id="modal" class="modal">
    <div id="overlay" class="modal-content">
    <div id="content" class="content">
    <div class="image_modal" id="image_modal">
    <form method="POST" action="../DAO/forumInsert.php" enctype="multipart/form-data">
        <p>タイトル</p>
        <input type="text" name="title" id="edit-username" class="textboxstyle">
        <p>投稿内容</p>
        <textarea name="detail" type="text2" id="edit-bio" class="textboxstyle"></textarea>
        <input type="hidden" name="userid" value="<?= $_SESSION['user_id']?>">
        <button onclick="saveChanges()" type="submit" class="buttonsubmit">保存</button>
    </form>
    <button onclick="closeModal()" class="cancel_button">キャンセル</button>
    </div>
    </div>
    </div>
    </div>




 <!-- navigationBar -->
 <div class="border"></div>

<div class="navigation">
    <a class="list-link" href="timeLine.php">
        <i class="icon">
            <img src="../svg/time.svg" class="image-size">
        </i>
    </a>
    <a class="list-link" href="forum.php">
        <i class="icon">
            <img src="../svg/forum2.svg" class="image-size1">
        </i>
    </a>
    <a class="list-link">
        <i class="icon">
            <img src="../svg/post.svg" class="image-size" onclick="openModal()">
        </i>
    </a>
    <a class="list-link" href="myProfile.php">
        <i class="icon">
            <img src="../svg/profile.svg" class="image-size">
        </i>
    </a>
</div>





<script>
function redirectToForumDetail(forumId) {
    window.location = "./M.test.php?formid=" + forumId;
}
</script>
    <script src="../js/Oyamadaprofile.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
</html>
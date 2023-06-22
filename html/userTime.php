<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>画面一覧</title>
    <link rel="stylesheet" type="text/css" href="../css/Bar4.css?<?php echo date('YmdHis'); ?>"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/Oyamadatime2.css?<?php echo date('YmdHis'); ?>"/>
    <link rel="stylesheet" type="text/css" href="../css/scrollable.css?<?php echo date('YmdHis'); ?>"/>
</head>
<body>
    <?php
        session_start();
        require_once '../DAO/postdb.php';
        require_once '../DAO/userdb.php';
        require_once '../DAO/userTimedb.php';
        $daoPostDb = new DAO_post();
        $daoUserDb = new DAO_userdb();
        $daoUserTimeDb = new DAO_userTimedb();
    ?>
    <div id="app">
    <!-- ヘッダー -->
   <header class="border-bottom" id="header">
    <div class="container-fluid">
        <div class="row row justify-content-between">
            <div class="d-flex align-items-center mb-0 text-dark text-decoration-none col-7 text-left px-0" style="height: 50px; padding-top: 55px;">
            <img src="../svg/a.svg">
            </div>
    
            <button class="navbar-toggler col-3 p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation" style="height: 50px; box-shadow: none;">
                <img src="../svg/b.svg" width="50" height="50" viewBox="0 0 60 60" fill="none" > 
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
  <div class="scrollable">
  <div style="height: 800px;">
    <div class="row">
        <h1 class="text-center">投稿</h1>
        <hr>
    </div>

  <div class="container-fluid">
    <div class="row">

    <?php
        $postIds = array();
        $postIds = $daoUserDb->getUserPostIds($_SESSION['user_id']);
        
        if(isset($postIds)){
        foreach($postIds as $postId){

        ?>
            <!-- 投稿のカード -->
            <div class="card">
                <div class="card-body">
                    <div class="box">
                        <p class="userName"> <?=$daoUserDb->getUserName($_SESSION['user_id']) ?></p>
                        <p class="userComment">
                        
                        <?= $daoPostDb->getPostDetail($postId) ?>
                        
                        </p>
                    </div>
                    <div class="row row-eq-height">
                        <div class="col-6">
                            <div class="d-flex justify-content-end">
                            </div>
                        </div>
                        <div class="offset-3 col-3">
                            <button class="d-flex justify-content-center" id="buttonStyle">
                                <a href="../DAO/deletePost.php?postid=<?= $postId ?>"><img src="../svg/dust.svg" id="commentButton"></a>
                            </button>
                        </div>                                                    
                    </div>
                </div>
            </div>
        <?php
        }
    }else{
        echo '投稿がありません' . '<hr>';
    }
    ?>
    </div>
</div>


    <div class="row">
        <hr>
        <h1 class="text-center">投稿コメント</h1>
        <hr>
    </div>

    <?php
        $commentIds = array();
        $commentIds = $daoUserDb->getUserCommentIds($_SESSION['user_id']);
        
        if(isset($commentIds)){
        foreach($commentIds as $commentId){

        ?>
            <!-- 投稿のカード -->
            <div class="card">
                <div class="card-body">
                    <div class="box">
                        <p class="userName"> <?=$daoUserDb->getUserName($_SESSION['user_id']) ?></p>
                        <p class="userComment">
                        
                        <?= $daoUserTimeDb->getCommentDetail($commentId) ?>
                        
                        </p>
                    </div>
                    <div class="row row-eq-height">
                        <div class="col-6">
                            <div class="d-flex justify-content-end">
                            </div>
                        </div>
                        <div class="offset-3 col-3">
                            <button class="d-flex justify-content-center" id="buttonStyle">
                                <a href="../DAO/deleteComment.php?commentid=<?= $commentId ?>"><img src="../svg/dust.svg"></a>
                            </button>
                        </div>                                                    
                    </div>
                </div>
            </div>
        <?php
        }
    }else{
        echo '投稿がありません' . '<hr>';
    }
    ?>

    <h1> </h1>

    <div class="row">
        <hr>
        <h1 class="text-center">フォーラム</h1>
        <hr>
    </div>

    <?php
        $forumIds = array();
        $forumIds = $daoUserDb->getUserForumIds($_SESSION['user_id']);
        
        if(isset($forumIds)){
        foreach($forumIds as $forumId){

        ?>
            <!-- 投稿のカード -->
            <div class="card">
                <div class="card-body">
                    <div class="box">
                        <p class="userName"> <?=$daoUserDb->getUserName($_SESSION['user_id']) ?></p>
                        <p class="userComment">
                        
                        <?= $daoUserTimeDb->getForumDetail($forumId) ?>
                        
                        </p>
                    </div>
                    <div class="row row-eq-height">
                        <div class="col-6">
                            <div class="d-flex justify-content-end">
                            </div>
                        </div>
                        <div class="offset-3 col-3">
                            <button class="d-flex justify-content-center" id="buttonStyle">
                                <a href="../DAO/deleteForum.php?forumid=<?= $forumId ?>"><img src="../svg/dust.svg"></a>
                            </button>
                        </div>                                                    
                    </div>
                </div>
            </div>
        <?php
        }
    }else{
        echo '投稿がありません' . '<hr>';
    }
    ?>

    <div class="row">
        <hr>
        <h1 class="text-center">フォーラムコメント</h1>
        <hr>
    </div>

    <?php
        $forumcommentIds = array();
        $forumcommentIds = $daoUserDb->getUserForumCommentIds($_SESSION['user_id']);
        
        if(isset($forumcommentIds)){
        foreach($forumcommentIds as $forumcommentId){

        ?>
            <!-- 投稿のカード -->
            <div class="card">
                <div class="card-body">
                    <div class="box">
                        <p class="userName"> <?=$daoUserDb->getUserName($_SESSION['user_id']) ?></p>
                        <p class="userComment">
                        
                        <?= $daoUserTimeDb->getForumCommentDetail($forumcommentId) ?>
                        
                        </p>
                    </div>
                    <div class="row row-eq-height">
                        <div class="col-6">
                            <div class="d-flex justify-content-end">
                            </div>
                        </div>
                        <div class="offset-3 col-3">
                            <button class="d-flex justify-content-center" id="buttonStyle">
                                <a href="../DAO/deleteForumComment.php?forumcommentid=<?= $forumcommentId ?>"><img src="../svg/dust.svg"></a>
                            </button>
                        </div>                                                    
                    </div>
                </div>
            </div>
        <?php
        }
    }else{
        echo '投稿がありません' . '<hr>';
    }
    ?>
    </div>
</div>


    <!-- navigationBar -->
    <div class="border"></div>
 
    <div class="navigation">
     <a class="list-link" href="#" onclick="changeImage(this, 'timeLine.php')">
     <i class="icon">
     <img src="../svg/time2.svg" class="image-size">
     </i>
     </a>
     <a class="list-link" href="#" onclick="changeImage2(this, 'forum.php')">
     <i class="icon">
     <img src="../svg/forum.svg" class="image-size1">
     </i>
     </a>
     <a class="list-link" href="#" onclick="changeImage3(this, 'Oyamadatokou.html')">
     <i class="icon">
     <img src="../svg/post.svg" class="image-size">
     </i>
     </a>
     <a class="list-link" href="#" onclick="changeImage4(this, 'myProfile.php')">
     <i class="icon">
     <img src="../svg/profile.svg" class="image-size">
     </i>
     </a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/OyamadaBar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="../js/time.js"></script>
</body>
</html>
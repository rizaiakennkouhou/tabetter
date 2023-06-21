<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/Bar4.css">
    <!-- <link rel="stylesheet" href="../css/OyamadaBar.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Oyamadatime2.css">
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="../css/Oyamadaprofile.css">
    <link rel="stylesheet" href="../css/scrollable2.css">
</head>
<body>
    <?php
        require_once '../DAO/postdb.php';
        require_once '../DAO/userdb.php';
        $daoPostDb = new DAO_post();
        $daoUserDb = new DAO_userdb();
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
  <div class="container-fluid">
    <div class="row">

    <?php
        $postIds = array();
        $postIds = $daoPostDb->getPostIds();
        $userIds = array();
        $imageIds = array();

        foreach($postIds as $postId){
            $userIds = $daoPostDb->getUserIdsByPostId($postId);
            $imageIds = $daoPostDb->getPostImageByPostId($postId);

            // ユーザーアイコンのSQL
            $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
            'webuser', 'abccsd2');

            $sql = "SELECT * FROM user_image WHERE user_id = ? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $userIds, PDO::PARAM_STR);
            $stmt->execute();
            $image = $stmt->fetch(PDO::FETCH_ASSOC);

            $img = base64_encode($image['user_image']);
    ?>
            <!-- 投稿のカード -->
            <form action="T.syosai.php" method="get">
            <input type="hidden" name="id" value="<?=($postIds)?>">
            <div class="card">
                <div class="card-body">
                    <div class="box">
                        <form action="userProfile.php" method="get">
                            <input type="image" src="data:<?=$image['image_type']?>;base64,<?=$img?>" class="profielIcon" />
                            <input type="hidden" name="id" value="<?=($userIds)?>">
                        </form>
                        <p class="userName"><?= $daoUserDb->getUserName($userIds)?></p>
                        <p class="userComment">
                        <?= $daoPostDb->getPostDetail($postId)?>
                        </p>
                        <?php
                        if(isset($postId)){
                        ?>
                            <img src="../DAO/display.php?id=<?=($postId)?>" width="100" class="postImage">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="row row-eq-height">
                        <div class="col-6">
                            <div class="d-flex justify-content-end">
                                <div class="likeButton">
                                <input type="checkbox" checked id="<?= ($postId)?>" name="likeButton"><label for="<?= ($postId)?>"><img src="../svg/Like-black.png" class="likeButtonImg"/></label>
                                </div>
                                <div class="like" id="likeCnt">
                                    <?= $daoPostDb->getPostCount($postId)?>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex justify-content-center">
                                <a href="Oyamadatokou.html"><img src="../svg/comment.svg" id="commentButton"></a>
                                <div class="comment">
                                    <?= $daoPostDb->getPostCommentCount($postId)?>
                                </div>
                            </div>
                        </div>                                                    
                    </div>
                </div>
            </div>
            </form>
        <?php
        }
        ?>
    </div>
</div>
</div>





 <!-- navigationBar -->
 <div class="navigation">
<div class="border"></div>
    <a class="list-link" href="timeLine.php">
        <i class="icon">
            <img src="../svg/time2.svg" class="image-size">
        </i>
    </a>
    <a class="list-link" href="forum.php">
        <i class="icon">
            <img src="../svg/forum.svg" class="image-size1">
        </i>
    </a>
    <a class="list-link" onclick="openModal()">
        <i class="icon">
            <img src="../svg/post.svg" class="image-size">
        </i>
    </a>
    <a class="list-link" href="myProfile.php">
        <i class="icon">
            <img src="../svg/profile.svg" class="image-size">
        </i>
    </a>
</div>
    <script src="../js/Oyamadaprofile.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- <script src="../js/OyamadaBar.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="../js/time.js"></script>
</body>
</html>
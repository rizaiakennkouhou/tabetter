<?php 
    session_start();
    require_once '../DAO/postdb.php';
    require_once '../DAO/userdb.php';
    require_once '../DAO/rank.php';
    $daoPostDb = new DAO_post();
    $daoUserDb = new DAO_userdb();
    $rank = new DAO_rank();
    //$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';


     //データベースに接続
     $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
     'webuser', 'abccsd2');
 
     $sql = "SELECT * FROM user_image WHERE user_id = ? ";
     $stmt = $pdo->prepare($sql);
     $stmt->bindValue(1, $_GET['id'], PDO::PARAM_STR);
     $stmt->execute();
     $image = $stmt->fetch(PDO::FETCH_ASSOC);
 
     $img = base64_encode($image['user_image']);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Bar4.css?<?php echo date('YmdHis'); ?>">
    <link rel="stylesheet" href="../css/profile2.css?<?php echo date('YmdHis'); ?>">
    <link rel="stylesheet" href="../css/modal.css?<?php echo date('YmdHis'); ?>">
    <link rel="stylesheet" href="../css/scrollable2.css?<?php echo date('YmdHis'); ?>">
    <link rel="stylesheet" href="../css/Oyamadatime2.css?<?php echo date('YmdHis'); ?>">
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
                <!-- <svg width="50" height="50" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect width="60" height="60" fill="url(#pattern1)"/> -->
                    <!-- <defs>
                    <pattern id="pattern1" patternContentUnits="objectBoundingBox" width="1" height="1">
                    <use xlink:href="#image0_173_3205" transform="scale(0.00333333)"/>
                    </pattern>
                    </defs> -->
                    <img src="../svg/b.svg">
                </svg>          
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
  <!--画像 -->
  <div class="profile_icon">
  <div class="icon-image">
            <img src="data:<?php echo $image['image_type'] ?>;base64,<?php echo $img; ?>">
  </div>
  </div>
    <div class="account">
    <h1 class="name" id="username"><?php echo isset($_GET['id']) ? $daoUserDb->getUserName($_GET['id']) : ''; ?></h1>
    </div>
    <div>
    <p class="name_id"><?= isset($_GET['id']) ? $daoUserDb->getUserid($_GET['id']) : ''; ?></p>
    </div>
    <div class="rank">
        <img src="../svg/trophy.svg" alt="トロフィー" class="trophy">
        <p id="r_name"><?= $rank->userRank($_GET['id']); ?></p>
  </div>
    <div class="waku">
    <div class="frame">
    <p id="bio"><?= isset($_GET['id']) ? $daoUserDb->getUserBio($_GET['id']) : ''; ?></p>
    </div>
    </div>

    <div class="text-center mt-4 mb-4">
        <h6><?= $daoUserDb->getUserName($_GET['id']); ?>の投稿一覧</h6>
    </div>


    <div class="container-fluid">
    <div class="row">

    <?php
        $postIds = array();
        $postIds = $daoUserDb->getUserPostIds($_GET['id']);

        foreach($postIds as $postId){
    ?>
            <!-- 投稿のカード -->
            <form action="T.syosai.php" method="get">
            <input type="hidden" name="id" value="<?=($postId)?>">
            <div class="card">
                <div class="card-body">
                    <div class="box">
                        <!-- <form action="userProfile.php" method="get"> -->
                            <input type="image" src="data:<?=$image['image_type']?>;base64,<?=$img?>" class="profielIcon" />
                            <!-- <input type="hidden" name="id" value="<?=($userId)?>">
                        </form> -->
                        <p class="userName"><?= $daoUserDb->getUserName($_GET['id'])?></p>
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
</div>



<!-- <script>
    function openModal() {
        var modal = document.getElementById("modal");
        modal.style.display = "block";
    }

    function closeModal() {
        var modal = document.getElementById("modal");
        modal.style.display = "none";
    }

    function saveChanges() {
        var usernameInput = document.getElementById("edit-username");
        var bioInput = document.getElementById("edit-bio");
        var username = usernameInput.value;
        var bio = bioInput.value;

        // ここでユーザー名と自己紹介文を保存する処理を追加する

        var usernameDisplay = document.getElementById("username");
        var bioDisplay = document.getElementById("bio");

        usernameDisplay.innerText = username;
        bioDisplay.innerText = bio;

        closeModal();
    }
</script> -->

    
<!-- 
    <div class="toukou">
        <button class="button">投稿一覧</button>
    </div> -->
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
            <img src="../svg/forum.svg" class="image-size1">
        </i>
    </a>
    <a class="list-link">
        <i class="icon">
            <img src="../svg/post.svg" class="image-size">
        </i>
    </a>
    <a class="list-link" href="myProfile.php">
        <i class="icon">
            <img src="../svg/profile2.svg" class="image-size">
        </i>
    </a>
</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/OyamadaBar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="../js/MaedaTest.js"></script>
    <script src="../js/Maeda2.js"></script>

</body>
</html>
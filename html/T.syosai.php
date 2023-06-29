<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿詳細</title>
    <!-- splide -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" integrity="sha256-5uKiXEwbaQh9cgd2/5Vp6WmMnsUr3VZZw0a8rKnOKNU=" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Bar4.css?<?php echo date('YmdHis'); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Oyamadatime2.css?<?php echo date('YmdHis'); ?>"/>
    <link rel="stylesheet" href="../css/modal.css?<?php echo date('YmdHis'); ?>"/>
    <link rel="stylesheet" href="../css/Oyamadaprofile.css?<?php echo date('YmdHis'); ?>"/>
    <link rel="stylesheet" href="../css/T.syosai.css?<?php echo date('YmdHis'); ?>"/>
</head>
<body>
    <?php
        require_once '../DAO/postdb.php';
        require_once '../DAO/userdb.php';
        require_once '../DAO/T.shosaidb.php';
        $daoPostDb = new DAO_post();
        $daoUserDb = new DAO_userdb();
        $daoTshosaiDb = new DAO_Tshosaidb();
    ?>
    <div id="app">
    <!-- ヘッダー -->
   <header class="" id="header">
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
        //post_id GETで受け取りたい
        $postId = 5;
        // $userIds = array();
        $userIds = $daoPostDb->getUserIdsByPostId($postId);
        //投稿詳細情報（店名など）取得
        $postInfo = $daoTshosaiDb -> getPostInfoByPostId($postId);
        //投稿画像取得
        $postImgs = $daoTshosaiDb -> getPostImgByPostId($postId);
        $postImgLiTag ="";
        $postImgCarousel ="";
        if(count($postImgs)>=1){
            //画像の数だけLiタグ作成
            foreach($postImgs as $row){
                $img = base64_encode($row['post_image']);
                $postImgLiTag = $postImgLiTag.
                '<li class="splide__slide">
                <img src="data:' .$row['image_type'] .';base64,'.$img.'" alt="画像">
                </li>';
            }
            //sectionタグなどとLiタグを合体
            $postImgCarousel='<section id="image-carousel" class="splide" aria-label="投稿画像">
                <div class="splide__track">
                <ul class="splide__list">'.
                $postImgLiTag.
                '</ul>
                </div>
                </section>';    
        }
        //投稿ユーザー画像取得
        $userImg = $daoTshosaiDb -> getUserImgByUserId($userIds);
        $userImgBace = base64_encode($userImg['user_image']);
        //投稿日付
        $postDate = array();
        $postDate = $daoPostDb->getPostDateByPostId($postId);
        echo '
        <!-- 投稿のカード -->
        <div class="card">
        <!-- 戻るボタン -->
        <button class="backBtn text-start" onclick="', "location.href='timeLine.php'" ,'">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2931 5.29297L15.7073 6.70718L10.4144 12.0001L15.7073 17.293L14.2931 18.7072L7.58596 12.0001L14.2931 5.29297Z" fill="#424242"/>
        </svg>                    
        </button>
            <div class="card-body">
                <div class="box">
                <!-- user画像 -->
                    <form action="userProfile.php" method="get">
                    <input type="image" src="data:',$userImg['image_type'],';base64,',$userImgBace,'" class="profielIcon" />
                    <input type="hidden" name="id" value="',($userIds),'">
                    </form>
                    <p class="userName">',$daoUserDb->getUserName($userIds),'</p>
                    <p class="userComment">
                    '
                    ,$daoPostDb->getPostDetail($postId),
                    '
                    </p>

                <!-- 写真カルーセル -->
                    ',
                    //写真カルーセル 
                    $postImgCarousel,
                    '
                </div>
                
                
            </div>
        </div>
        <div class="row row-eq-height mt-1">
            <div class="col-6">
                <div class="d-flex justify-content-end">
                    <div class="likeButton">
                    <input type="checkbox" checked id="',($postId),'" name="likeButton"><label for="',($postId),'"><img src="../svg/Like-black.png" class="likeButtonImg"/></label>
                    </div>
                    <div class="like" id="likeCnt">
                        ',$daoPostDb->getPostCount($postId),'
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex justify-content-center">
                ';?>
                <!-- コメント投稿モーダル -->
                    <img src="../svg/comment.svg" id="commentButton" onclick="openModal()">
                <?php 
                echo    '<div class="comment">
                        ',$daoPostDb->getPostCommentCount($postId),'
                    </div>
                </div>
            </div>
            <!-- 日付 -->   
            <span class="col-6"></span>
            <div class="postDate col-6">
                ',$postDate,'
            </div>     
            <!-- 詳細トグルボタン -->       
            <button class="detailsBtn navbar-toggler offset-8 col-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation"
            style="box-shadow:none;">
                <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9.5 12L18.5933 0.75H0.406734L9.5 12Z" fill="#D9D9D9"/>
                </svg>
                詳細
            </button>
            <!-- 詳細トグルボタン内容 -->    
            <div class="postInfo collapse" id="navbarToggleExternalContent">
                <P>店名:' ,$postInfo['store'], '</P>
                <P>メニュー:' ,$postInfo['menu'], ' </P>
                <P>料金 :' ,$postInfo['price'], '</P>
                <P>場所:' ,$postInfo['address'], '</P>
            </div>                   
        </div>
        ';
        //コメント取得
        $commentArray = $daoTshosaiDb->getCommentByPostId($postId);
        //モーダル コメント送信先候補セレクトボックス用の配列
        $comUserIdArray = array();
        //コメントがあれば
        if(count($commentArray)>=1){
            foreach($commentArray as $row){
                $userIds = $row['user_id'];
                $replyId ="";
                //コメントユーザー画像取得
                $userImg = $daoTshosaiDb -> getUserImgByUserId($userIds);
                $userImgBace = base64_encode($userImg['user_image']);
                //リプライIdがあれば　リプライID取得
                if(is_null($row['reply_id'])==false){
                    $replyId = 'コメント先:'.$daoTshosaiDb->getCommentUserIdByComId($row['reply_id']);
                }
                echo '
                <!-- 投稿のカード -->
                <div class="card">
                    <div class="card-body">
                        <div class="box">
                            <form action="userProfile.php" method="get">
                            <input type="image" src="data:',$userImg['image_type'],';base64,',$userImgBace,'" class="profielIcon" />
                            <input type="hidden" name="id" value="',($userIds),'">
                            </form>
                            <p class="userName">',$daoUserDb->getUserName($userIds),'<br>',
                            //リプライID
                            $replyId,
                            '</p>
                            <p class="userComment">',
                            //コメント内容
                            $row['comment_detail'],
                            '</p>
                        </div>
                        
                    </div>
                </div>
                ';
                //ログインユーザーと一致しなかったら
                if($row['user_id']!=$_SESSION['user_id']){
                    //送信先候補　comment_idをキーにuser_idを入れる
                    $comUserIdArray += array($row['comment_id'] => $row['user_id']);
                }
            }
        }
        //送信先候補　重複をなくす
        $comUserIdArray = array_unique($comUserIdArray);
        //ログインしているユーザー画像取得
        $loginUserImg = $daoTshosaiDb -> getUserImgByUserId($_SESSION['user_id']);
        $loginUserImgBace = base64_encode($userImg['user_image']);
        
    ?>

    </div>
    </div>
    </div>
    <!-- コメント投稿モーダル -->
    <div id="modal" class="modal">
        <div id="overlay" class="modal-content">
            <div id="content" class="content">
            <button onclick="closeModal()" id="closeBtn" ><h1>キャンセル</h1></button>
                <form method="POST" action="../DAO/comment.php" enctype="multipart/form-data">
                <div class="row">
                    <!-- ログインユーザー画像 -->
                    <div class="icon-image col-6">
                            <img src="data:<?php echo $loginUserImg['image_type'] ?>;base64,<?php echo $loginUserImgBace; ?>">
                    </div>
                    <!-- 送信先セレクトボックス -->
                    <select class="replySelect form-select col-6 ms-2" aria-label="Default select example" name="reply_id">
                        <option value="null" selected>未選択</option>
                        <?php
                        //comment_idをvalueに user_idをoption
                        foreach ($comUserIdArray as $reply => $comUserSelect) {
                            echo '<option value="' .$reply. '">' .$comUserSelect . ' </option>';
                        }
                        ?>
                    </select>
                    <!-- コメント内容 -->
                    <textarea name="comment_detail" id="edit-username" class="modalComment_datail mt-2" placeholder="コメント"></textarea>
                    <!-- post_id -->
                    <input type="hidden" name="post_id" value="<?php echo $postId;?>">
                    <!-- user_id -->
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
                    <button onclick="saveChanges()" type="submit" class="commentSaveBtn offset-8 col-3 mt-5">送信</button>  
                </div>                  
                </form>
                <!-- <button onclick="closeModal()" id="closeBtnHidden" >キャンセル</button> -->
            </div>
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

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="../js/OyamadaBar.js"></script>
    <!-- <script src="../js/time.js"></script>     -->
    <script src="../js/MaedaTest.js"></script>
    <script src="../js/Oyamadaprofile.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- splide -->
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js" integrity="sha256-FZsW7H2V5X9TGinSjjwYJ419Xka27I8XPDmWryGlWtw=" crossorigin="anonymous"></script>
    <script src="../js/T.syosai.js"></script>  

</body>
</html>
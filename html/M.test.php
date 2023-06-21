<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フォーラム</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .card{
            border: solid #FFAC4A;
            border-radius: 14px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="../css/modal.css?<?php echo date('YmdHis'); ?>"/>
    <link rel="stylesheet" type="text/css" href="../css/Oyamadatime2.css?<?php echo date('YmdHis'); ?>"/>

</head>
<?php 
    session_start();
    require_once '../DAO/forumdb.php';
    $forumdao = new DAO_forumdb();

    require_once '../DAO/rank.php';
    $rank = new DAO_rank();

    require_once '../DAO/userdb.php';
    $userdb = new DAO_userdb();

    // ユーザーアイコンのSQL
    $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
    'webuser', 'abccsd2');

    $sql = "SELECT * FROM user_image WHERE user_id = ? ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, 'maeda779', PDO::PARAM_STR);
    $stmt->execute();
    $image = $stmt->fetch(PDO::FETCH_ASSOC);

    $img = base64_encode($image['user_image']);
?>
<body>
    <div class="container-fluid">
        <div class="card">
            <div class="row">
                <h3 class="col mb-0 mt-2">AAAAAAAAAAAAA</h1>
            </div>
            <div class="row mx-1">
                <p class="col mb-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3 4H21V17H9V15H19V6H5V16H3V4Z" fill="#424242"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5 17.5858V15H3V22.4142L8.41421 17H12.5V15H7.58579L5 17.5858Z" fill="#424242"/>
                    <rect x="7" y="9" width="2" height="2" fill="#424242"/>
                    <rect x="11" y="9" width="2" height="2" fill="#424242"/>
                    <rect x="15" y="9" width="2" height="2" fill="#424242"/>
                    </svg>
                    aaa
                </p>
                <p class="col mb-0 text-end">aaa</p>
            </div>
        </div>
        
    </div>
    <div>
        <?= $rank->userRank('tamanegi'); ?>
    </div>

<div id="app">
    <!-- open-modalの中身が表示される -->
    <open-modal v-show="showContent" v-on:from-child="closeModal">
        <form method="POST" action="../DAO/post_imagesdb.php" enctype="multipart/form-data">
        <div class="row">
           <div class="col-2">
            <img src="data:<?php echo $image['image_type'] ?>;base64,<?php echo $img; ?> " class="profielIcon">
            </div>
            <div class="col-10 mr-5 pt-2">
            <?= $userdb->getUserName('maeda779'); ?>
            </div>
            </div>
            <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <textarea name="detail" class="form-control" id="exampleTextBox" rows="5"></textarea>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-10">
                    <details>
                        <summary class="float-right mr-3">詳細</summary>
                            <input type="text" name="store" id="textboxstyle" placeholder="店名" class="text-center">
                            <input type="text" name="menu" id="textboxstyle" placeholder="メニュー名" class="text-center">
                            <input type="text" name="price" id="textboxstyle" placeholder="価格" class="text-center">
                            <input type="text" name="address" id="textboxstyle" placeholder="場所" class="text-center">
                    </details>
                </div>

                <div class="col-2">
                    <label class="float-right mr-3">
                        <span class="filelabel">
                            <img src="../svg/imagefile.svg" alt="" id="file-iamge">
                        </span>
                        <input type="file" name="image[]" multiple id="file-send" class="filesend">
                        <input type="hidden" name="userid" value="<?= $_SESSION['user_id']?>">
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col-10"></div>
                <div class="col-2 mt-2">
                <input type="submit" value="送信" class="buttonsubmit">
                </div>
            </div>
            
            
        </form>
    </open-modal>

    <?php if(isset($_REQUEST['forumid'])){
        echo $_GET['forumid'];
            }else{
                echo 'エラー';
            }
                ?>
        
    
    <button v-on:click="openModal" class="button-style">オープン</button>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="../js/MaedaTest.js"></script>
</body>
</html>
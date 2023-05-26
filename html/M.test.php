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
</head>
<?php 
    require_once '../DAO/forumdb.php';
    $forumdao = new DAO_forumdb();
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
        <?= $forumdao->getForumId("1"); ?>
    </div>
    <form method="POST" action="../DAO/save.php" enctype="multipart/form-data">
    <input type="text" name="post_id" placeholder="1">
    <input type="file" name="image">
    <input type="submit" value="送信！">
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
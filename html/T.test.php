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
        .modal_syosai{
            overflow:auto;
            max-height:100%;
        }
        .image-container {
            overflow-x: auto;
            max-width:100%;
        }
        .t_text{
            font-size:14px;
            padding-bottom: 10%;
        }
        .t_photo{
            display: flex;
            padding-bottom: 5%;
        }
        .t_photo img{
            flex: 0 0 auto;
            width: 70%;
            height: auto;
        }
        .s-container{
            padding-top: 5%;
        }

                #file-iamge{
            width: 20px;
        }
        #filesend{
            display: none;
        }
        ul.store{
        }
        ul.store li{
            color: #898989;
            list-style: none;
            padding-left: 0;
        }
        /* .sub{
            flex: 1; 
            align-items: center;
            justify-content: center;
        } */
        .a{
            font-size: 20px;        
            display: inline-block;
            text-align:justify;
            text-align-last:justify;
            text-justify:inter-ideograph;
            /* margin-right: 15px; 
            margin-bottom: 30px; */
        }
        /* .main{
            flex: 2;
            align-items: center;
            justify-content: center;
        } */
        .s_syosai{
            display: inline-block;
            margin-top: 5px;
            margin-right: 20px;
            margin-bottom: 30px;
            background-color: #d3d3d3;
            border:none;
            box-shadow: 1px 3px 4px rgb(170,170,170);
        }
        .sousin{
            float:right;
            font-weight:bold;
            text-align: center;
            text-decoration: none;
            background-color: #ffac4a; /* ボタンの背景色 */
            color: #000000; /* ボタンのテキストカラー */
            font-size: 13px; /* ボタンのテキストサイズ */
            margin-top: -8px;
            border: none;
            border-radius: 50px 55px 55px 50px; /* 左上と左下の角を10ピクセルの丸角にする */
            width: 60px; /* ボタンの幅 */
            height: 35px; /* ボタンの高さ */
        }
        .close{
            position: absolute;
            float: right;
            top: ;
            font-size:20px;
        }
    </style>
    <link rel="stylesheet" href="../css/modal.css">
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

<div id="app">
    <!-- open-modalの中身が表示される -->
    <open-modal v-show="showContent" v-on:from-child="closeModal">
        <form method="POST" action="../DAO/post_imagesdb.php" enctype="multipart/form-data">
            
            <div class="modal_syosai">
                <p class="t_text">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーで</p>
                <div class="image-container ">
                    <div class="t_photo">
                        <img src="../svg/tamanegi.svg" alt="" >
                        <img src="../svg/tamanegi.svg" alt="" >
                        <img src="../svg/tamanegi.svg" alt="" >
                    </div>
                </div>
                <label>
                    <span class="filelabel">
                        <img src="../svg/imagefile.svg" alt="" id="file-iamge">
                    </span>
                    <input type="file"id="filesend">
                </label>
                <details>
                    <summary class="s-container">詳細</summary>
                        <ul class="store">
                        <!-- <div class="sab">
                                <li>
                                    <span class="a">店名:</span>
                                </li>
                                <li>
                                    <span class="a">メニュー:</span>
                                </li>
                                <li>
                                    <span class="a">料金:</span>
                                </li>
                                <li>
                                    <span class="a">場所:</span>
                                </li>
                            </div>
                            <div class="main">
                                    <input type="text" name="store"class="s_syosai">
                                    <input type="text" name="store"class="s_syosai">
                                    <input type="text" name="store"class="s_syosai">
                                    <input type="text" name="store"class="s_syosai">
                            </div>
                        </ul> -->
                            <li>
                                <div class="">
                                    <span>店名:</span>
                                    <input type="text" name="store"class="s_syosai">
                                </div>
                            </li>
                            <li>
                                <div>
                                    <span>メニュー:</span>
                                    <input type="text" name="store"class="s_syosai">
                                </div>
                            </li>
                            <li>
                                <div>
                                    <span>価格:</span>
                                    <input type="text" name="store"class="s_syosai">
                                </div>
                            </li>
                            <li>
                                <div>
                                    <span>場所:</span>
                                    <input type="text" name="store"class="s_syosai">
                                </div>
                            </li>
                        </ul>
            </div>
            <div>
                <!-- <p>画像を最大４枚まで選択</p>
                <input type="file" name="image[]" multiple>
                <input type="text" name="id"> -->
                <input type="submit" value="投稿"class="sousin">
            </div>
        </form>
    </open-modal>

    <button v-on:click="openModal" class="button-style">オープン</button>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="../js/ToyosakaTest.js"></script>
</body>
</html>
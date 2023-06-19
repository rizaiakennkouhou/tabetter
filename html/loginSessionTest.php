<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>セッションテスト</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" integrity="sha256-5uKiXEwbaQh9cgd2/5Vp6WmMnsUr3VZZw0a8rKnOKNU=" crossorigin="anonymous">
    <style>
        .splide__slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <?php
    echo 'てすとおおおおおおおおおお';
    ?>

    <section id="image-carousel" class="splide" aria-label="投稿画像">
    <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                <img src="../userImage/main.jpg" alt="画像1">
                </li>
                <li class="splide__slide">
                <img src="../userImage/main.jpg" alt="画像2">
                </li>
                <li class="splide__slide">
                <img src="../userImage/main.jpg" alt="画像3">
                </li>
            </ul>
    </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js" integrity="sha256-FZsW7H2V5X9TGinSjjwYJ419Xka27I8XPDmWryGlWtw=" crossorigin="anonymous"></script>
    <script src="../js/T.syosai.js"></script>
</body>
</html>

<!--
        <button class="text-start">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.2931 5.29297L15.7073 6.70718L10.4144 12.0001L15.7073 17.293L14.2931 18.7072L7.58596 12.0001L14.2931 5.29297Z" fill="#424242"/>
                    </svg>                    
                </button>

        <section id="image-carousel" class="splide" aria-label="投稿画像">
                            <div class="splide__track">
                                  <ul class="splide__list">
                                      <li class="splide__slide">
                                        <img src="../userImage/main.jpg" alt="画像1">
                                      </li>
                                      <li class="splide__slide">
                                        <img src="../userImage/main.jpg" alt="画像2">
                                      </li>
                                      <li class="splide__slide">
                                        <img src="../userImage/main.jpg" alt="画像3">
                                      </li>
                                  </ul>
                            </div>
                          </section>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" integrity="sha256-5uKiXEwbaQh9cgd2/5Vp6WmMnsUr3VZZw0a8rKnOKNU=" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js" integrity="sha256-FZsW7H2V5X9TGinSjjwYJ419Xka27I8XPDmWryGlWtw=" crossorigin="anonymous"></script>
        <script src="../js/T.syosai.js"></script>

        <section id="image-carousel" class="splide" aria-label="投稿画像">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <img src="../userImage/main.jpg" alt="画像1">
                    </li>
                    <li class="splide__slide">
                        <img src="../userImage/main.jpg" alt="画像2">
                    </li>
                    <li class="splide__slide">
                        <img src="../userImage/main.jpg" alt="画像3">
                    </li>
                </ul>
            </div>
        </section>
-->
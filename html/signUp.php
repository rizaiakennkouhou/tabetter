<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="css/login.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/j.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規登録</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- googleフォント -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/toroku.css">

    <div class="logo col text-center">
        <img src="../svg/login_logo.svg" alt="ログインロゴ" id="logoImg">
    </div>

</head>
<body>
    <div class="container">
        <div id="underLogo">
            <h5 class="headline col text-center mb-5">美味しいを伝えよう</h5>
            <!-- フォーム     -->
            <form name="registForm" action="signUpdetail.php" method="POST" enctype="multipart/form-data">
                <div class="form text-center col" id="FormAbove">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2 5H22V19H2V5ZM4 7V17H20V7H4Z" fill="#424242"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.38135 6.78558L3.61909 5.2146L12.0002 11.8179L20.3813 5.2146L21.6191 6.78558L12.0002 14.3641L2.38135 6.78558Z" fill="#424242"/>
                    </svg>   
                <!-- メール -->
                <input type="email" name="mail" placeholder="メールアドレス/ID" class="formInput text-center" required>
                </div>    

                <div class="form col text-center" id="">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3823 13.2381L14.4983 13.5378C16.007 13.9431 17.6761 13.552 18.8538 12.3744C20.6112 10.617 20.6112 7.76777 18.8538 6.01041C17.0964 4.25305 14.2472 4.25305 12.4898 6.01041C11.4191 7.08115 10.999 8.55627 11.2357 9.95086L11.4085 10.9693L9.00984 13.3679L9.00984 15.9537L7.59563 15.9537V17.3679L5.00984 17.3679L4.4903 17.8875L4.45102 20.0481L6.61162 20.0088L13.3823 13.2381ZM7.45506 21.9938L2.41365 22.0854L2.50531 17.044L4.18141 15.3679H5.59563L5.59563 13.9537H7.00984V12.5395L9.26385 10.2855C8.92343 8.27948 9.52735 6.14446 11.0756 4.59619C13.614 2.05779 17.7296 2.05779 20.268 4.59619C22.8064 7.1346 22.8064 11.2502 20.268 13.7886C18.5644 15.4922 16.1504 16.0525 13.9795 15.4693L7.45506 21.9938Z" fill="#424242"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9093 9.00372L15.4951 7.58951L16.9093 6.17529L18.3235 7.58951L16.9093 9.00372Z" fill="#424242"/>
                    </svg>
                    <!-- パスワード         -->
                    <input type="password" name="pass" placeholder="パスワード" class="formInput text-center    " required>
                </div>

                <div class="form col text-center" id="">
                    <svg width="22" height="21" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 12.5C14.7239 12.5 16.3772 11.8415 17.5962 10.6694C18.8152 9.49731 19.5 7.9076 19.5 6.25C19.5 4.5924 18.8152 3.00269 17.5962 1.83058C16.3772 0.65848 14.7239 0 13 0C11.2761 0 9.62279 0.65848 8.40381 1.83058C7.18482 3.00269 6.5 4.5924 6.5 6.25C6.5 7.9076 7.18482 9.49731 8.40381 10.6694C9.62279 11.8415 11.2761 12.5 13 12.5ZM17.3333 6.25C17.3333 7.35507 16.8768 8.41488 16.0641 9.19628C15.2515 9.97768 14.1493 10.4167 13 10.4167C11.8507 10.4167 10.7485 9.97768 9.93587 9.19628C9.12321 8.41488 8.66667 7.35507 8.66667 6.25C8.66667 5.14493 9.12321 4.08512 9.93587 3.30372C10.7485 2.52232 11.8507 2.08333 13 2.08333C14.1493 2.08333 15.2515 2.52232 16.0641 3.30372C16.8768 4.08512 17.3333 5.14493 17.3333 6.25ZM26 22.9167C26 25 23.8333 25 23.8333 25H2.16667C2.16667 25 0 25 0 22.9167C0 20.8333 2.16667 14.5833 13 14.5833C23.8333 14.5833 26 20.8333 26 22.9167ZM23.8333 22.9083C23.8312 22.3958 23.4997 20.8542 22.0307 19.4417C20.618 18.0833 17.9595 16.6667 13 16.6667C8.03833 16.6667 5.382 18.0833 3.96933 19.4417C2.50033 20.8542 2.171 22.3958 2.16667 22.9083H23.8333Z" fill="black"/>
                        </svg>
                        
                    <!-- ID登録         8文字限定-->
                    <input type="text" name="userId" placeholder="ID登録" class="formInput text-center    " required>
                </div>

                <div class="form col text-center" id="">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0658 3.0271L20.7226 8.68395L9.85445 19.5521L3.72619 20.0235L4.1976 13.8953L15.0658 3.0271ZM15.0658 5.85553L6.13496 14.7863L5.89926 17.8505L8.96339 17.6148L17.8942 8.68395L15.0658 5.85553Z" fill="#424242"/>
                        </svg>
                        
                    <!-- ニックネーム       -->
                    <input type="text" name="userName" placeholder="ニックネーム" class="formInput text-center    " required>
                </div>
                <div class="form col text-center" id="">
                <div>
                    <!-- <input type="file" name="image" required> -->

                    <label>
                        <span class="formInput">
                            <img src="../svg/p.icon.svg" alt="" id="file-image">
                        </span>
                            <div class="a">
                                <input type="file" name="image" placeholder="アイコン" class="formInput text-center    " id="filesend" required>
                            </div>
                                <p class="icon">アイコン</p>
                    </label>

                </div>
                </div>

                <!-- エラーメッセ -->
                <div class="errorMsgDiv mb-1 mt-4">
                    <p id="errorMsg" class="text-danger text-center"></p>    
                </div>
                <!-- 登録ボタン -->
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="createBtn btn" type="submit" onclick="registClick()">作成</button>
                </div>
            </form>
        </div> 
        
        <div class="fogetPassDiv col">
        <a href="rogin.html" class="fogetPass">アカウントをすでに登録済みの方</a>
        </div>
    </div>
    
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/toroku.js"></script>
</body>
</html>
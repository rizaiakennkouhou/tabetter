<?php
//セッションスタート
    session_start();
    //DAO接続
    require_once '../DAO/logindb.php';
    $dbmng = new DAO_Logindb;
    //エラーメッセージ変数
    $msg ="";
    //POST要求があれば
    if ($_SERVER['REQUEST_METHOD']==='POST') {
        try {
            //ユーザー検索
            $userArray = $dbmng->getUserByMail($_POST['mail'],$_POST['pass']);
            foreach ($userArray as $row) {
                //セッション作成

                $_SESSION['user_id']=$row['user_id'];
                // echo $row['user_id'];
            }
            //移動   テストで一旦　Oyamadaprofile　にしてます
            header('Location: timeLine.php');
            exit();
        } catch (BadMethodCallException $bex) {
            //エラーキャッチ　メアドなし
            $msg='メールアドレスが存在しません';
        }catch(LogicException $lex){
            //パスなし
            $msg ='パスワードが一致しません';
        }
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="css/login.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/j.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- googleフォント -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
    <!-- ロゴ -->
    <div class="logo col text-center">
        <img src="../svg/login_logo.svg" alt="ログインロゴ" id="logoImg">
    </div>

</head>
<body>
    <div class="container">
        <div id="underLogo"> 
            <h5 class="headline col text-center mb-5">美味しいを伝えよう</h5>
                <!-- フォーム -->
                <form name="loginForm" action="" method="post">
                    <div class="form text-center col" id="FormAbove">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2 5H22V19H2V5ZM4 7V17H20V7H4Z" fill="#424242"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.38135 6.78558L3.61909 5.2146L12.0002 11.8179L20.3813 5.2146L21.6191 6.78558L12.0002 14.3641L2.38135 6.78558Z" fill="#424242"/>
                        </svg>   
                    <!-- メール カーソル左-->
                    <input type="email" name="mail" placeholder="メールアドレス/ID" class="formInput text-center">
                    </div>    
                    <div class="form col text-center" id="">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.3823 13.2381L14.4983 13.5378C16.007 13.9431 17.6761 13.552 18.8538 12.3744C20.6112 10.617 20.6112 7.76777 18.8538 6.01041C17.0964 4.25305 14.2472 4.25305 12.4898 6.01041C11.4191 7.08115 10.999 8.55627 11.2357 9.95086L11.4085 10.9693L9.00984 13.3679L9.00984 15.9537L7.59563 15.9537V17.3679L5.00984 17.3679L4.4903 17.8875L4.45102 20.0481L6.61162 20.0088L13.3823 13.2381ZM7.45506 21.9938L2.41365 22.0854L2.50531 17.044L4.18141 15.3679H5.59563L5.59563 13.9537H7.00984V12.5395L9.26385 10.2855C8.92343 8.27948 9.52735 6.14446 11.0756 4.59619C13.614 2.05779 17.7296 2.05779 20.268 4.59619C22.8064 7.1346 22.8064 11.2502 20.268 13.7886C18.5644 15.4922 16.1504 16.0525 13.9795 15.4693L7.45506 21.9938Z" fill="#424242"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.9093 9.00372L15.4951 7.58951L16.9093 6.17529L18.3235 7.58951L16.9093 9.00372Z" fill="#424242"/>
                        </svg>
                        <!-- パスワード         -->
                        <input type="password" name="pass" placeholder="パスワード" class="formInput text-center">
                    </div>
                    <!-- エラーメッセ -->
                    <div class="errorMsgDiv mb-1 mt-4">
                        <p id="errorMsg" class="text-danger text-center"><?php
                        //エラーメッセージphp変数
                        echo $msg; ?></p>    
                    </div>
                    <!-- ログインボタン -->
                    <div class="d-grid gap-2 col-6 mx-auto ">
                        <button class="loginBtn btn" type="button" onclick="loginClick()">ログイン</button>
                    </div>
                </form>
                
                <p class="registTxt text-center">アカウントをお持ちでない方</p>
                <div class="d-grid gap-2 col-6 mx-auto mt-3">
                    <button class="registBtn btn" type="button" onclick="location.href='signUp.php'">新規登録</button>
                </div>
        </div> 
        
        <!-- <div class="fogetPassDiv col">
        <a href="rogin.html" class="fogetPass">パスワードを忘れた場合はこちら</a>
        </div> -->
    </div>
    
    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/login.js"></script>
</body>
</html>
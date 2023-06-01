// ログインチェック
function loginClick() {
    let errorMsg = document.getElementById("errorMsg"); 
    let mail = document.getElementsByName("mail");
    let pass = document.getElementsByName("pass");    
    if (mail[0].value==""&&pass[0].value=="") {
        errorMsg.innerText  ="メールアドレスとパスワードが入力されていません";
        return false;
    }else if(mail[0].value==""){
        errorMsg.innerText  ="メールアドレスが入力されていません";
        return false;
    }else if(pass[0].value==""){
        errorMsg.innerText  ="パスワードが入力されていません";
        return false;
    }else{
        document.loginForm.requestSubmit();
    }
}

document.getElementById("FormAbove").addEventListener("focus", function() {
    this.setSelectionRange(0, 0);
  });
//登録チェック
function registClick() {
    let errorMsg = document.getElementById("errorMsg"); 
    let mail = document.getElementsByName("mail");
    let pass = document.getElementsByName("pass");    
    let userId = document.getElementsByName("userId");    
    let userName = document.getElementsByName("userName");    
    if (mail[0].value==""||pass[0].value==""||
    userId[0].value==""||userName[0].value=="") {
        errorMsg.innerText  ="必要項目が入力されていません";
        return false;
    }else if(userId[0].value.length!=8){
        errorMsg.innerText  ="IDは8文字である必要があります";
        return false;
    }
    else{
        document.registForm.requestSubmit();
    }
}


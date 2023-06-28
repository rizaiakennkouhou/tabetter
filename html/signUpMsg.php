<!-- <script>
    alert("メールアドレスまたはユーザーIDが重複しています")
    location.href="https://localhost/tabetter/html/signUp.php";
</script> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/profileCheck.css?<?php echo date('YmdHis'); ?>"/>
</head>
<body>
<div id="custom-modal">
  <div class="modal-content">
    <p>メールアドレスまたはユーザーIDが重複しています</p>
    <button onclick="closeModal()">OK</button>
  </div>
</div>

<script>
    function closeModal() {
  var modal = document.getElementById('custom-modal');
  modal.style.display = 'none';
  location.href="http://localhost/tabetter/html/signUp.php";
}

window.addEventListener('DOMContentLoaded', function() {
  var modal = document.getElementById('custom-modal');
  modal.style.display = 'flex';
});

// window.addEventListener('DOMContentLoaded', function() {
//   alert("ユーザー名は1文字以上10文字以下で入力してください。");
//   location.href = "https://localhost/tabetter/html/myProfile.php";
// });
</script>
</body>
</html>
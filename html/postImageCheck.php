<!-- <script>
    alert("投稿出来る画像は4枚までです")
    location.href="https://localhost/tabetter/html/timeLine.php";
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
    <p>投稿出来る画像は4枚までです</p>
    <button onclick="closeModal()">OK</button>
  </div>
</div>

<script>
    function closeModal() {
  var modal = document.getElementById('custom-modal');
  modal.style.display = 'none';
  location.href="https://localhost/tabetter/html/timeLine.php";
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
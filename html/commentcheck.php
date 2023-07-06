<!-- <script>
    alert("コメントを入力して下さい！")
    location.href="https://localhost/tabetter/html/T.syosai2.php";
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
    <p>コメントを入力して下さい！</p>
    <button onclick="closeModal()">OK</button>
  </div>
</div>

<script>
    function closeModal() {
  var modal = document.getElementById('custom-modal');
  modal.style.display = 'none';
  //urlからGet 取得
  const params = new URL(window.location.href).searchParams;
  location.href="https://localhost/tabetter/html/T.syosai.php?post_id="+params.get('post_id');
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
<?php
$pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                        'webuser', 'abccsd2');

        //自分のコメントを削除する処理


    $id = intval($_GET['commentid']);  //$idをstring型からint型に変換
    if (isset($_POST['confirm'])) {
    $sql = "DELETE FROM post_comment WHERE comment_id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            
            header('Location: https://localhost/tabetter/html/userTime.php');
            exit();
    }

?>
<script>
    // 削除確認のアラートを表示し、削除処理を実行する
    function confirmDeletion() {
        var confirmed = confirm("本当に削除しますか？");
        if (confirmed) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>

<!-- 削除確認のアラートを表示する -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div style="display: flex; flex-direction: column; align-items: center;">
    <button onclick="confirmDeletion()" class="btn btn-danger btn-lg" style="background-color: #FF8A00; padding: 60px 100px; font-size: 40px; width: 400px;">削除する</button>
    <form id="deleteForm" method="post" style="display: none;">
        <input type="hidden" name="confirm" value="1">
    </form>
    <br>
    <button onclick="location.href='../html/userTime.php'" class="btn btn-secondary btn-lg" style="padding: 60px 100px; font-size: 40px; width: 400px;">戻る</button>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</div>
</div>
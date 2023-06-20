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
<div align="center">
    <h1>データ削除</h1>
    <button onclick="confirmDeletion()">削除する</button>
    <form id="deleteForm" method="post" style="display: none;">
        <input type="hidden" name="confirm" value="1">
    </form>
    <button onclick="location.href='../html/userTime.php'">戻る</button>
</div>
<?php
// データベース接続などの設定
$dbHost = 'データベースホスト名';
$dbUser = 'データベースユーザー名';
$dbPass = 'データベースパスワード';
$dbName = 'データベース名';

// 検索キーワードの取得
$keyword = $_POST['keyword'];

// データベースに接続
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// 接続エラーのチェック
if ($conn->connect_error) {
    die("データベースに接続できませんでした: " . $conn->connect_error);
}

// クエリの作成と実行
$sql = "SELECT * FROM テーブル名 WHERE 列名 LIKE '%" . $keyword . "%'";
$result = $conn->query($sql);

// 検索結果の表示
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // 検索結果の表示処理
        echo $row['列名'] . "<br>";
    }
} else {
    echo "該当する結果はありませんでした";
}

// データベース接続のクローズ
$conn->close();
?>

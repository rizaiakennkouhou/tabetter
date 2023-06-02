<?php
class DAO_search{
    //データベースに接続する関数
    private function dbConnect(){
        //データベースに接続
        $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                        'webuser', 'abccsd2');
        return $pdo;
    }

    //投稿詳細をライク検索する関数
    public function getPostDetail($key){
        $pdo = $this -> dbConnect();

        //SQLの生成　入力を受け取る部分は”？”
        $sql = "SELECT * FROM post WHERE post_detail LIKE ?";

        //prepare:準備　戻り値を変数に保持
        $ps = $pdo -> prepare($sql);

        //”？”に値を設定する。
        $ps->bindValue(1, "%". $key . "%", PDO::PARAM_STR); 

        //SQLの実行
        $ps->execute();
        $result = $ps->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
?>
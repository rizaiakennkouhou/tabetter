<?php
class DAO_post{
    //データベースに接続する関数
    private function dbConnect(){
        //データベースに接続
        $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                        'root', 'root');
        return $pdo;
    }

    //投稿を表示
    public function getPostDetail($postId){
        $pdo = $this->dbConnect();

        $sql = "SELECT * FROM post WHERE post_id=?";

        $ps = $pdo->prepare($sql);

        $ps->bindValue(1, $postId, PDO::PARAM_INT);

        $ps->execute();
        $result = $ps->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
}

?>
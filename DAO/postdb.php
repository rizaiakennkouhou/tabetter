<?php
class DAO_post{
    //データベースに接続する関数
    private function dbConnect(){
        //データベースに接続
        $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                        'webuser', 'abccsd2');
        return $pdo;
    }

    //投稿情報を配列に入れる
    public function getPostTblById($id){
        $pdo = $this->dbConnect();

        $sql = "SELECT * FROM post WHERE post_id=?";

        $ps = $pdo->prepare($sql);

        $ps->bindValue(1, $id, PDO::PARAM_INT);

        $ps->$execute();
        $result = $ps->fetchAll();

        return $reuslt;
    }

    //投稿内容を出力
    public function outputPostDetail($id){
        $result = $this->getPostTblById($id);

        foreach($result as $row){
            $postDetail = $row['post_detail'];
        }

        echo $postDetail;
    }
}

?>
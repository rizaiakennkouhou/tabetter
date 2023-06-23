<?php
class DAO_post{
    //データベースに接続する関数
    private function dbConnect(){
        //データベースに接続
        $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                        'webuser', 'abccsd2');
        return $pdo;
    }

    //投稿テーブルの情報を全て取得
    public function getPostTblById($postId){
        $pdo = $this->dbConnect();

        $sql = "SELECT * FROM post WHERE post_id = ?";

        $ps = $pdo->prepare($sql);

        $ps->bindValue(1, $postId, PDO::PARAM_INT);

        $ps->execute();
        $result = $ps->fetchAll();

        return $result;
    }

    //投稿内容を表示
    public function getPostDetail($postId){
        $pdo = $this->dbConnect();

        $sql = "SELECT * FROM post WHERE post_id = ?";

        $ps = $pdo->prepare($sql);

        $ps->bindValue(1, $postId, PDO::PARAM_INT);

        $ps->execute();
        $result = $ps->fetch(PDO::FETCH_ASSOC);

        if($result) {
            return $result['post_detail'];
        }
    }

    //post_idからuser_idを検索
    public function getUserIdsByPostId($postId){
        $pdo = $this->dbConnect();

        $sql = "SELECT * FROM post WHERE post_id = ?";

        $ps = $pdo->prepare($sql);

        $ps->bindValue(1, $postId, PDO::PARAM_INT);

        $ps->execute();
        $result = $ps->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $row){
            $userIds=$row['user_id'];
        }

        return $userIds;
    }

    //投稿情報を全件取得
    public function getPostIds(){
        $pdo = $this->dbConnect();

        $sql = "SELECT * FROM post ORDER BY post_id DESC";

        $ps = $pdo->prepare($sql);

        $ps->execute();
        $result = $ps->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $row){
            $postIds[] = $row['post_id'];
        }

        return $postIds;
    }

    //カウント(likesdbに書き直す)
    public function getPostCount($postId){
        $pdo = $this->dbConnect();

        $sql = "SELECT * FROM likes WHERE post_id=?";

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $postId, PDO::PARAM_INT);

        $ps->execute();
        $count = $ps->rowCount();

        return $count;
    }

    public function getPostCommentCount($postId){
        $pdo = $this->dbConnect();

        $sql = "SELECT * FROM post_comment WHERE post_id = ?";

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $postId, PDO::PARAM_INT);

        $ps->execute();
        $count = $ps->rowCount();

        return $count;
    }

    public function getPostImageByPostId($postId){
        $pdo = $this->dbConnect();

        $sql = "SELECT * FROM post_images WHERE post_id = ?";

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $postId, PDO::PARAM_INT);

        $ps->execute();
        $result = $ps->fetchAll(PDO::FETCH_ASSOC);

        $imageIds = array();

        foreach($result as $row){
            $imageIds[] = $row['post_id'];
        }

        return $imageIds;
    }

    public function getPostDateByPostId($postId){
        $pdo = $this->dbConnect();

        $sql = "SELECT * FROM post WHERE post_id = ?";

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $postId, PDO::PARAM_INT);

        $ps->execute();
        $result = $ps->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $row){
            $postDate = $row['post_date'];
        }

        return $postDate;
    }
}

?>
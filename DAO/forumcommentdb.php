<?php 
class DAO_forumcommentdb{
    //データベースに接続する関数
    private function dbConnect(){
        //データベースに接続
        $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                        'webuser', 'abccsd2');
        return $pdo;
    }

    public function getCommentIds($forumid){
        $pdo = $this->dbConnect();

        $sql = "SELECT * FROM forum_comment WHERE forum_id = ? ORDER BY forum_comment_id DESC";

        $ps = $pdo->prepare($sql);
        $ps->bindValue(1,$forumid,PDO::PARAM_INT);

        $ps->execute();
        $result = $ps->fetchAll(PDO::FETCH_ASSOC);

        if($result){

            foreach($result as $row){
            $forumIds[] = $row['forum_comment_id'];
            }

        return $forumIds;

        }else{
            echo '';
        }
    }

    // 詳細を出す
    public function getForumCommentDetail($forumId) {
        $pdo = $this->dbConnect();
    
        $sql = "SELECT * FROM forum_comment WHERE forum_comment_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $forumId, PDO::PARAM_INT);
        $ps->execute();
    
        $result = $ps->fetch(PDO::FETCH_ASSOC);
    
        if ($result) {
            return $result['forum_comment_detail'];

        } else {
            return '投稿が見つかりませんでした';
        }
    }

    // 時間を出す
    public function getForumCommentDate($forumId) {
        $pdo = $this->dbConnect();
    
        $sql = "SELECT * FROM forum_comment WHERE forum_comment_id = ?";
        $ps = $pdo->prepare($sql);
        $ps->bindValue(1, $forumId, PDO::PARAM_INT);
        $ps->execute();
    
        $result = $ps->fetch(PDO::FETCH_ASSOC);
    
        if ($result) {
            return $result['forum_comment_date'];

        } else {
            return '時間が見つかりませんでした';
        }
    }



}

?>
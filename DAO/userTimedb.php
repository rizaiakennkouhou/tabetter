<?php
class DAO_userTimedb{
        //データベースに接続する関数
        private function dbConnect(){
            //データベースに接続
            $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                            'webuser', 'abccsd2');
            return $pdo;
        }

            //自分の投稿を全件取得    
            public function getUserIds($userId){
                $pdo = $this->dbConnect();
                $sql = "SELECT * FROM post WHERE user_id = ?";

                $ps = $pdo->prepare($sql);
                $ps->bindValue(1, $userId, PDO::PARAM_STR);
                $ps->execute();
                $result = $ps->fetchAll(PDO::FETCH_ASSOC);
        
                foreach($result as $row){
                    $userIds[] = $row['post_id'];
                }
        
                return $userIds;  
            }

            //自分の投稿内容を表示
            public function getUserDetail($userId){
                $pdo = $this->dbConnect();
                $sql = "SELECT * FROM post WHERE user_id = ?";

                $ps = $pdo->prepare($sql);
                $ps->bindValue(1, $userId, PDO::PARAM_STR);
                $ps->execute();
                $result = $ps->fetch(PDO::FETCH_ASSOC);

                if($result) {
                    return $result['post_detail'];
                }else{
                    echo 'データがありません';
                }
            }

            //自分のコメントを表示
            public function getCommentDetail($commentId){
                $pdo = $this->dbConnect();
                $sql = "SELECT * FROM post_comment WHERE comment_id = ?";
        
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1, $commentId, PDO::PARAM_INT);
                $ps->execute();
                $result = $ps->fetch(PDO::FETCH_ASSOC);
        
                if($result) {
                    return $result['comment_detail'];
                }else{
                    echo 'データがありません';
                }
            }

            //自分のフォーラムを表示
            public function getForumDetail($forumId){
                $pdo = $this->dbConnect();
                $sql = "SELECT * FROM forum WHERE forum_id = ?";
        
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1, $forumId, PDO::PARAM_INT);
                $ps->execute();
                $result = $ps->fetch(PDO::FETCH_ASSOC);
        
                if($result) {
                    return $result['title'];
                }else{
                    echo 'データがありません';
                }
            }

            //自分のフォーラムコメントを表示
            public function getForumCommentDetail($forumcommentId){
                $pdo = $this->dbConnect();
                $sql = "SELECT * FROM forum_comment WHERE forum_comment_id = ?";
        
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1, $forumcommentId, PDO::PARAM_INT);
                $ps->execute();
                $result = $ps->fetch(PDO::FETCH_ASSOC);
        
                if($result) {
                    return $result['forum_comment_detail'];
                }else{
                    echo 'データがありません';
                }
            }
            //コメントの日付
            public function getCommentDateByCommentId($postId){
                $pdo = $this->dbConnect();
        
                $sql = "SELECT * FROM post_comment WHERE comment_id = ?";
        
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1, $postId, PDO::PARAM_INT);
        
                $ps->execute();
                $result = $ps->fetchAll(PDO::FETCH_ASSOC);
        
                foreach($result as $row){
                    $postDate = $row['comment_date'];
                }
        
                return $postDate;
            }

            //コメントの日付
            public function getForumDateByForumId($postId){
                $pdo = $this->dbConnect();
        
                $sql = "SELECT * FROM forum WHERE forum_id = ?";
        
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1, $postId, PDO::PARAM_INT);
        
                $ps->execute();
                $result = $ps->fetchAll(PDO::FETCH_ASSOC);
        
                foreach($result as $row){
                    $postDate = $row['forum_date'];
                }
        
                return $postDate;
            }

            //コメントの日付
            public function getForumCommentDateByForumCommentId($postId){
                $pdo = $this->dbConnect();
        
                $sql = "SELECT * FROM forum_comment WHERE forum_comment_id = ?";
        
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1, $postId, PDO::PARAM_INT);
        
                $ps->execute();
                $result = $ps->fetchAll(PDO::FETCH_ASSOC);
        
                foreach($result as $row){
                    $postDate = $row['forum_comment_date'];
                }
        
                return $postDate;
            }
            
}
        
 
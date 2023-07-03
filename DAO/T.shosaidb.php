<?php
    class DAO_Tshosaidb{
        private function dbConnect(){
            //データベースに接続
            $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                            'webuser', 'abccsd2');
            return $pdo;
        }
        //投稿詳細情報（店名など）取得　post_idで
        public function getPostInfoByPostId($postId){
            $pdo = $this->dbConnect();

            $sql = "SELECT store,menu,price,address FROM post WHERE post_id = ?";

            $ps = $pdo->prepare($sql);

            $ps->bindValue(1, $postId, PDO::PARAM_INT);

            $ps->execute();
            $result = $ps->fetch(PDO::FETCH_ASSOC);

            if($result) {
                return $result;
            }
        }
        //投稿画像取得　post_id
        public function getPostImgByPostId($postId){
            $pdo = $this->dbConnect();
            $sql = "SELECT * FROM post_images WHERE post_id = ? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $postId, PDO::PARAM_INT);
            $stmt->execute();
            $image = $stmt->fetchAll();
            if($image){
                return $image;
            }
        }
        //ユーザー画像取得　user_id
        public function getUserImgByUserId($userIds){
            $pdo = $this->dbConnect();
            $sql = "SELECT * FROM user_image WHERE user_id = ? ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $userIds, PDO::PARAM_STR);
            $stmt->execute();
            $image = $stmt->fetch(PDO::FETCH_ASSOC);
            if($image){
                return $image;
            }
        }
        //コメント取得　post_idで comment_id降順
        public function getCommentByPostId($postId){
            $pdo = $this->dbConnect();

            $sql = "SELECT * FROM post_comment WHERE post_id = ? ORDER BY comment_id DESC";

            $ps = $pdo->prepare($sql);

            $ps->bindValue(1, $postId, PDO::PARAM_INT);

            $ps->execute();
            $result = $ps->fetchAll();

            if($result) {
                return $result;
            }
        }
        //リプライユーザーID取得　comment_idで
        public function getCommentUserIdByComId($comment_id){
            $pdo = $this->dbConnect();

            $sql = "SELECT user_id FROM post_comment WHERE comment_id = ?";

            $ps = $pdo->prepare($sql);

            $ps->bindValue(1, $comment_id, PDO::PARAM_INT);

            $ps->execute();
            $result = $ps->fetch(PDO::FETCH_ASSOC);

            if($result) {
                return $result['user_id'];
            }
        }
        //いいねついか　
        public function insertLike($post_id ,$user_id){
            $pdo = $this->dbConnect();

            $sql = "insert into likes values (?,?);";

            $ps = $pdo->prepare($sql);

            $ps->bindValue(1, $post_id, PDO::PARAM_INT);
            $ps->bindValue(2, $user_id, PDO::PARAM_STR);
            $ps->execute();
            // $result = $ps->fetch(PDO::FETCH_ASSOC);

        }
        //いいね削除
        public function deleteLike($post_id ,$user_id){
            $pdo = $this->dbConnect();

            $sql = "DELETE FROM likes WHERE post_id = ? AND user_id = ?";

            $ps = $pdo->prepare($sql);

            $ps->bindValue(1, $post_id, PDO::PARAM_INT);
            $ps->bindValue(2, $user_id, PDO::PARAM_STR);
            $ps->execute();
            // $result = $ps->fetch(PDO::FETCH_ASSOC);
        }
    }
?>
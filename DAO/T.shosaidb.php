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
        public function getCommentByPostId($postId){
            $pdo = $this->dbConnect();

            $sql = "SELECT * FROM post_comment WHERE post_id = ?";

            $ps = $pdo->prepare($sql);

            $ps->bindValue(1, $postId, PDO::PARAM_INT);

            $ps->execute();
            $result = $ps->fetchAll();

            if($result) {
                return $result;
            }
        }
    }
?>
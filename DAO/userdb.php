<?php
class DAO_userdb{
        //データベースに接続する関数
        private function dbConnect(){
            //データベースに接続
            $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                            'webuser', 'abccsd2');
            return $pdo;
        }
        public function getUserName($userId) {
            $pdo = $this->dbConnect();
        
            $sql = "SELECT * FROM user WHERE user_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $userId, PDO::PARAM_STR);
            $ps->execute();
        
            $result = $ps->fetch(PDO::FETCH_ASSOC);
        
            if ($result) {
                return $result['user_name'];

            } else {
                return 'ユーザー名が見つかりませんでした';
            }
        }



        public function getUserMail($userId) {
            $pdo = $this->dbConnect();
        
            $sql = "SELECT * FROM user WHERE user_id = ?";

            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $userId, PDO::PARAM_STR);
            $ps->execute();
        
            $result = $ps->fetch(PDO::FETCH_ASSOC);
        
            if ($result) {
                return $result['mail'];

            } else {
                return 'ユーザーメールが見つかりませんでした';
            }
        }
        public function getUserBio($userId) {
            $pdo = $this->dbConnect();
        
            $sql = "SELECT * FROM user WHERE user_id = ?";

            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $userId, PDO::PARAM_STR);
            $ps->execute();
        
            $result = $ps->fetch(PDO::FETCH_ASSOC);
        
            if ($result) {
                return $result['bio'];

            } else {
                return '自己紹介が見つかりませんでした';
            }
        }




        public function getUserProfile_image($userId) {
            $pdo = $this->dbConnect();
        
            $sql = "SELECT * FROM user WHERE user_id = ?";

            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $userId, PDO::PARAM_STR);
            $ps->execute();
        
            $result = $ps->fetch(PDO::FETCH_ASSOC);
        
            if ($result) {
                return $result['profile_image'];

            } else {
                return 'プロフィール画像が見つかりませんでした';
            }

            }


            public function getUserid($userId) {
                $pdo = $this->dbConnect();
            
                $sql = "SELECT * FROM user WHERE user_id = ?";
    
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1, $userId, PDO::PARAM_STR);
                $ps->execute();
            
                $result = $ps->fetch(PDO::FETCH_ASSOC);
            
                if ($result) {
                    return $result['user_id'];
    
                } else {
                    return 'ユーザーIDが見つかりませんでした';
                }
    
                }
                
            //投稿情報を全件取得
            public function getUserPostIds($userId){
                $pdo = $this->dbConnect();

                $sql = "SELECT * FROM post WHERE user_id = ? ORDER BY post_id DESC";

                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$userId,PDO::PARAM_STR);

                $ps->execute();
                $result = $ps->fetchAll(PDO::FETCH_ASSOC);

                if($result){

                    foreach($result as $row){
                    $userIds[] = $row['post_id'];
                    }

                return $userIds;

                }else{
                    echo '';
                }
            }

            //コメント情報を全件取得
            public function getUserCommentIds($userId){
                $pdo = $this->dbConnect();

                $sql = "SELECT * FROM post_comment WHERE user_id = ? GROUP BY comment_id DESC";

                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$userId,PDO::PARAM_STR);

                $ps->execute();
                $result = $ps->fetchAll(PDO::FETCH_ASSOC);

                if($result){

                    foreach($result as $row){
                    $userIds[] = $row['comment_id'];
                    }

                return $userIds;

                }else{
                    echo '';
                }
            }

            //フォーラム情報を全件取得
            public function getUserForumIds($userId){
                $pdo = $this->dbConnect();

                $sql = "SELECT * FROM forum WHERE user_id = ? ORDER BY forum_id DESC";

                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$userId,PDO::PARAM_STR);

                $ps->execute();
                $result = $ps->fetchAll(PDO::FETCH_ASSOC);

                if($result){

                    foreach($result as $row){
                    $userIds[] = $row['forum_id'];
                    }

                return $userIds;

                }else{
                    echo '';
                }
            }

            public function getUserForumCommentIds($userId){
                $pdo = $this->dbConnect();

                $sql = "SELECT * FROM forum_comment WHERE user_id = ? ORDER BY forum_comment_id DESC";

                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$userId,PDO::PARAM_STR);

                $ps->execute();
                $result = $ps->fetchAll(PDO::FETCH_ASSOC);

                if($result){

                    foreach($result as $row){
                    $userIds[] = $row['forum_comment_id'];
                    }

                return $userIds;

                }else{
                    echo '';
                }
            }
            
}
        
 
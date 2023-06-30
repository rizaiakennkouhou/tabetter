<?php
class DAO_forumdb{
        //データベースに接続する関数
        private function dbConnect(){
            //データベースに接続
            $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                            'webuser', 'abccsd2');
            return $pdo;
        }

        //フォーラムIDを指定して表示する関数
        public function getForumId($forumid){

            $pdo = $this -> dbConnect();

            //SQLの生成　入力を受け取る部分は”？”
            $sql = "SELECT * FROM forum WHERE forum_id = ?";

            //prepare:準備　戻り値を変数に保持
            $ps = $pdo -> prepare($sql);

            //”？”に値を設定する
            $ps->bindValue(1, $forumid ,PDO::PARAM_INT); 
            
            //SQLの実行
            $ps->execute();

            //実行結果を配列に格納
            $result = $ps->fetchAll(PDO::FETCH_ASSOC);

            if(empty($result)){
                echo '指定したIDに該当するデータはありません。';
            }else{
                foreach($result as $row){
                    $s=$row['forum_id'];
                }  
            } 
                echo $s;
        }
        // フォーラム関数

        // 詳細を出す
        public function getForumDetail($forumId) {
            $pdo = $this->dbConnect();
        
            $sql = "SELECT * FROM forum WHERE forum_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $forumId, PDO::PARAM_STR);
            $ps->execute();
        
            $result = $ps->fetch(PDO::FETCH_ASSOC);
        
            if ($result) {
                return $result['forum_detail'];

            } else {
                return '投稿が見つかりませんでした';
            }
        }

        // タイトルを出す
        public function getForumTitle($forumId) {
            $pdo = $this->dbConnect();
        
            $sql = "SELECT * FROM forum WHERE forum_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $forumId, PDO::PARAM_INT);
            $ps->execute();
        
            $result = $ps->fetch(PDO::FETCH_ASSOC);
        
            if ($result) {
                return $result['title'];

            } else {
                return 'タイトル名が見つかりませんでした';
            }
        }


        // 時間を出す
        public function getForumDate($forumId) {
            $pdo = $this->dbConnect();
        
            $sql = "SELECT * FROM forum WHERE forum_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $forumId, PDO::PARAM_STR);
            $ps->execute();
        
            $result = $ps->fetch(PDO::FETCH_ASSOC);
        
            if ($result) {
                return $result['forum_date'];

            } else {
                return '時間が見つかりませんでした';
            }
        }


        // ユーザーIDを出す
        public function getUserId($forumId) {
            $pdo = $this->dbConnect();
        
            $sql = "SELECT * FROM forum WHERE forum_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $forumId, PDO::PARAM_INT);
            $ps->execute();
        
            $result = $ps->fetch(PDO::FETCH_ASSOC);
        
            if ($result) {
                return $result['user_id'];

            } else {
                return 'ユーザー名が見つかりませんでした';
            }
        }

        public function getforumcommentuserId($forumId) {
            $pdo = $this->dbConnect();
        
            $sql = "SELECT * FROM forum_comment WHERE forum_comment_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $forumId, PDO::PARAM_INT);
            $ps->execute();
        
            $result = $ps->fetch(PDO::FETCH_ASSOC);
        
            if ($result) {
                return $result['user_id'];

            } else {
                return 'ユーザー名が見つかりませんでした';
            }
        }

        // ユーザー名
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

        // コメント件数カウント
        public function getforumCommentCount($forumId){
            $pdo = $this->dbConnect();
    
            $sql = "SELECT * FROM forum_comment WHERE forum_id = ?";
    
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $forumId, PDO::PARAM_INT);
    
            $ps->execute();
            $count = $ps->rowCount();
    
            return $count;
        }


        // フォーラム全件検索
        public function getForumIds(){
            $pdo = $this->dbConnect();
    
            $sql = "SELECT * FROM forum ORDER BY forum_id DESC";
    
            $ps = $pdo->prepare($sql);
    
            $ps->execute();
            $result = $ps->fetchAll(PDO::FETCH_ASSOC);
    
            foreach($result as $row){
                $ForumIds[] = $row['forum_id'];
            }
    
            return $ForumIds;
        }

        //forum_idからuser_idを検索
    public function getUserIdsByForumId($forumId){
        $pdo = $this->dbConnect();

        $sql = "SELECT * FROM forum WHERE forum_id = ?";

        $ps = $pdo->prepare($sql);

        $ps->bindValue(1, $forumId, PDO::PARAM_INT);

        $ps->execute();
        $result = $ps->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $row){
            $userIds=$row['user_id'];
        }

        return $userIds;
    }


    }
?>
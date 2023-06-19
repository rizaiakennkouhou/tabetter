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
                }
            }
            
}
        
 
<?php
class DAO_postcomment{
        //データベースに接続する関数
        private function dbConnect(){
            //データベースに接続
            $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                            'webuser', 'abccsd2');
            return $pdo;
        }
        //投稿コメントを全表示
        public function getcomment($id){
            $pdo = $this -> dbConnect();

            //SQLの生成　入力を受け取る部分は”？”
            $sql = "SELECT * FROM post_comment WHERE post_id = ?";

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

        //投稿にコメントする処理
        public function insertcomment($detail,$date,$userid,$postid){
            $pdo = $this -> dbConnect();

            //SQLの生成　入力を受け取る部分は”？”
            $sql = "INSERT INTO post_comment(comment_detail,comment_date,user_id,post_id)
                VALUES(?,?,?,?)";

            //prepare:準備　戻り値を変数に保持
            $ps = $pdo -> prepare($sql);

            //”？”に値を設定する
            $ps->bindValue(1, $detail ,PDO::PARAM_STR); 
            $ps->bindValue(2, $date ,PDO::PARAM_STR); 
            $ps->bindValue(3, $userid ,PDO::PARAM_STR); 
            $ps->bindValue(4, $postid ,PDO::PARAM_INT); 
            
            //SQLの実行
            $ps->execute();
        }
    }
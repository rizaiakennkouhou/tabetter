<?php
class DAO_likes{
//データベースに接続する関数
private function dbConnect(){
        //データベースに接続
        $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                        'webuser', 'abccsd2');
        return $pdo;
}

        //フォーラムIDを指定して表示する関数
        public function addLikes($forumid){
                $pdo = $this -> dbConnect();
                $id = intval($postid);  //$idをstring型からint型に変換
                $sql = "INSERT INTO likes(post_id,user_id)
                                VALUES(?,?)";
                $ps = $pdo->prepare($sql);
                $ps -> bindValue(1$id,PDO::PARAM_INT);
                $ps -> bindValue(2,$userid,PDO::PARAM_STR);
                //SQLの実行
                $ps->execute();
        }

        public function deleteLikes($postid,$userid){
                $pdo = $this -> dbConnect();
                $id = intval($postid);  //$idをstring型からint型に変換
                $sql = "DELETE FROM likes WHERE post_id = ? AND user_id = ?";
                $ps = $pdo->prepare($sql);
                $ps -> bindValue(1$id,PDO::PARAM_INT);
                $ps -> bindValue(2,$userid,PDO::PARAM_STR);
                //SQLの実行
                $ps->execute();
        }

}

?>

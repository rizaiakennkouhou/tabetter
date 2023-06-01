<?php
class DAO_profile{
    //データベースに接続する関数
    private function dbConnect(){
        //データベースに接続
        $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                        'webuser', 'abccsd2');
        return $pdo;
    }
    //名前を変更する関数
    public function saveName($userid,$name){
        //$id = intval($userid);  //$idをstring型からint型に変換  
        $pdo = $this -> dbConnect();

        //SQLの生成　入力を受け取る部分は”？”
        $sql = "UPDATE user
        SET user_name = ?,
        WHERE user_id = ?";

        //prepare:準備　戻り値を変数に保持
        $ps = $pdo -> prepare($sql);

        //”？”に値を設定する
        $ps->bindValue(1, $name ,PDO::PARAM_STR); 
        $ps->bindValue(2, $userid ,PDO::PARAM_INT); 
        
        //SQLの実行
        $ps->execute();
    }
    //プロフィールを変更する関数
    public function saveBio($userid,$bio){
        //$id = intval($userid);  //$idをstring型からint型に変換  
        $pdo = $this -> dbConnect();

        //SQLの生成　入力を受け取る部分は”？”
        $sql = "UPDATE user
        SET bio = ?,
        WHERE user_id = ?";

        //prepare:準備　戻り値を変数に保持
        $ps = $pdo -> prepare($sql);

        //”？”に値を設定する
        $ps->bindValue(1, $bio ,PDO::PARAM_STR); 
        $ps->bindValue(2, $userid ,PDO::PARAM_INT); 
        
        //SQLの実行
        $ps->execute();
    }


}
?>
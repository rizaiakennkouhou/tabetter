<?php
    class DAO_Logindb{
        private function dbConnect(){
            //データベースに接続
            $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                            'webuser', 'abccsd2');
            return $pdo;
        }
        //ユーザー検索mailで
        public function getUserByMail($mail,$pass){
            $pdo = $this->dbConnect();
            $sql ="SELECT * FROM user WHERE mail = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1, $mail, PDO::PARAM_STR);
            $ps->execute();
            $serchArray = $ps->fetchAll();
            if(count($serchArray)<1){
                //検索結果０
                throw new BadMethodCallException("メールアドレスが存在しません");
            }
            foreach($serchArray as $row){
                if(password_verify($pass,$row['password'])){
                    //パスワード一致
                    return $serchArray;
                }else{
                    throw new LogicException("パスワードが一致しません");
                }
            }
        }
    }
?>
<?php
class DAO_rank{
    //データベースに接続する関数
    private function dbConnect(){
        //データベースに接続
        $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                        'webuser', 'abccsd2');
        return $pdo;
    }

    public function userPostCount($userid){
        $pdo = $this -> dbConnect();
        $sql = "SELECT * FROM post WHERE user_id = ?";
        $ps = $pdo->prepare($sql);
        $ps -> bindValue(1,$userid,PDO::PARAM_STR);
        //SQLの実行
        $ps->execute();
        $postIds = [];
        while ($row = $ps->fetch(PDO::FETCH_ASSOC)) {
            $postIds[] = $row['post_id'];
        }
        return $postIds;
    }

    public function userlikeCount($userid){
        $pdo = $this -> dbConnect();
        $userposts = $this -> userPostCount($userid);
        $count = 0;
        foreach($userposts as $postids){
        $sql = "SELECT * FROM likes WHERE post_id = ?";
        $ps = $pdo->prepare($sql);
        $ps -> bindValue(1,$postids,PDO::PARAM_STR);
        //SQLの実行
        $ps->execute();
        $sum = $ps -> rowCount();
        $count += $sum;
        }
        return $count;
    }

    public  function rankCss($text,$css){
        $styleText = "<span style=\"$css\">$text</span>";
        return $styleText;
    }

    public function userRank($userid){
        $count = $this -> userlikeCount($userid);
        $platinum = 300;
        $gold = 100;
        $silver = 50;
        $bronze = 10;
        if ($count > $platinum) {
            $rankText = $this->rankCss("ダイヤモンド", "color: #7EA2FF;");
            echo $rankText;
        } elseif ($count > $gold) {
            $rankText = $this->rankCss("プラチナ", "color: #B5F8FE;");
            echo $rankText;
        } elseif ($count > $silver) {
            $rankText = $this->rankCss("ゴールド", "color: #ffd700;");
            echo $rankText;
        } elseif ($count > $bronze) {
            $rankText = $this->rankCss("シルバー", "color: #c0c0c0;");
            echo $rankText;
        } else {
            $rankText = $this->rankCss("ブロンズ", "color: #cd7f32;");
            echo $rankText;
        }
    }
}


?>
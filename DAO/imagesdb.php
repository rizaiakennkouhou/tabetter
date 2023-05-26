<?php
class DAO_images{
        //データベースに接続する関数
        private function dbConnect(){
            //データベースに接続
            $pdo = new PDO('mysql:host=localhost; dbname=tabetterdb; charset=utf8',
                            'webuser', 'abccsd2');
            return $pdo;
        }

        //imagesテーブルに画像を保存する関数

        //imagesテーブルの画像を表示する関数
    }
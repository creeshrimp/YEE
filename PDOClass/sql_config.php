<?php

function getDB($hostname,$db_name,$char_set,$username,$passwd){
   $HOST = $hostname;
   $DATABASE = $db_name;
   $CHARSET = $char_set; //字元集 資料庫編碼有設定過的話好像就沒差
   $USER = $username;
   $PASSWORD = $passwd;

   $DSN = "mysql:host=$HOST;dbname=$DATABASE;charset=$CHARSET";
   try {
      // 連線: new 一個PDO物件
      $conn = new PDO($DSN, $USER, $PASSWORD);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conn->exec("SET NAMES 'utf8'");
   } catch (PDOException $e) {
      echo  $e->getMessage();
   }
   return $conn;
}

//                      ***    懶得打完整的時候就直接打資料庫名字
function getDB_by_name($db_name){
   switch ($db_name) {
      // 公司的某個資料庫
      case '':
         $HOST = "127.0.0.1";
         $DATABASE = "";
         $CHARSET = "utf8"; //字元集 資料庫編碼有設定過的話好像就沒差
         $USER = "root";
         $PASSWORD = "";
         return getDB($HOST, $DATABASE, $CHARSET, $USER, $PASSWORD);
         break;

      // test 資料庫
      case 'test':
         $HOST = "127.0.0.1";
         $DATABASE = "test";
         $CHARSET = "utf8"; //字元集 資料庫編碼有設定過的話好像就沒差
         $USER = "root";
         $PASSWORD = "123456";
         return getDB($HOST, $DATABASE, $CHARSET, $USER, $PASSWORD);
         break;

      default:
         die("no db selected");
         break;
   }
}
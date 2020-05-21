<?php

require_once "PDOClass/PDO_query.php";
class UserController extends Controller{

    // 首頁
    function actionIndex(){
        echo "PDO 測試首頁";
        $query_selectAll = "SELECT * FROM user";
        $result = PDO_query($query_selectAll);

        $this->render("userTable",[
            "sql_result" => $result,
        ]);
    }

    // API Insert User
    function actionInsert_user(){
        // Insert 輸入值
        $query = "INSERT INTO user (`name`,`passwd`) VALUES(?,?)";
        $bind = array($_GET['username'],$_GET['userpasswd']);
        PDO_query($query,$bind,"ss");
        
        // 重新導向 回user首頁
        //  $url = [ /controller/action, $get值1, $get值2 ]
        $url = [
            '/user',
            'username'=>$_GET['username'],
            'userpasswd'=>$_GET['userpasswd']
        ];
        // $url = "/user";
        $this->redirect($url);
        // 本來應是下面這樣，但這樣傳GET值有點醜 ，包裝成 redirect() function 了
        // 重新導向 省略localhost
        // header("Location: /MVCTest/MVC-verysimple-3-SQL/user?username=".$_GET['username']."&userpasswd=".$_GET['userpasswd']);
        // die();
    }


}

<?php 
class CoopController extends Controller{
    function actionIndex(){
        $this->render("Contact");
    }
    
    //------------------------ ::/coop/SendContact  -----------------------------
    // 寄信並存進資料庫
    function actionSendContact(){
        // 如果有POST表單
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            require_once "PDOClass/PDO_query.php";
            $name = $_POST['name'];
            $content = $_POST['content'];
            $email = $_POST['email'];

            $query = "INSERT INTO corporation_form (name, content, email) VALUES (?,?,?)";
            $bind = array($name,$content,$email);
            PDO_query($query,$bind,"sss");
            // 發送email
            $mg = new MailgunApi();
            //信件內容
            $content = "信箱：".$email."\n".
                       "名稱：".$name."\n".
                       "內容：".$content."\n";
            //測試機先關閉此功能
            // $mg->sendEmail($email, "form dd-in.net contact", $content, $name);
        }
        $this->redirect("/main/contact");
    }

}






?>
<?php

class InheritanceController extends Controller{
    function actionIndex(){
        $this->render(
            "InheritanceCtrl_view",
            ["DATA1",["DATA-2-1","DATA2-2"]]
    );
    }
    function actionTest2(){
        $this->render("Test2");
    }
    // **$_PAR 是在index.php 實體化之後從 Controller的建構子傳進來的，url尾端的參數(陣列)
    function actionAbout($_PAR){
        $this->render("about_view",[$_PAR]);
    }

}

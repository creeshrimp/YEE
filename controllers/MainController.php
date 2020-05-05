<?php

//  < Main Controller 處理所有的Routing >

class MainController extends Controller{
    function actionIndex(){
        $this->render("About_us");
    }
    function actionExpos(){
        $this->redirect("/Expos");
    }
    function actionProduct(){
        $this->redirect("/Product");
    }
    function actionContact(){
        // header("location: coop");
        $this->redirect("/Coop");
        // $this->render("Contact");
    }
    function actionDealer(){
        $this->render("Dealer");
    }
}
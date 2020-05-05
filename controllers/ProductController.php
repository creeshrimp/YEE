<?php


class ProductController extends Controller{
    function actionIndex(){
        $this->render("product_list_noLogin");
    }
}
<?php

class IndexController extends Controller{
    function __construct(){
        // 導向 main controller
        $this->redirect("main");
    }
}

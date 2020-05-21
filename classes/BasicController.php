<?php
class Controller{
    public $current_view;
    public $current_layout = "default_layout";
    public $_DATA = [];

    function __construct($action,$params){
        
        // 如果$action == 'action' 且  actionIndex方法存在
        // 代表沒有給action值，那就顯示預設首頁
        if($action == 'action' && method_exists($this,'actionIndex')){
            $this->actionIndex();
        }
        // 如果不等於 'action'，判斷你給的這個 actionXxx 是否存在，存在就執行action
        elseif(method_exists($this,$action)){
            // 在要執行的action裡放入$param(從url尾端傳進來的[陣列])
            $this->$action($params);
        }
        // 都不存在代表你亂打的 或 你忘記宣告actionIndex()，請你ㄘ404
        else{
            echo "action-$action not found";
            // require_once "views/404/404.php";
        }
    }


    
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!      [渲染view] : render("viewname","datas[]")    !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    
    // require  [view] + [參數] + [layout] 的結果到 index.php 
    // 用法 render("viewname","datas[]")
    function render(){

        // 依照參數個數來動態宣告變數
        $Args = func_get_args();
        switch (func_num_args()) {
            case 2:
                $this->_DATA = $Args[1];
            case 1:
                $viewname = $Args[0];
                break;
            default:
                die("view was not set or too many input argument");
                break;
        }
        // 檢查view.php檔是否存在
        $view_Path = "views/$viewname.php";
        if(file_exists($view_Path)){
            $current_layout = $this->current_layout;
            // 把參數綁進view
            $this->current_view = $this->bind_params_in_view($view_Path);
            // 把view綁進layout
            $this->bind_view_in_layout($current_layout);
        }
        else{
            die("view [ $viewname.php ] not exist");
        }
    }

    // 設定當前layout
    function setLayout($using_layout){
        $this->current_layout = $using_layout;
    }


// ---------------------------------------------------   bind   ---------------------------------------------------------------//
    // 把 view require 進來、參數讀進去、並返回為[字串]格式
    // ob_xxx()系列的function是PHP內建的 output controll ，可以當作是花式echo
    private function bind_params_in_view($view_Path){
        ob_start();
        // 把參數陣列接進 $_DATA 變數 ， 可在view裡面調用 $_DATA["id"] 之類的
        $_DATA = $this->_DATA;
        require_once $view_Path;
        return ob_get_clean();
    }

    // 把當前的view[字串]用變數丟進layout裡面顯示
    // 可在layout裡用$output_view調用
    private function bind_view_in_layout($layoutname){
        $output_view = $this->current_view;
        require_once 'layouts/'.$layoutname.'.php';
    }
// --------------------   End bind   ---------------------



//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!     [重新導向] : redirect([$route, $get值1, $get值2,...])    !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
// 
    function redirect($url){
        // 如果是陣列代表後面還有GET值
        if(is_array($url)){
            $route = $url[0];
            $getArr = array_slice($url,1);
            $getString = http_build_query($getArr);
            $url=  $route.'?'.$getString;
            
            header("location: $url");
            die();
        }
        // 如果不是陣列那就直接跳轉去對應的route就好啦
        else{
            header("location: $url");
            die();
        }
    }
}
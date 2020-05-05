<?php
//                                      *** 載入所有會用到的class ***

// glob(路徑+檔名)以陣列方式載入符合條件的所有檔案
foreach(glob("classes/*.php") as $file){
    require_once $file;
}
// ALL的全域函式，可以獲取處理過的url(陣列形式)
$url = YEE::GetPath();

//                                      *** 載入vendor底下所有資料 (暫時先不加入vender ***
// require_once "vendor/autoload.php";


//                              *** 先檢查request網址是不是首頁，是就直接顯示首頁 ***
if ($url == '/'){
    echo "url : $url<br>";
    // 載入對應的controller
    require_once __DIR__."/controllers/IndexController.php";
    $Controller = new IndexController();
}

//                                       *** 不是首頁才載其他的Controller ***
else{
//                                         *** 把 $url 陣列 的值抓出來 ***
    // 陣列第1個值為 controller
    $requestedController = ucfirst($url[0]);
    // requestedAction : 陣列第2個值為 action
    $requestedAction = isset($url[1])? $url[1] :'';
    
    // $requestedParams : 若有第3個(或以上個)值則為參數，array_slice($url, 2) 回傳一個從$url[2]~$url[end] 的陣列
    $requestedParams = array_slice($url, 2);
    // $ctrlPath : controller的路徑+檔名
    $ctrlPath = __DIR__."/controllers/$requestedController"."Controller.php";
    //                                  *** 如果controller path存在就載進來render ***
    // 
    if(file_exists($ctrlPath)){
        // require Controller 進來，並且實體化。然後Controller裡的view就會自己執行action 對應到的 function
        require_once $ctrlPath;
        // 大小寫名稱調整成跟宣告的一樣     XxxController、actionEat
        $controllerName = $requestedController.'Controller';
        $actionName = 'action'.ucfirst($requestedAction);
    
        //            new   Controller      action          params
        $Controller = new $controllerName($actionName,$requestedParams);
    }
    //                          *** 如果controller 不存在就 require 404 頁面進來  ***
    else{
        // header('HTTP/1.1 404 Not Found');
        // die('404 - Controller - '.$ctrlPath.' - not found');
        require_once "views/404/404.php";
    }
}




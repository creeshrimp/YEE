<?php
   //-----------------------------------------------------------//
  //          自訂通用的PDO函式 :PDO_query()                    //
 //-----------------------------------------------------------//
/*                                 用法                                         */
/*      PDO_query(  $query,  $bindvalues  ,$typecode   )    */
/*      PDO_query(  SQL語法,  BIND值(陣列) ,BIND用型別  )  */

/**     回傳值為一個sql結果集R， 如果語法為查詢可以在進一步rs=R->fetch(PDO::FETCH_ASSOC)*/


function PDO_query(){
    // 設定報錯，因為公司的SERVER好像不會報錯
    ini_set('display_errors','1');
    error_reporting(E_ALL);
    
    // 依照參數數量來調整要不要宣告變數
    switch (func_num_args()) {
        case 3:
            $bindvalues = func_get_arg(1);
            $typecode = func_get_arg(2);
        case 1:
            $query = func_get_arg(0);
            break;
        default:
            die('PDO_query(  SQL語法,  欲BIND的輸入值陣列 , BIND用型別  )');
            break;
    }

    // ------------                     引入連線檔案                ----------------------
    //  !! 注意!! 引入連線檔一定要用 require不可以用require_once，不然PDO連線物件只會建立一次 !!
    // $link = require_once("sql_config_company_local.php");
    $link = require "sql_config_local.php";
    // ----------------------------------------------------------------------------------

    try {
        $prepare = $link->prepare($query);
        if (func_num_args() == 3) {
            $arr_typecode = str_split($typecode);
            foreach ($arr_typecode as $key => $value) {
                $newkey = $key + 1;
                switch ($value) {
                    case 's':   // s: string
                        $prepare->bindPARAM($newkey, $bindvalues[$key], PDO::PARAM_STR);
                        break;
                    case 'i':   // i: interger
                        $prepare->bindPARAM($newkey, $bindvalues[$key], PDO::PARAM_INT);
                        break;
                    case 'b':   // b: boolean
                        $prepare->bindPARAM($newkey, $bindvalues[$key], PDO::PARAM_BOOL);
                        break;
                    default:    // 都不符合就ERROR
                        echo "wrong typecode";
                        break;
                }
            }
        }
        $result = $prepare->execute();
    } 
    catch(PDOException $e) {
        echo  $e->getMessage();
    }
    
    if(!$result){
        echo "PDO_query failed";
        // 如果出現上面這行，通常是SQL那邊出了問題
    }
    return $prepare;
}






// PDO_query(  SQL語法,  BIND值(陣列) ,BIND用型別  )

/* 使用範例 

這是INSERT 的使用範例
用問號來bind 類似 mysqli 的用法 
$query = "INSERT INTO article (author,title,content) VALUES(?,?,?)";

$author = "哲學家";
$title = "我好喜歡鯊魚2";
$content = "鯊魚萬歲2";
$bindvalues = [ $author, $title, $content ];

PDO_query("$query", $bindvalues, sss);
*/

?>
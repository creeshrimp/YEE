<?php
class ExposController extends Controller{
    function actionIndex(){

        // 取出所有年份
        require_once __DIR__."/../PDOClass/PDO_query.php";
        $query_years = "SELECT 
                        YEAR(`start_dt`) AS `startYear`
                    FROM expolist
                    GROUP BY `startYear`
                    ";
        $all_startYear = PDO_query($query_years)->fetchAll(\PDO::FETCH_OBJ);

        // 取出所有結果
        $query_all = "SELECT * FROM expolist ORDER BY `start_dt` ASC";
        $all_result = PDO_query($query_all)->fetchAll(\PDO::FETCH_OBJ);
        
        // 把SQL結果存進陣列 傳給VIEW
        $this->render("Expos",[
            "year_result" => $all_startYear,
            "all_result" => $all_result
        ]);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2015-10-08
 * Time: 오후 7:53
 */
    define("DB_CON_addr","localhost");
    define("DB_CON_id","root");
    define("DB_CON_password","autoset");
    define("DB_NAME","ycj_test");

    function MYSQL_CN(){
        $connect_id=@mysql_connect(DB_CON_addr,DB_CON_id,DB_CON_password);
        if(!mysql_select_db(DB_NAME,$connect_id)){
            echo "db선택 실패";
            echo (mysql_error($connect_id));
        }

        return  $connect_id;
    }
?>
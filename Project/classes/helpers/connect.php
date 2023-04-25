<?php
namespace Site\Connect;

use mysqli as mysql;
use mysqli_sql_exception;

trait Connection
{
    //Connecting to database and returning it, so it could be use to send data
    private function _ConnectDatabase()
    {
        $servername = "localhost";
        $username = "admin";
        $password = "admin";
        $dbname = "shop_list";
        $conn = new mysql($servername, $username, $password, $dbname);
        return $conn;
    }

    //Sending SQL question to database
    public function _Action($sql){
        $connect = $this->_ConnectDatabase(); 
        $result = $connect->query($sql);
        $connect->close();
        return $result;
    }
}
?>
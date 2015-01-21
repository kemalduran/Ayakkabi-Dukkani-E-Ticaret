<?php
/**
 * Description of connection
 *
 * @author kemalduran
 */
require_once dirname(__FILE__). '../../../app_config.php';
class database_connection {
    function connect(){
        //Create Database connection
        $db_connection = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        mysql_select_db("ayakkabi_dukkani",$db_connection);

        if (!$db_connection){
            die("Veritabanına bağlanılamadı...\n");
            echo mysql_errno($db_connection) . ": " . mysql_error($db_connection). "\n";
        }
        else{
            return $db_connection;
        }
        echo 'return null ';
        return NULL;
    }
    function close($db_connection) {
        //Close Database connection
        mysql_close($db_connection);
    }
    
}

<?php
/**
 * Description of Marka_DataModel
 *
 * @author kemalduran
 */
require_once '/database_connection.php';
require dirname(__FILE__). '../../Classes/Marka.php';
class Marka_DataModel {
    public $db;
    function __construct() {
        global  $db;
        $db  = new database_connection();
       $db->connect();
    }
    function __destruct() {
        //mysql_close();
    }
    function getAll() {
        $all = array();
            $data = mysql_query("SELECT * FROM marka");
            while ($row = mysql_fetch_array($data)){
                $marka = new Marka();
                $marka->id = $row['id'];
                $marka->marka_adi = $row['marka_adi'];
                array_push($all, $marka);
            }
            return $all;
    }
    function getByID($id){
        $data = mysql_query("SELECT * FROM marka where id=".$id);
        $row = mysql_fetch_assoc($data);
        $marka = new Marka();
        $marka->id = $row['id'];
        $marka->marka_adi = $row['marka_adi'];
        
        return $marka;
    }
    function insert($item) {
        mysql_query("INSERT INTO marka(marka_adi) values('$item->marka_adi')");
    }
    function update($item) {
        mysql_query("UPDATE marka SET marka_adi='$item->marka_adi' WHERE id=$item->id");
    }
    function delete($item) {
        mysql_query("DELETE FROM marka WHERE id=$item->id");
    }
    function deleteByID($id) {
        mysql_query("DELETE FROM marka WHERE id=$id");
    }
    
}

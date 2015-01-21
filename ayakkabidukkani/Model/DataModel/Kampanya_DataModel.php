<?php
/**
 * Description of Kampanya_DataModel
 *
 * @author kemalduran
 */
require_once '/database_connection.php';
require dirname(__FILE__). '../../Classes/Kampanya.php';
class Kampanya_DataModel {
    public $db;
    function __construct() {
        global  $db;
        $db  = new database_connection();
       $db->connect();
    }
    function __destruct() {
        mysql_close();
    }
    function getAll() {
        $all = array();
            $data = mysql_query("SELECT * FROM kampanya");
            while ($row = mysql_fetch_array($data)){
                $i = new Kampanya();
                $i->id = $row['id'];
                $i->resim = $row['resim'];
                $i->aciklama = $row['aciklama'];
                array_push($all, $i);
            }
            return $all;
    }
    function getByID($id){
        $data = mysql_query("SELECT * FROM kampanya where id=".$id);
        $row = mysql_fetch_assoc($data);
        $i = new Kampanya();
        $i->id = $row['id'];
        $i->resim = $row['resim'];
        $i->aciklama = $row['aciklama'];
        
        return $i;
    }
    function insert($item) {
        mysql_query("INSERT INTO kampanya(resim, aciklama) values('$item->resim', '$item->aciklama')");
    }
    function update($item) {
        mysql_query("UPDATE kampanya SET resim='$item->resim', aciklama='$item->aciklama' WHERE id=$item->id");
    }
    function delete($item) {
        mysql_query("DELETE FROM kampanya WHERE id=$item->id");
    }
    function deleteByID($id) {
        mysql_query("DELETE FROM kampanya WHERE id=$id");
    }
}

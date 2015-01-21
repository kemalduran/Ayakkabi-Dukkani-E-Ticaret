<?php
/**
 * Description of Kateori_DataModel
 *
 * @author kemalduran
 */
require_once '/database_connection.php';
require dirname(__FILE__). '../../Classes/Kategori.php';
class Kategori_DataModel {
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
            $data = mysql_query("SELECT * FROM kategori");
            while ($row = mysql_fetch_array($data)){
                $i = new Kategori();
                $i->id = $row['id'];
                $i->isim = $row['isim'];
                array_push($all, $i);
            }
            return $all;
    }
    function getByID($id){
        $data = mysql_query("SELECT * FROM kategori where id=".$id);
        $row = mysql_fetch_assoc($data);
        $i = new Kategori();
        $i->id = $row['id'];
        $i->isim = $row['isim'];
        
        return $i;
    }
    function insert($item) {
        mysql_query("INSERT INTO kategori(isim) values('$item->isim')");
    }
    function update($item) {
        mysql_query("UPDATE kategori SET isim='$item->isim' WHERE id=$item->id");
    }
    function delete($item) {
        mysql_query("DELETE FROM kategori WHERE id=$item->id");
    }
    function deleteByID($id) {
        mysql_query("DELETE FROM kategori WHERE id=$id");
    }
    
}

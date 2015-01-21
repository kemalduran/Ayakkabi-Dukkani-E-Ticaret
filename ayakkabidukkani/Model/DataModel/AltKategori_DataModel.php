<?php
/**
 * Description of AltKategori_DataModel
 *
 * @author kemalduran
 */
require_once '/database_connection.php';
require dirname(__FILE__). '../../Classes/AltKategori.php';
class AltKategori_DataModel {
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
            $data = mysql_query("SELECT * FROM alt_kategori");
            while ($row = mysql_fetch_array($data)){
                $i = new AltKategori();
                $i->id = $row['id'];
                $i->isim = $row['isim'];
                $i->ust_id = $row['ust_id'];
                array_push($all, $i);
            }
            return $all;
    }
    function getAllByParent($parent_id) {
        $all = array();
            $data = mysql_query("SELECT * FROM alt_kategori WHERE ust_id=".$parent_id);
            while ($row = mysql_fetch_array($data)){
                $i = new AltKategori();
                $i->id = $row['id'];
                $i->isim = $row['isim'];
                $i->ust_id = $row['ust_id'];
                array_push($all, $i);
            }
            return $all;
    }
    function getByID($id){
        $data = mysql_query("SELECT * FROM alt_kategori where id=".$id);
        $row = mysql_fetch_assoc($data);
        $i = new AltKategori();
        $i->id = $row['id'];
        $i->isim = $row['isim'];
        $i->ust_id = $row['ust_id'];
        
        return $i;
    }
    function insert($item) {
        mysql_query("INSERT INTO alt_kategori(isim, ust_id) values('$item->isim', $item->ust_id)");
    }
    function update($item) {
        mysql_query("UPDATE alt_kategori SET isim='$item->isim' WHERE id=$item->id");
    }
    function delete($item) {
        mysql_query("DELETE FROM alt_kategori WHERE id=$item->id");
    }
    function deleteByID($id) {
        mysql_query("DELETE FROM alt_kategori WHERE id=$id");
    }
    
}

<?php
/**
 * Description of Sepet_DataModel
 *
 * @author kemalduran
 */
require_once '/database_connection.php';
require dirname(__FILE__) . '../../Classes/Sepet.php';
require dirname(__FILE__) . '../../DataModel/Uye_DataModel.php';

class Sepet_DataModel {
    public $db;

    function __construct() {
        global $db;
        $db = new database_connection();
        $db->connect();
    }

    function __destruct() {
        //mysql_close();
    }
    function getAll() {
        $all = array();
        $data = mysql_query("SELECT * FROM sepet");
        while ($row = mysql_fetch_array($data)) {
            $i = new Sepet();
            $i->id = $row['id'];
            $i->musteri_id = $row['musteri_id'];
            $dm_uye = new Uye_DataModel();
            $i->musteri = $dm_uye->getByID($i->musteri_id);
            array_push($all, $i);
        }
        return $all;
    }

    function getByID($id) {
        $data = mysql_query("SELECT * FROM sepet where id=" . $id);
        $row = mysql_fetch_assoc($data);
        $i = new Sepet();
        $i->id = $row['id'];
        $i->musteri_id = $row['musteri_id'];
        $dm_uye = new Uye_DataModel();
        $i->musteri = $dm_uye->getByID($i->musteri_id);
            
        return $i;
    }
    function getByMusteriID($id) {
        $data = mysql_query("SELECT * FROM sepet where musteri_id=".$id);
        $row = mysql_fetch_assoc($data);
        $i = new Sepet();
        $i->id = $row['id'];
        $i->musteri_id = $row['musteri_id'];
        $dm_uye = new Uye_DataModel();
        $i->musteri = $dm_uye->getByID($i->musteri_id);
            
        return $i;
    }

    function insert($item) {
        mysql_query("INSERT INTO sepet(musteri_id) values($item->musteri_id)");
    }

    function update($item) {
        mysql_query("UPDATE sepet SET musteri_id=$item->musteri_id WHERE id=$item->id");
    }

    function delete($item) {
        mysql_query("DELETE FROM sepet WHERE id=$item->id");
    }

    function deleteByID($id) {
        mysql_query("DELETE FROM sepet WHERE id=$id");
    }
}

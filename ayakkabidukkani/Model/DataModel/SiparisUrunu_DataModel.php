<?php
/**
 * Description of SiparisUrunu_DataModel
 *
 * @author kemalduran
 */
require_once '/database_connection.php';
require dirname(__FILE__) . '../../Classes/SiparisUrunu.php';
class SiparisUrunu_DataModel {
    public $db;

    function __construct() {
        global $db;
        $db = new database_connection();
        $db->connect();
    }

    function __destruct() {
       // mysql_close();
    }
    function getAll($siparis_id) {
        $all = array();
        $data = mysql_query("SELECT * FROM siparis_urunu WHERE siparis_id=".$siparis_id);
        while ($row = mysql_fetch_array($data)) {
            $i = new SiparisUrunu();
            $i->id = $row['id'];
            $i->urun_id = $row['urun_id'];
            $dm_urun = new Urun_DataModel();
            $i->urun = $dm_urun->getByID($i->urun_id);
            $i->adet = $row['adet'];
            $i->siparis_id = $row['siparis_id'];
            $i->birim_fiyat = $row['birim_fiyat'];
            array_push($all, $i);
        }
        return $all;
    }
    function getAllByMusteri($siparis_id) {
        $all = array();
        $data = mysql_query("SELECT * FROM siparis_urunu WHERE siparis_id=".$siparis_id);
        while ($row = mysql_fetch_array($data)) {
            $i = new SiparisUrunu();
            $i->id = $row['id'];
            $i->urun_id = $row['urun_id'];
            $dm_urun = new Urun_DataModel();
            $i->urun = $dm_urun->getByID($i->urun_id);
            $i->adet = $row['adet'];
            $i->siparis_id = $row['siparis_id'];
            $i->birim_fiyat = $row['birim_fiyat'];
            array_push($all, $i);
        }
        return $all;
    }

    function getByID($id) {
        $data = mysql_query("SELECT * FROM siparis_urunu where id=" . $id);
        $row = mysql_fetch_assoc($data);
        $i = new SiparisUrunu();
        $i->id = $row['id'];
        $i->urun_id = $row['urun_id'];
            $dm_urun = new Urun_DataModel();
            $i->urun = $dm_urun->getByID($i->urun_id);
        $i->adet = $row['adet'];
        $i->siparis_id = $row['siparis_id'];
        $i->birim_fiyat = $row['birim_fiyat'];

        return $i;
    }

    function insert($item) {
        mysql_query("INSERT INTO siparis_urunu(urun_id, adet, siparis_id, birim_fiyat) values($item->urun_id, $item->adet, $item->siparis_id, $item->birim_fiyat)");
    }

    function update($item) {
        mysql_query("UPDATE siparis_urunu SET urun_id=$item->urun_id, adet=$item->adet, siparis_id=$item->siparis_id, birim_fiyat=$item->birim_fiyat  WHERE id=$item->id");
    }

    function delete($item) {
        mysql_query("DELETE FROM siparis_urunu WHERE id=$item->id");
    }

    function deleteByID($id) {
        mysql_query("DELETE FROM siparis_urunu WHERE id=$id");
    }
    
    
}

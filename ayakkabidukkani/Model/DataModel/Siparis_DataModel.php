<?php
/**
 * Description of Siparis_DataModel
 *
 * @author kemalduran
 */
require_once '/database_connection.php';
require dirname(__FILE__) . '../../Classes/Siparis.php';
class Siparis_DataModel {
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
        $data = mysql_query("SELECT * FROM siparis");
        $dm_uye = new Uye_DataModel();
        while ($row = mysql_fetch_array($data)) {
            $i = new Siparis();
            $i->id = $row['id'];
            $i->musteri_id = $row['musteri_id'];
            $mus = $dm_uye->getByID($i->musteri_id);
            $i->musteri = $mus->ad." ".$mus->soyad;
            $i->siparis_tarihi = $row['siparis_tarihi'];
            $i->toplam_fiyat = $row['toplam_fiyat'];
            $i->onaylandi = $row['onaylandi'];
            $i->adres = $mus->adres;
            array_push($all, $i);
        }
        return $all;
    }
    function getAllByMusteri($id) {
        $all = array();
        $data = mysql_query("SELECT * FROM siparis WHERE musteri_id=".$id);
        $dm_uye = new Uye_DataModel();
        while ($row = mysql_fetch_array($data)) {
            $i = new Siparis();
            $i->id = $row['id'];
            $i->musteri_id = $row['musteri_id'];
            $mus = $dm_uye->getByID($i->musteri_id);
            $i->musteri = $mus->ad." ".$mus->soyad;
            $i->siparis_tarihi = $row['siparis_tarihi'];
            $i->toplam_fiyat = $row['toplam_fiyat'];
            $i->onaylandi = $row['onaylandi'];
            $i->adres = $mus->adres;
            array_push($all, $i);
        }
        return $all;
    }

    function getByID($id) {
        $data = mysql_query("SELECT * FROM siparis where id=" . $id);
        $row = mysql_fetch_assoc($data);
        $dm_uye = new Uye_DataModel();
        $i = new Siparis();
        $i->id = $row['id'];
        $i->musteri_id = $row['musteri_id'];
        $mus = $dm_uye->getByID($i->musteri_id);
        $i->musteri = $mus->ad." ".$mus->soyad;
        $i->siparis_tarihi = $row['siparis_tarihi'];
        $i->toplam_fiyat = $row['toplam_fiyat'];
        $i->onaylandi = $row['onaylandi'];
        $i->adres = $mus->adres;
        return $i;
    }
    function getUnReadedNumber() {
        $data = mysql_query("SELECT COUNT(*) FROM siparis where onaylandi=0");
        $row = mysql_fetch_row($data);
        return $row[0];
    }

    function insert($item) {
        mysql_query("INSERT INTO siparis(musteri_id, siparis_tarihi, onaylandi, toplam_fiyat) values($item->musteri_id, '$item->siparis_tarihi', $item->onaylandi, $item->toplam_fiyat)");
        return mysql_insert_id();        
    }

    function update($item) {
        mysql_query("UPDATE siparis SET onaylandi=$item->onaylandi WHERE id=$item->id");
    }

    function delete($item) {
        mysql_query("DELETE FROM siparis WHERE id=$item->id");
    }

    function deleteByID($id) {
        mysql_query("DELETE FROM siparis WHERE id=$id");
    }
    
}

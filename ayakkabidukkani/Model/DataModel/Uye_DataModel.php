<?php

/**
 * Description of Uye_DataModel
 *
 * @author kemalduran
 */
require_once '/database_connection.php';
require dirname(__FILE__) . '../../Classes/Uye.php';

class Uye_DataModel {

    public $db;

    function __construct() {
        global $db;
        $db = new database_connection();
        $db->connect();
    }

    function __destruct() {
        mysql_close();
    }

    function getAll() {
        $all = array();
        $data = mysql_query("SELECT * FROM uye");
        while ($row = mysql_fetch_array($data)) {
            $i = new Uye();
            $i->id = $row['id'];
            $i->ad = $row['ad'];
            $i->soyad = $row['soyad'];
            $i->email = $row['email'];
            $i->sifre = $row['sifre'];
            $i->adres = $row['adres'];
            $i->kayitTarihi = $row['kayitTarihi'];
            array_push($all, $i);
        }
        return $all;
    }

    function getByID($id) {
        $data = mysql_query("SELECT * FROM uye where id=" . $id);
        $row = mysql_fetch_assoc($data);
        $i = new Uye();
        $i->id = $row['id'];
        $i->ad = $row['ad'];
        $i->soyad = $row['soyad'];
        $i->email = $row['email'];
        $i->sifre = $row['sifre'];
        $i->adres = $row['adres'];
        $i->kayitTarihi = $row['kayitTarihi'];

        return $i;
    }
    function getByLogin($email, $sifre) {
        $data = mysql_query("SELECT * FROM uye where email='$email' and sifre='$sifre'");
        if(mysql_num_rows($data) == 0)
            return NULL;
        $row = mysql_fetch_assoc($data);
        $i = new Uye();
        $i->id = $row['id'];
        $i->ad = $row['ad'];
        $i->soyad = $row['soyad'];
        $i->email = $row['email'];
        $i->sifre = $row['sifre'];
        $i->adres = $row['adres'];
        $i->kayitTarihi = $row['kayitTarihi'];

        return $i;
    }

    function insert($item) {
        mysql_query("INSERT INTO uye(ad, soyad, email, sifre, kayitTarihi, adres) "
                . "values('$item->ad', '$item->soyad', '$item->email', '$item->sifre', '$item->kayitTarihi', '$item->adres')");
        
        return mysql_insert_id();
    }

    function update($item) {
        mysql_query("UPDATE uye SET ad='$item->ad', soyad='$item->soyad', email='$item->email', "
                . "sifre='$item->sifre', kayitTarihi='$item->kayitTarihi', adres='$item->adres' WHERE id=$item->id");
    }
    function delete($item) {
        mysql_query("DELETE FROM uye WHERE id=$item->id");
    }

    function deleteByID($id) {
        mysql_query("DELETE FROM uye WHERE id=$id");
    }

}

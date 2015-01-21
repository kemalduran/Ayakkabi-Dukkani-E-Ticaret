<?php

/**
 * Description of Urun_DataModel
 *
 * @author kemalduran
 */
require_once '/database_connection.php';
require dirname(__FILE__) . '../../Classes/Urun.php';
require_once dirname(__FILE__) .'./Marka_DataModel.php';

class Urun_DataModel {

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
        $data = mysql_query("SELECT * FROM urun");
        $dm_marka = new Marka_DataModel();
        while ($row = mysql_fetch_array($data)) {
            $i = new Urun();
            $i->id = $row['id'];
            $i->isim = $row['isim'];
            $i->aciklama = $row['aciklama'];
            $i->resim = $row['resim'];
            $i->stokSayisi = $row['stokSayisi'];
            $i->fiyat = $row['fiyat'];
            $i->satisSayisi = $row['satisSayisi'];
            $i->altKat_id = $row['altKat_id'];
            $i->marka_id = $row['marka_id'];
            $i->marka_adi = $dm_marka->getByID($i->marka_id)->marka_adi;

            array_push($all, $i);
        }
        return $all;
    }

    function getByID($id) {
        $data = mysql_query("SELECT * FROM urun where id=" . $id);
        if(mysql_num_rows($data) == 0)
            return NULL;
        
        $row = mysql_fetch_assoc($data);
        $dm_marka = new Marka_DataModel();
        $i = new Urun();
        $i->id = $row['id'];
        $i->isim = $row['isim'];
        $i->aciklama = $row['aciklama'];
        $i->resim = $row['resim'];
        $i->stokSayisi = $row['stokSayisi'];
        $i->fiyat = $row['fiyat'];
        $i->satisSayisi = $row['satisSayisi'];
        $i->altKat_id = $row['altKat_id'];
        $i->marka_id = $row['marka_id'];
        $i->marka_adi = $dm_marka->getByID($i->marka_id)->marka_adi;
        return $i;
    }
    function getAllOrderBy($adet, $order_column, $asc_desc) {
        $all = array();
        $data = mysql_query("SELECT * FROM urun ORDER BY $order_column LIMIT $adet ");
        while ($row = mysql_fetch_array($data)) {
            $i = new Urun();
            $i->id = $row['id'];
            $i->isim = $row['isim'];
            $i->aciklama = $row['aciklama'];
            $i->resim = $row['resim'];
            $i->stokSayisi = $row['stokSayisi'];
            $i->fiyat = $row['fiyat'];
            $i->satisSayisi = $row['satisSayisi'];
            $i->altKat_id = $row['altKat_id'];
            $i->marka_id = $row['marka_id'];

            array_push($all, $i);
        }
        return $all;
    }

    function insert($item) {
        try{
             mysql_query("INSERT INTO urun(isim, aciklama, resim, stokSayisi, fiyat, satisSayisi, altKat_id, marka_id) "
                . "values('$item->isim', '$item->aciklama', '$item->resim', $item->stokSayisi, $item->fiyat, $item->satisSayisi, $item->altKat_id, $item->marka_id)");
   
        } catch (Exception $ex) {
             echo 'Hata: ' .$ex->getMessage();
        }
        
    }

    function update($item) {
        mysql_query("UPDATE urun SET isim='$item->isim', aciklama='$item->aciklama', resim='$item->resim', "
                . "stokSayisi=$item->stokSayisi, fiyat=$item->fiyat, satisSayisi=$item->satisSayisi, "
                . "altKat_id=$item->altKat_id, marka_id=$item->marka_id  WHERE id=$item->id");
    }

    function delete($item) {
        mysql_query("DELETE FROM urun WHERE id=$item->id");
    }

    function deleteByID($id) {
        mysql_query("DELETE FROM urun WHERE id=$id");
    }

}

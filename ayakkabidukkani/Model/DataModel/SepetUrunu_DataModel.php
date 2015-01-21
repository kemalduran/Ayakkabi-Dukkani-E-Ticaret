<?php

/**
 * Description of SepetUrunu_DataModel
 *
 * @author kemalduran
 */
require_once '/database_connection.php';
require dirname(__FILE__) . '../../Classes/SepetUrunu.php';

class SepetUrunu_DataModel {

    public $db;

    function __construct() {
        global $db;
        $db = new database_connection();
        $db->connect();
    }

    function __destruct() {
       // mysql_close();
    }

    function getAll($sepet_id) {
        $all = array();
        $data = mysql_query("SELECT * FROM sepet_urunu WHERE sepet_id=".$sepet_id);
        while ($row = mysql_fetch_array($data)) {
            $i = new SepetUrunu();
            $i->id = $row['id'];
            $i->urun_id = $row['urun_id'];
            $dm_urun = new Urun_DataModel();
            $i->urun = $dm_urun->getByID($i->urun_id);
            $i->adet = $row['adet'];
            $i->sepet_id = $row['sepet_id'];
            array_push($all, $i);
        }
        return $all;
    }

    function getByID($id) {
        $data = mysql_query("SELECT * FROM sepet_urunu where id=" . $id);
        $row = mysql_fetch_assoc($data);
        $i = new SepetUrunu();
        $i->id = $row['id'];
        $i->urun_id = $row['urun_id'];
        $dm_urun = new Urun_DataModel();
        $i->urun = $dm_urun->getByID($i->urun_id);
        $i->adet = $row['adet'];
        $i->sepet_id = $row['sepet_id'];

        return $i;
    }

    function insert($item) {
        mysql_query("INSERT INTO sepet_urunu(urun_id, adet, sepet_id) values($item->urun_id, $item->adet, $item->sepet_id)");
    }

    function update($item) {
        mysql_query("UPDATE sepet_urunu SET urun_id=$item->urun_id, adet=$item->adet, sepet_id=$item->sepet_id  WHERE id=$item->id");
    }

    function delete($item) {
        mysql_query("DELETE FROM sepet_urunu WHERE id=$item->id");
    }

    function deleteByID($id) {
        mysql_query("DELETE FROM sepet_urunu WHERE id=$id");
    }

}

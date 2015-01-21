<?php
/**
 * Description of Admin_DataModel
 *
 * @author kemalduran
 */
require_once '/database_connection.php';
require dirname(__FILE__) . '../../Classes/Admin.php';
class Admin_DataModel {
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
        $data = mysql_query("SELECT * FROM admin");
        while ($row = mysql_fetch_array($data)) {
            $i = new Admin();
            $i->id = $row['id'];
            $i->ad = $row['ad'];
            $i->soyad = $row['soyad'];
            $i->email = $row['email'];
            $i->sifre = $row['sifre'];
            array_push($all, $i);
        }
        return $all;
    }

    function getByID($id) {
        $data = mysql_query("SELECT * FROM admin where id=" . $id);
        if(mysql_num_rows($data) == 0)
            return NULL;
        $row = mysql_fetch_assoc($data);
        $i = new Admin();
        $i->id = $row['id'];
        $i->ad = $row['ad'];
        $i->soyad = $row['soyad'];
        $i->email = $row['email'];
        $i->sifre = $row['sifre'];

        return $i;
    }
    function getByLogin($email, $sifre) {
        $data = mysql_query("SELECT * FROM admin where email='$email' and sifre='$sifre'");
        if(mysql_num_rows($data) == 0)
            return NULL;
        $row = mysql_fetch_assoc($data);
        $i = new Admin();
        $i->id = $row['id'];
        $i->ad = $row['ad'];
        $i->soyad = $row['soyad'];
        $i->email = $row['email'];
        $i->sifre = $row['sifre'];

        return $i;
    }

    function insert($item) {
        mysql_query("INSERT INTO admin(ad, soyad, email, sifre, kayitTarihi) "
                . "values('$item->ad', '$item->soyad', '$item->email', '$item->sifre')");
    }

    function update($item) {
        mysql_query("UPDATE admin SET ad='$item->ad', soyad='$item->soyad', email='$item->email', "
                . "sifre='$item->sifre' WHERE id=$item->id");
    }
    function delete($item) {
        mysql_query("DELETE FROM admin WHERE id=$item->id");
    }

    function deleteByID($id) {
        mysql_query("DELETE FROM admin WHERE id=$id");
    }
}

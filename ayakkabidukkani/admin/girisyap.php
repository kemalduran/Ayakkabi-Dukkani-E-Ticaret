<?php
require_once dirname(__FILE__).'../../Model/DataModel/Uye_DataModel.php';
require_once dirname(__FILE__).'../../Model/DataModel/Admin_DataModel.php';

$email = $_POST['email'];
$sifre = $_POST['sifre'];

$dm_admin = new Admin_DataModel();
$admin = $dm_admin->getByLogin($email, $sifre);

$dm = new Uye_DataModel();
$uye = $dm->getByLogin($email, $sifre);

if($uye == NULL && $admin == NULL)
{
    echo '<script type="text/javascript">'
            , 'location.replace("giris.php");'
            , '</script>';
}
else if($admin != NULL){
    session_start();
    $_SESSION['login_admin']="true";
    $_SESSION['username'] = $admin->ad." ".$admin->soyad;
    
    echo '<script type="text/javascript">'
            , 'window.open("index.php", "_parent");'
            , '</script>';
}
else if($uye != NULL){
    session_start();
    $_SESSION['login_uye']="true";
    $_SESSION['username'] = $uye->ad." ".$uye->soyad;
    $_SESSION['uye_id'] = $uye->id;
    
    echo '<script type="text/javascript">'
            , 'window.open("../index.php", "_parent");'
            , '</script>';
}
    
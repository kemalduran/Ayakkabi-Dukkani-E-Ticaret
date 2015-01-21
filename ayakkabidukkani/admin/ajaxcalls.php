<?php
require_once dirname(__FILE__).'../../Model/DataModel/Marka_DataModel.php';
require_once dirname(__FILE__).'../../Model/DataModel/AltKategori_DataModel.php';
require_once dirname(__FILE__).'../../Model/DataModel/Kategori_DataModel.php';
require_once dirname(__FILE__).'../../Model/DataModel/Siparis_DataModel.php';
require_once dirname(__FILE__).'../../Model/DataModel/Urun_DataModel.php';
require_once dirname(__FILE__).'../../Model/DataModel/SiparisUrunu_DataModel.php';
require_once dirname(__FILE__).'../../Model/DataModel/Uye_DataModel.php';
require_once dirname(__FILE__).'../../Model/Classes/Marka.php';  
require_once dirname(__FILE__).'../../Model/Classes/Siparis.php';  

$method = $_GET['method'];
 switch($method) {
        case 'editMarka' : editMarka();break;
        case 'createMarka' : createMarka();break;
        case 'delete' : deleteselecteds();break;
        case 'getAltKategori' : getAltKategori();break;
        case 'createKatg' : createKatg();break;
        case 'editKatg' : editKatg();break;
        case 'createAltKatg' : createAltKatg();break;
        case 'editAltKatg' : editAltKatg();break;
        case 'deleteKatg' : deleteKatg();break;
        case 'deleteAltKatg' : deleteAltKatg();break;
        case 'siparisOnayla' : siparisOnayla();break;
        
        // ...etc...
    }
    
function createMarka() {
    $ad = $_GET['adi'];
    
    $dm_marka = new Marka_DataModel();
    $item = new Marka();
    $item->marka_adi = $ad;
    $dm_marka->insert($item);
    
    $return = $_POST;
    $return["state"] = "success";
   // $return["json"] = json_encode($return);
    echo json_encode($return);
}
    
function editMarka() {
    $id = $_GET['id'];
    $ad = $_GET['adi'];
    
    $dm_marka = new Marka_DataModel();
    $item = new Marka();
    $item->id = $id;
    $item->marka_adi = $ad;
    $dm_marka->update($item);
    
    $return = $_POST;
    $return["state"] = "success";
   // $return["json"] = json_encode($return);
    echo json_encode($return);
    
}
function deleteselecteds() {
    $nums = $_GET['numbers'];
    $dm_marka = new Marka_DataModel();
    
    foreach ($nums as $id) {
        $dm_marka->deleteByID($id);
    }
    mysql_close();
    
    $return = $_POST;
    $return["state"] = "silindi";
   
    echo json_encode($return);
}
function getAltKategori(){
    $parent = $_GET['ust_id'];
    $dm_altkat = new AltKategori_DataModel();
    $akatgs = $dm_altkat->getAllByParent($parent);
    
    $return = $_POST;
    $return["liste"] = $akatgs;
   
    echo json_encode($return);
}
function createKatg() {
    $ad = $_GET['adi'];
    
    $dm = new Kategori_DataModel();
    $item = new Kategori();
    $item->isim = $ad;
    $dm->insert($item);
    
    $return = $_POST;
    $return["state"] = "success";
   // $return["json"] = json_encode($return);
    echo json_encode($return);
}
function createAltKatg() {
    $ad = $_GET['adi'];
    $ust = $_GET['ust_id'];
    
    $dm = new AltKategori_DataModel();
    $item = new AltKategori();
    $item->isim = $ad;
    $item->ust_id = $ust;
    $dm->insert($item);
    
    $return = $_POST;
    $return["state"] = "success";
   // $return["json"] = json_encode($return);
    echo json_encode($return);
}
function editKatg() {
    $id = $_GET['id'];
    $ad = $_GET['adi'];
    
    $dm = new Kategori_DataModel();
    $item = new Kategori();
    $item->id = $id;
    $item->isim = $ad;
    $dm->update($item);
    
    $return = $_POST;
    $return["state"] = "success".$id.$ad;
    echo json_encode($return);
}
function editAltKatg() {
    $id = $_GET['id'];
    $ad = $_GET['adi'];
    
    $dm = new AltKategori_DataModel();
    $item = new AltKategori();
    $item->id = $id;
    $item->isim = $ad;
    $dm->update($item);
    
    $return = $_POST;
    $return["state"] = "success";
    echo json_encode($return);
}
function deleteKatg() {
    $nums = $_GET['numbers'];
    $dm = new Kategori_DataModel();
    
    foreach ($nums as $id) {
        $dm->deleteByID($id);
    }
    mysql_close();
    
    $return = $_POST;
    $return["state"] = "silindi";
   
    echo json_encode($return);
}
function deleteAltKatg() {
    $nums = $_GET['numbers'];
    $dm = new AltKategori_DataModel();
    
    foreach ($nums as $id) {
        $dm->deleteByID($id);
    }
    mysql_close();
    
    $return = $_POST;
    $return["state"] = "silindi";
   
    echo json_encode($return);
}
function siparisOnayla() {
    $id = $_GET['sip_id'];
    $dm_sip = new Siparis_DataModel();
    $sip = $dm_sip->getByID($id);
    $dm_sip = new Siparis_DataModel();
    $sip->onaylandi = '1';
    $dm_sip->update($sip);
    
    $sip_urun = new SiparisUrunu_DataModel();
    $dm_urun = new Urun_DataModel();
    $items = $sip_urun->getAll($sip->id);
    foreach ($items as $ii) {
        $urun_id = $ii->urun_id;
        $adet = $ii->adet;
        $urun = $dm_urun->getByID($urun_id);
        $urun->stokSayisi -= $adet;
        $urun->satisSayisi += $adet;
        $dm_urun->update($urun);
    }
    mysql_close();
    
    $return = $_POST;
    $return["state"] = "Onaylandı";
    echo json_encode($return);
}

?>

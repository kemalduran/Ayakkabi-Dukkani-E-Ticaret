<?php
require_once dirname(__FILE__).'../Model/DataModel/SepetUrunu_DataModel.php';
require_once dirname(__FILE__).'../Model/Classes/SepetUrunu.php';  

$method = $_GET['method'];
 switch($method) {
        case 'sepUrunKaldir' : sepUrunKaldir();break;
        
        // ...etc...
    }

function sepUrunKaldir() {
    $id = $_GET['sep_urun_id'];
    $dm = new SepetUrunu_DataModel();
    $dm->deleteByID($id);
    
    $return = $_POST;
    $return["state"] = "success";
    echo json_encode($return);
}
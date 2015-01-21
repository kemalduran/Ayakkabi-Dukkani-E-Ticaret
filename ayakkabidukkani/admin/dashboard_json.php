<html>
    <head>
         <meta http-equiv="Content-Type" content="application/json; charset=utf-8">
    </head>
    <body>
        <?php
require_once dirname(__FILE__).'../../Model/DataModel/Urun_DataModel.php';

$dm_urun = new Urun_DataModel();
$coks = $dm_urun->getAllOrderBy(5, "satisSayisi", "desc");
$encok = array();

foreach ($coks as $c) {
    array_push($encok, array( "label" => $c->isim, "data" => $c->satisSayisi ) );
}

$arr = array(
    "da" => array(
    array(
        "region" => utf8_encode( "asdıiüğ" ),
        "price" => "valore2"
    ),
    array(
        "region" => "valore",
        "price" => "valore2"
    ),
    array(
        "region" => "valore",
        "price" => "valore2"
    )
        )
);
echo json_encode($encok); 

?>
    </body>
</html>


<?php
    include '/Includes/header.php';
    require_once dirname(__FILE__).'../../Model/DataModel/Urun_DataModel.php';
    require_once dirname(__FILE__).'../../Model/Classes/Urun.php';
?>

<section id="content">
          <section class="vbox">
            <header class="header bg-light lt b-b b-light">
               <a href="urunler.php" class="btn btn-info"><i class="i i-arrow-left4"></i> Ürünlere Dön</a>
               <a href="urunekle.php" class="btn btn-info" style="margin-left: 8px;"><i class="fa fa-plus"></i> Yeni Ürün Ekle</a>
              
            </header>
            <section class="scrollable wrapper">
               <div class="row">
                <div class="col-sm-10">
                  
                    <?php
                    
                            $type = $_GET['type'];
    if($type === 'new')
        neww ();
    else if($type === 'edit')
        edit ();
    else if($type === 'delete')
        delete();
        
function delete() {
    $id= $_GET['id'];
    $dm = new Urun_DataModel();
   // $dm->deleteByID($id);
    echo '<h3> Ürün silinmiştir. </h3>';
}    
function neww() {
    $ad = $_POST['urunadi'];
    $marka = $_POST['marka'];
    $altkat = $_POST['altkatg'];
    $stok = $_POST['stok'];
    $fiyat = $_POST['fiyat'];
    $resim = $_FILES["fileToUpload"]["name"];
    $aciklama = $_POST['editor1'];
    
    $urun = new Urun();
    $urun->isim = $ad;
    $urun->marka_id = $marka;
    $urun->altKat_id = $altkat;
    $urun->stokSayisi = $stok;
    $urun->fiyat = $fiyat;
    $urun->resim = $resim;
    $urun->aciklama = $aciklama;
    $urun->satisSayisi = 0;
    
    if(resimYukle() == 1){
        $dm = new Urun_DataModel();
        $dm->insert($urun);
        echo '<h3> Ürün eklendi. </h3>';
    }
    else{
        echo "<br/> Resim yüklenirken bir hata oluştu!";
    }
}
function edit() {
    $ad = $_POST['urunadi'];
    $marka = $_POST['marka'];
    $altkat = $_POST['altkatg'];
    $stok = $_POST['stok'];
    $fiyat = $_POST['fiyat'];
    $resim = $_FILES["fileToUpload"]["name"];
    $aciklama = $_POST['editor1'];
        
    $id = $_GET['id'];
    $dm = new Urun_DataModel();
    $urun = $dm->getByID($id);
    
    $urun->isim = $ad;
    $urun->marka_id = $marka;
    $urun->altKat_id = $altkat;
    $urun->stokSayisi = $stok;
    $urun->fiyat = $fiyat;
    $urun->aciklama = $aciklama;
    
    if($resim == NULL){
        $dm->update($urun);
        echo '<h3> Kaydedildi. </h3>';

    }
    else{
        // yükle
        if(resimYukle() == 1){
            $urun->resim = $resim;
            $dm->update($urun);
            echo '<h3> Kaydedildi. </h3>';
        }
    }
}
function resimYukle() {
    $target_dir = "../images/urunler/";
    $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "<br/>File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "<br/>Bu resim zaten yüklenmiş.";
    $uploadOk = 1;
}
//echo $_FILES["fileToUpload"]["size"];
// Check file size - 5 MB
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "<br/>Resim 5 MB dan büyük olamaz!";
    $uploadOk = 0;
}
if($uploadOk == 1){
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "<br/>". basename( $_FILES["fileToUpload"]["name"]). " yüklendi.";           
        } else {
        }
    }
return $uploadOk;
}    
                    ?>
                    
                </div>
               </div>
                </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>

<?php
    include '/Includes/footer.php';
?>

 <!-- parsley -->
<script src="js/parsley/parsley.min.js"></script>
<script src="js/parsley/parsley.extend.js"></script>
  <script src="js/app.plugin.js"></script>
  
  <!-- wysiwyg -->
  <script src="js/wysiwyg/jquery.hotkeys.js"></script>
  <script src="js/wysiwyg/bootstrap-wysiwyg.js"></script>
  <script src="js/wysiwyg/demo.js"></script>
  <!-- markdown -->
  <script src="js/markdown/epiceditor.min.js"></script>
  <script src="js/markdown/demo.js"></script>

    <!-- file input -->  
  <script src="js/file-input/bootstrap-filestyle.min.js"></script>
  
  <script src="js/chosen/chosen.jquery.min.js"></script>
  <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
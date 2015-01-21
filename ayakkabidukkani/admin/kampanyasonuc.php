
<?php
    include '/Includes/header.php';
    require_once dirname(__FILE__).'../../Model/DataModel/Kampanya_DataModel.php';
require_once dirname(__FILE__).'../../Model/Classes/Kampanya.php';
?>
    <section id="content">
          <section class="vbox">
            <header class="header bg-light lt b-b b-light">
                <a href="kampanyalar.php" class="btn btn-info"><i class="i i-arrow-left4"></i> Kampanyalara Dön</a>
              
              <form method="post" class="m-t-sm pull-right pull-none-xs input-s-lg m-b-sm">
                <div class="input-group">
                    <input type="text" id="address" name="address" class="input-sm form-control" placeholder="Arama yap">
                    <span class="input-group-btn">
                      <button class="btn btn-sm btn-default" type="submit">Bul!</button>
                    </span>
                </div>
              </form>
            </header>
            <section class="scrollable wrapper">
              <div class="row">
                <div class="col-md-3 col-md-push-9">
                  
                </div>
                <div class="col-md-9 col-md-pull-3">
                  <div class="row row-sm">
                      
                      <?php
                          
$type = $_GET['type'];
if($type === 'new')
    neww();
else if($type === 'edit')
    edit();
else if($type === 'delete')
    delete();
function edit() {
    $id = $_GET['id'];
    $dm = new Kampanya_DataModel();
    $kampanya = $dm->getByID($id);
    $resim = $_FILES["fileToUpload"]["name"];
    $aciklama = $_POST['aciklama'];
    $kampanya->aciklama = $aciklama;
    if($resim == NULL){
        $dm->update($kampanya);
        echo '<h3> Düzenlendi. </h3>';
    }
    else{
        // yükle
        if(resimYukle() == 1){
            $kampanya->resim = $resim;
            $dm->update($kampanya);
            echo '<h3> Düzenlendi. </h3>';
        }
    }
}
function delete() {
    $id = $_GET['id'];
    $dm = new Kampanya_DataModel();
    $dm->deleteByID($id);
    echo 'silindi';   
}
function neww() {
    $aciklama = $_POST['aciklama'];
    $resim = $_FILES["fileToUpload"]["name"];
    $kampanya = new Kampanya();
    $kampanya->aciklama = $aciklama;
    $kampanya->resim = $resim;
    if(resimYukle() == 1){
        $dm = new Kampanya_DataModel();
        $dm->insert($kampanya);
        echo 'eklendi';
    }
    else{
        echo 'eklenemedi';
    }
    
}

function resimYukle() {
    $target_dir = "../images/slider/";
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
              </div>
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>

<?php
    include '/Includes/footer.php';
?>
  <!-- file input -->  
  <script src="js/file-input/bootstrap-filestyle.min.js"></script>
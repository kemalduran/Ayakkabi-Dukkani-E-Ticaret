
<?php
    include '/Includes/header.php';
   require_once dirname(__FILE__).'../../Model/DataModel/Kampanya_DataModel.php';
   
   $id = $_GET['id'];
   $dm_kamp = new Kampanya_DataModel();
   $kamp = $dm_kamp->getByID($id);
   
?>


    <section id="content">
          <section class="vbox">
            <header class="header bg-light lt b-b b-light">
                <a onclick="window.history.back()" class="btn btn-info"><i class="i i-arrow-left4"></i> Kampanyalara Dön</a>
                <p class="h4 font-thin m-l m-b-sm">Kampanya düzenle</p>
                <a class="btn btn-sm btn-info btn-rounded btn-icon"><i class="i i-statistics icon"></i></a>
              
            </header>
            <section class="scrollable wrapper">
              <div class="row">
                <div class="col-md-3 col-md-push-9">
                  
                </div>
                <div class="col-md-9 col-md-pull-3">
                  <div class="row row-sm">
                       
                <div class=" b-r">
                    <form data-validate="parsley" action="kampanyasonuc.php?type=edit&id=<?php echo $kamp->id ?>" method="post" enctype="multipart/form-data">
                    <section class="panel panel-default">
                      <header class="panel-heading">
                        <span class="h4"></span>
                      </header>
                      <div class="panel-body">
                        
                        <div class="form-group">
                          <label>Kampanya açıklaması:</label>
                          <input type="text" name="aciklama" value="<?php echo $kamp->aciklama ?>" class="form-control" data-required="true">                        
                        </div>
                       
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label >Kampanya görseli 680x300</label>
                            <div >
                                <input type="file" name="fileToUpload" id="fileToUpload" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <img src="../images/slider/<?php echo $kamp->resim ?>" style="height: 120px;" />
                        </div>
                    </div>
                         
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                        
                      </div>
                      <footer class="panel-footer text-right bg-light lter">
                          <a href="kampanyasonuc.php?type=delete&id=<?php echo $kamp->id ?>" type="submit" class="btn btn-danger btn-s-xs m-r">Bu kampanyayı sil</a>
                          <a href="kampanyalar.php" class="btn btn-default btn-s-xs">İptal</a>
                        <button type="submit" class="btn btn-primary btn-s-xs">Kaydet</button>
                      </footer>
                    </section>
                  </form>
                </div>
                      
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
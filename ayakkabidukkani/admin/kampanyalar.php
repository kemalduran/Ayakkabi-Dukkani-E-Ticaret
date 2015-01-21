
<?php
    include '/Includes/header.php';
   require_once dirname(__FILE__).'../../Model/DataModel/Kampanya_DataModel.php';
?>


    <section id="content">
          <section class="vbox">
            <header class="header bg-light lt b-b b-light">
              <p class="h4 font-thin pull-left m-r m-b-sm">Kampanyalar</p>
              <a class="btn btn-sm btn-info btn-rounded btn-icon"><i class="i i-statistics icon"></i></a>
              <a href="#modal-form" data-toggle="modal" class="btn btn-info" style="margin-left: 8px;"><i class="fa fa-plus"></i> Yeni Kampanya Ekle</a>
              
            </header>
            <section class="scrollable wrapper">
              <div class="row">
                <div class="col-md-3 col-md-push-9">
                  
                </div>
                <div class="col-md-9 col-md-pull-3">
                  <div class="row row-sm">
                      
            <?php
                $dm_kamp = new Kampanya_DataModel();
                $kamps = $dm_kamp->getAll();
                $count = 1;
                foreach ($kamps as $u) {
                    //if( control($u,  $katg, $altkat, $mark))
                {
            ?>
            
                    <div class="col-xs-6 ">
                      <div class="thumbnail">
                        <a href="kampanya.php?id=<?php echo $u->id ?>"><img src="../images/slider/<?php echo $u->resim; ?>" alt="shoe" style="height: 150px; width: 320x" /></a>
                        <div class="caption">
                          <p class="text-ellipsis m-b-none"><?php echo substr($u->aciklama,0,30); if(strlen($u->aciklama) >=30) echo "...";  ?></p>
                        </div>
                      </div>
                    </div>
                      
            <?php if($count%2 == 0){ ?>
                <div class="cleaner"></div>
            <?php }; ?>
            <?php $count++; }}; ?>
                    
                    
                  </div>
                </div>
              </div>
            </section>
              
              <footer class="footer bg-white b-t">
                  <div class="row text-center-xs">
                    <div class="col-md-6 hidden-sm">
                      <p class="text-muted m-t"> Toplam <?php echo $count-1 ?> ürün bulundu </p>
                    </div>
                  </div>
                </footer>
              
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
    
<div class="modal fade" id="modal-form">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body wrapper-lg">
          <div class="row">
                <div class=" b-r">
                    <form data-validate="parsley" action="kampanyasonuc.php?type=new" method="post" enctype="multipart/form-data">
                    <section class="panel panel-default">
                      <header class="panel-heading">
                        <span class="h4">Yeni kampanya ekle</span>
                      </header>
                      <div class="panel-body">
                        <p class="text-muted">Lütfen bilgileri giriniz</p>
                        <div class="form-group">
                          <label>Kampanya açıklaması:</label>
                          <input name="aciklama" type="text" class="form-control" data-required="true">                        
                        </div>
                       
                    <div class="form-group">
                      <label >Kampanya görseli 680x300</label>
                      <div >
                          <input type="file" name="fileToUpload" id="fileToUpload" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s"> </input>
                      </div>
                    </div>
                         
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                        
                      </div>
                      <footer class="panel-footer text-right bg-light lter">
                        <a href="#modal-form" data-toggle="modal" class="btn btn-default btn-s-xs">İptal</a>
                        <button type="submit" class="btn btn-success btn-s-xs">Ekle</button>
                      </footer>
                    </section>
                  </form>
                </div>
               </div>       
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

<?php
    include '/Includes/footer.php';
?>
  <!-- file input -->  
  <script src="js/file-input/bootstrap-filestyle.min.js"></script>
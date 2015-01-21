<?php
    include '/Includes/header.php';
    //require_once dirname(__FILE__).'../../Model/DataModel/Urun_DataModel.php';
    
?>

<section id="content">
          <section class="vbox">
            <header class="header bg-light lt b-b b-light">
                <p class="h4 font-thin pull-left m-r m-b-sm">Ürünler</p>
                <a href="urunler.php" class="btn btn-sm btn-info btn-rounded btn-icon"><i class="fa fa-tags"></i></a>
              
            </header>
            <section class="scrollable wrapper">
    
               <div class="row">
                <div class="col-sm-10">
                    <form data-validate="parsley" action="urunsonuc.php?type=new" method="post" enctype="multipart/form-data">
                    <section class="panel panel-default">
                      <header class="panel-heading">
                        <span class="h4">Ürün kaydı yap</span>
                      </header>
                      <div class="panel-body">
                        <p class="text-muted">Lütfen ürün bilgilerini giriniz</p>
                        <div class="form-group">
                          <label>Ürün ismi:</label>
                          <input name="urunadi" type="text" class="form-control" data-required="true">                        
                        </div>
                       
                    <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                            <label >Marka seçiniz</label>
                            <div >
                                <select name="marka" style="width:260px" class="chosen-select">
                                    <?php $dm_marka = new Marka_DataModel();
                                        foreach ($dm_marka->getAll() as $m) { ?>
                                    <option value="<?php echo $m->id; ?>"> <?php echo $m->marka_adi; ?> </option>
                                    
                                        <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label >Kategori seçiniz</label>
                            <div >
                          <select name="altkatg" style="width:260px" class="chosen-select">
                              <?php $dm_kat = new Kategori_DataModel();
                                foreach ($dm_kat->getAll() as $kat) {   
                              ?>
                              
                              <optgroup label="<?php echo $kat->isim ?>">
                                <?php $dm_alt = new AltKategori_DataModel();
                                    foreach($dm_alt->getAllByParent($kat->id) as $alt){ ?>
                                      <option value="<?php echo $alt->id ?>"> <?php echo $alt->isim ?> </option>

                                <?php } ?>
                              </optgroup>
                              
                                <?php } ?>
                           
                        </select>
                   
                            </div>
                        </div>
                      
                    </div>
                        
                        <div class="form-group pull-in clearfix">
                            <div class="col-sm-6">
                                <label>Stok sayısı</label>
                                <input name="stok" type="number" class="form-control" placeholder="0" data-required="true">
                            </div>
                            <div class="col-sm-6">
                                <label>Fiyatı</label>
                                <div class="input-group m-b">
                                    <span class="input-group-addon">₺</span>
                                    <input name="fiyat" type="text" data-required="true" class="form-control">
                                    <span class="input-group-addon">.00</span>
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                      <label >Ürün görseli</label>
                      <div >
                          <input name="fileToUpload" id="fileToUpload" type="file" class="filestyle" data-icon="false" data-required="true" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s"> </input>
                      </div>
                    </div>
                        
                    <div class="line line-dashed b-b line-lg pull-in"></div>

                    <div class="form-group">
                      <label >Ürün açıklaması</label>
                      <div >
                          <textarea class="ckeditor" cols="80" id="editor1" name="editor1" rows="10">

			</textarea>
                      </div>
                    </div>    
                                                 
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    
                      </div>
                      <footer class="panel-footer text-right bg-light lter">
                          <button type="submit" name="submit" class="btn btn-success btn-s-xs">Kaydet</button>
                      </footer>
                    </section>
                  </form>
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
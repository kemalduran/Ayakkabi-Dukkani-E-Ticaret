
<?php
    include '/Includes/header.php';
    //require_once dirname(__FILE__).'../../Model/DataModel/Urun_DataModel.php';
    $katg = NULL;
    $altkat = NULL;
    $mark = NULL;
    if(isset($_GET["kategori"])){
        $katg = $_GET["kategori"];
    }
    if(isset($_GET["altkategori"])){
        $altkat = $_GET["altkategori"];
    }
    if(isset($_GET["markaid"]))
        $mark = $_GET["markaid"];
    
    // filtreleme
    function control($urun, $katg, $altkat, $mark) {
        if($altkat === NULL and $katg === NULL) // parametre yoksa
            return true;
        if($altkat != NULL){
            if($urun->altKat_id == $altkat)
                return true;
        }
        else if ($katg != NULL) {
            $dm_altk = new AltKategori_DataModel();
            $alt = $dm_altk->getByID($urun->altKat_id);
            if($alt->ust_id == $katg)
                return true;
        }
        /*else if($mark != NULL){
            if($urun->marka_id == $mark)
                return TRUE;
        }*/
        return false;
    }
?>


    <section id="content">
          <section class="vbox">
            <header class="header bg-light lt b-b b-light">
              <p class="h4 font-thin pull-left m-r m-b-sm">Ürünler</p>
              <a href="urunler.php" class="btn btn-sm btn-info btn-rounded btn-icon"><i class="fa fa-tags"></i></a>
              <a href="urunekle.php" class="btn btn-info" style="margin-left: 8px;"><i class="fa fa-plus"></i> Yeni Ürün Ekle</a>
              
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
                  <div class="panel">
                    <div class="panel-heading b-b">Kategoriler</div>
                    <div class="panel-body">
                    
                 <div class="dd" id="nestable1">
                    <ol class="dd-list">
                     
                          <?php
                              $dm_kat = new Kategori_DataModel();
                              $dm_alt = new AltKategori_DataModel();
                              $kategoriler = $dm_kat->getAll();
                              foreach ($kategoriler as $k) {
                                  
                          ?>
                        
                          <li class="dd-item" data-id="<?php echo $k->id ?>">
                              <div class="dd-nestable" > <a href="urunler.php?kategori=<?php echo $k->id ?>"> <strong> <?php echo $k->isim; ?> </strong></a> </div>
                          <ol class="dd-list">
                              <?php
                                   $alts = $dm_alt->getAllByParent($k->id);
                                   foreach ($alts as $a) {
                                   
                              ?>
                              <li class="dd-item">
                                  <div class="dd-nestable" style="padding:2px 0px 2px 6px; margin: 3px 0px;">
                                      <a href="urunler.php?altkategori=<?php echo $a->id ?>"> <?php echo $a->isim; ?></a>
                                  </div>
                              </li>
                                   <?php } ?>                             
                          </ol>
                          </li>
                              <?php } ?>
                  </ol>
                  </div>
              
                     <div class="line line-dashed b-b line-lg"></div>
                      
                    </div>
                  </div>
                </div>
                <div class="col-md-9 col-md-pull-3">
                  <div class="row row-sm">
                      
            <?php
                $dm_urun = new Urun_DataModel();
                $urunler = $dm_urun->getAll();
                $count = 1;
                foreach ($urunler as $u) {
                    if( control($u,  $katg, $altkat, $mark))
                {
            ?>
            
                    <div class="col-xs-6 col-sm-4 col-md-3">
                      <div class="thumbnail">
                        <a href="urundetay.php?id=<?php echo $u->id ?>"><img src="../images/urunler/<?php echo $u->resim; ?>" alt="shoe" style="height: 150px; width: 150x" /></a>
                        <div class="caption">
                          <p class="text-ellipsis m-b-none"><?php echo substr($u->isim,0,30); if(strlen($u->isim) >=30) echo "...";  ?></p>
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
                      <p class="text-muted m-t"> Toplam <?php echo $count-1?> ürün bulundu </p>
                    </div>
                  </div>
                </footer>
              
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
    

<?php
    include '/Includes/footer.php';
?>

<script>
    $(document).ready(function (){
       $('.dd').nestable('collapseAll'); 
    });
</script>
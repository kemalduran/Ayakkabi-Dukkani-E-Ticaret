
<?php
    include '/Includes/header.php';
    require_once dirname(__FILE__).'../../Model/DataModel/SiparisUrunu_DataModel.php';
    require_once dirname(__FILE__).'../../Model/Classes/SiparisUrunu.php';
    require_once dirname(__FILE__).'../../Model/DataModel/Uye_DataModel.php';

?>
<section id="content">
          <section class="vbox">
            <header class="header bg-white b-b clearfix">
             
              <div class="row m-t-sm">
                    <div class="col-sm-8 m-b-xs">
                        <a onclick="window.history.back()" class="btn btn-info"><i class="i i-arrow-left4"></i> Siparişlere Dön</a>

                    </div>
                    <div class="col-sm-4 m-b-xs">
                      
                    </div>
                  </div>
            </header>
            <section class="scrollable wrapper w-f">
             <div class="row">
                 <div class="col-sm-12">
                     
              <section class="panel panel-default">
                <header class="panel-heading font-bold">
                    <h3>Sipariş Ayrıntıları</h3>
                </header>
                <div class="panel-body">
                  <form class="form-horizontal" method="get">
                      <?php
                      $id = $_GET['id'];
                      $dm_siparis = new Siparis_DataModel();
                      $siparis = $dm_siparis->getByID($id);
                      
                      ?>
                      
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Sipariş numarası: </label>
                      <div class="col-sm-10">
                          <p class="form-control-static" style="color: black"><?php echo $siparis->id ?></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Siparişi veren: </label>
                      <div class="col-sm-10">
                          <p class="form-control-static" style="color: black"><?php echo $siparis->musteri ?></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Sipariş tarihi: </label>
                      <div class="col-sm-10">
                          <p class="form-control-static" style="color: black"><?php echo $siparis->siparis_tarihi ?></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Toplam fiyat: </label>
                      <div class="col-sm-10">
                          <p class="form-control-static" style="color: black"><?php echo $siparis->toplam_fiyat." TL" ?></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Teslimat adresi: </label>
                      <div class="col-sm-10">
                          <p class="form-control-static" style="color: black"><?php echo $siparis->adres ?></p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Durumu: </label>
                      <div class="col-sm-10">
                          <p class="form-control-static" id="durum" style="color: black"><?php if($siparis->onaylandi === '1') echo 'Onaylandı'; else echo 'Onaylanmadı' ?></p>
                      </div>
                    </div>
                    
                    <?php if($siparis->onaylandi === '0'){ ?>
                    <div class="line line-dashed b-b line-lg pull-in"></div>
                    <div class="form-group">
                      <div class="col-sm-4 col-sm-offset-2">
                          <button type="button" id="onayla_btn" onclick="onayla(<?php echo $siparis->id ?>)" class="btn btn-primary">Siparişi onayla</button>
                      </div>
                    </div>
                    <?php } ?>
                    
                  </form>
                </div>
              </section>
                 </div>
             </div>
                
                <div class="row">
                    <div class="col-sm-12">
                        
                         <section class="panel panel-default">
                             <header class="panel-heading font-bold">
                                <h4>Sipariş Parçaları</h4>
                            </header>
                        <div class="table-responsive">
                        <table id="tablo" class="table m-b-none">
                        <thead>
                           <tr >
                            <th>Ürün adı</th>
                            <th >Adet</th>
                            <th >Birim fiyat</th>
                            <th >Fiyat</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                             $dm_siparisurunu = new SiparisUrunu_DataModel();
                             $list = $dm_siparisurunu->getAll($id);
                             $adet_cnt = 0;
                             foreach ($list as $ll) {
                                 $adet_cnt += $ll->adet;
                            ?>
                            
                          <tr class="yeni" >
                              <td> <a href="urundetay.php?id=<?php echo $ll->urun_id ?>"> <?php echo $ll->urun->isim ?> </a> </td>
                            <td><?php echo $ll->adet ?></td>
                            <td><?php echo $ll->birim_fiyat." TL" ?></td>
                            <td><?php echo $ll->adet." x ".$ll->birim_fiyat." TL"." = ".$ll->adet*$ll->birim_fiyat." TL" ?> </td>
                          </tr>   
                          
                             <?php } ?>
                           
                        </tbody>
                        
                      </table>
                    </div>
                             <footer class="panel-footer">
                  <div class="row">
                    
                    <div class="col-sm-10 text-right">
                        <p class="text-muted inline m-t-sm m-b-sm" style="color: black; font-size: 14px;"> 
                            <?php echo $adet_cnt." parça ürün ".$siparis->toplam_fiyat." TL" ?></p>
                    </div>
                   
                  </div>
                </footer>
                             
                         </section>
                        
                    </div>
                </div>
                
            </section>
              
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>

<?php
    include '/Includes/footer.php';
?>

<script>
function onayla(id){
    var method = "siparisOnayla";
        $.ajax({
            url: "ajaxcalls.php",
            type: "GET",
            dataType: "json",
            data: { method:method, sip_id:id },
            contentType: 'application/json; charset=utf-8',
            success: function (e){
                alert('Sipariş onaylandı!');
                onaylandi();
            },
            error: function (e){ alert(e.responseText); }
        });
}
function onaylandi(){
    $('#onayla_btn').hide(500);
    $('#durum').text('Onaylandı');
    
}
</script>

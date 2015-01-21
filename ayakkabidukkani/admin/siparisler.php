
<?php
    include '/Includes/header.php';
    
    require_once dirname(__FILE__).'../../Model/DataModel/Uye_DataModel.php';

?>
<section id="content">
          <section class="vbox">
            <header class="header bg-white b-b clearfix">
             
              <div class="row m-t-sm">
                    <div class="col-sm-8 m-b-xs">
                      <div class="btn-group">
                        <button type="button" onclick="location.reload()" class="btn btn-sm btn-default" title="Refresh"><i class="fa fa-refresh"></i></button>
                        
                      </div>
                        <a class="btn btn-sm btn-info m-l btn-rounded btn-icon"><i class="fa fa-envelope-o"></i></a>
                        <a class="h3 font-thin m-r m-t">Siparişler <?php $dm_siparis = new Siparis_DataModel(); $ii = $dm_siparis->getUnReadedNumber(); echo "(".$ii.")" ?></a> 
                        
                    </div>
                    <div class="col-sm-4 m-b-xs">
                      
                    </div>
                  </div>
            </header>
            <section class="scrollable wrapper w-f">
                  <section class="panel panel-default">
                    <div class="table-responsive">
                        <table id="tablo" class="table m-b-none">
                        <thead>
                           <tr >
                            <th width="20"><label class="checkbox m-n i-checks"><input type="checkbox"><i style="margin-left: -2px;"></i></label></th>
                            <th>Kimden</th>
                            <th >Toplam Fiyat</th>
                            <th >Sipariş Tarihi</th>
                             <th ></th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            $dm_siparis = new Siparis_DataModel();
                            $siparisler = $dm_siparis->getAll();
                            foreach ($siparisler as $ss) {
                                
                            ?>
                          <tr <?php if($ss->onaylandi === '0') echo 'class="yeni"' ?> >
                            <td><label class="checkbox m-n i-checks"><input type="checkbox" name="ids[3]"><i style="margin-left: -2px;"></i></label></td>
                            <td><?php echo $ss->musteri ?></td>
                            <td><?php echo $ss->toplam_fiyat." TL" ?></td>
                            <td> <?php echo $ss->siparis_tarihi ?> </td>
                            <td><a href="siparis.php?id=<?php echo $ss->id ?>" class="btn btn-s-md btn-warning btn-rounded detaylar" style="min-width: 90px; max-height: 28px; padding: 4px">Detaylar</a></td>

                          </tr>    
                            <?php } ?>
                          
                        </tbody>
                      </table>
                    </div>
                  </section>
                </section>
                <footer class="footer bg-white b-t">
                  <div class="row text-center-xs">
                    <div class="col-md-6 hidden-sm">
                        <p class="text-muted m-t">Toplam <?php echo count($siparisler) ?> kayıt bulundu</p>
                    </div>
                    
                  </div>
                </footer>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>

<?php
    include '/Includes/footer.php';
?>

<style>
    .yeni{
        background: #FFFFCC;
    }
    .detaylar{
        
    }
    table#tablo tr td a.detaylar { display:none;}
    table#tablo tr:hover td a.detaylar { display:inline-block;}
    
</style>
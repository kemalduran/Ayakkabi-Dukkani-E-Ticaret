
<?php
    include '/Includes/header.php';
    //require_once dirname(__FILE__).'../../Model/DataModel/Urun_DataModel.php';
?>

<section id="content">
          <section class="vbox">
            <header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                    <div class="col-sm-8 m-b-xs">
                      <div class="btn-group">
                          <button type="button" onclick="location.reload()" class="btn btn-sm btn-default" title="Refresh"><i class="fa fa-refresh"></i></button>
                        <button onclick="deleteselected()" type="button" class="btn btn-sm btn-default" title="Remove"><i class="fa fa-trash-o"></i></button>
                        
                      </div>
                      <a href="#modal-form-yeni" data-toggle="modal" class="btn btn-sm btn-default"><i class="fa fa-plus"></i> Yeni Marka</a>
                       <a class="btn btn-sm btn-info m-l btn-rounded btn-icon"><i class="i i-docs icon"></i></a>
                        <a class="h3 font-thin m-r m-t">Markalar</a>
                    </div>
                    
                  </div>
                </header>
              
            <section class="scrollable wrapper w-f" >
                  <section class="panel panel-default">
                    <div class="table-responsive">
                      <table class="table table-striped m-b-none">
                        <thead>
                          <tr>
                            <th width="20"><label class="checkbox m-n i-checks"><input type="checkbox"><i style="margin-left: -2px;"></i></label></th>
                            <th width="20"></th>
                            <th>Marka adı</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                                $dm_marka = new Marka_DataModel();
                                $markalar = $dm_marka->getAll();
                                foreach ($markalar as $m) {
                                    
                            ?>
                            <tr>
                            <td><label class="checkbox m-n i-checks"><input type="checkbox" name="checks<?php echo $m->id ?>"><i style="margin-left: -2px;"></i></label></td>
                            <td><a href="#modal-form-duzenle" onclick="duzenleclick(<?php echo $m->id.",'".$m->marka_adi."'" ?>)" data-toggle="modal">
                                    <i class="fa fa-edit text-muted" style="width: 18px; height: 20px;"></i></a></td>
                            <td><?php echo $m->marka_adi; ?></td>
                           
                            <td>
                            </td>
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
                      <p class="text-muted m-t">Toplam <?php echo count( $markalar) ?> adet kayıt bulundu</p>
                    </div>
                    
                  </div>
                </footer>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>

<?php
    include '/Includes/footer.php';
?>


<div class="modal fade" id="modal-form-yeni">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body wrapper-lg">
          <div class="row">
                <div class=" b-r">
                  <form data-validate="parsley" action="#">
                    <section class="panel panel-default">
                      <header class="panel-heading">
                        <span class="h4">Yeni marka ekle</span>
                      </header>
                      <div class="panel-body">
                        <p class="text-muted">Lütfen bilgileri giriniz</p>
                        <div class="form-group">
                          <label>Marka adı:</label>
                          <input id="ekle_marka_adi" type="text" class="form-control" data-required="true">                        
                        </div>
                       
                      </div>
                      <footer class="panel-footer text-right bg-light lter">
                        <a href="#modal-form-yeni" data-toggle="modal" class="btn btn-default btn-s-xs">İptal</a>
                        <button type="submit" onclick="ekleclick()" class="btn btn-success btn-s-xs">Ekle</button>
                      </footer>
                    </section>
                  </form>
                </div>
               </div>       
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

<div class="modal fade" id="modal-form-duzenle">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body wrapper-lg">
          <div class="row">
                <div class=" b-r">
                  <form data-validate="parsley" action="#">
                    <section class="panel panel-default">
                      <header class="panel-heading">
                        <span class="h4">Marka düzenle</span>
                      </header>
                      <div class="panel-body">
                        <p class="text-muted">Lütfen bilgileri giriniz</p>
                        <div class="form-group">
                          <label>Marka adı:</label>
                          <input id="duzenle_marka_adi" type="text" class="form-control" data-required="true">                        
                        </div>
                       
                      </div>
                      <footer class="panel-footer text-right bg-light lter">
                        <a href="#modal-form-duzenle" data-toggle="modal" class="btn btn-default btn-s-xs">İptal</a>
                        <button id="duzenlesubmit" type="submit" class="btn btn-success btn-s-xs">Kaydet</button>
                      </footer>
                    </section>
                  </form>
                </div>
               </div>       
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

<script>
    function ekleclick(){
        var ad = $('#ekle_marka_adi').val();
        $.ajax({
            url: "ajaxcalls.php",
            type: "GET",
            dataType: "json",
            data: { method:'createMarka', adi:ad },
            contentType: 'application/json; charset=utf-8',
            success: function (e){
                //alert(e); 
                location.reload();
            },
            error: function(e){ alert(e.responseText);} 
        });
    }
    
    function duzenleclick(_id, _adi){
        $('#duzenle_marka_adi').val( _adi);
        $('#duzenlesubmit').click(function(){
            //alert(adi);
            var yeni = $('#duzenle_marka_adi').val();
            var request = $.ajax({
                url: "ajaxcalls.php",
                type: "GET",
                dataType: "json",
                data: { method:'editMarka', id:_id, adi:yeni },
            contentType: 'application/json; charset=utf-8',
            success: function (e){
                //alert(e); 
                location.reload();
            },
            error: function(e){ alert(e.responseText);} 
            });
        });
        
    }
    function deleteselected(){
        var chcks= $('input[name^="checks"]:checked');
        var nums = [];
        
        var lng=chcks.length;
        if(lng === 0)
            return;
        
        for ( var i = 0; i < lng; i = i + 1 ) {
            var x = $(chcks[i]).attr('name').slice(6);
            nums.push(x);
        }
        
        var method = "delete";
        $.ajax({
            url: "ajaxcalls.php",
            type: "GET",
            dataType: "json",
            data: { method:method, numbers:nums },
            contentType: 'application/json; charset=utf-8',
            success: function (e){
                //alert(e["asd"]); 
                location.reload();
            },
            error: function(e){ alert(e.responseText);}
                
        });
    }
</script>


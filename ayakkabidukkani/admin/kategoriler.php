
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
                        <button type="button" onclick="deleteselected()" class="btn btn-sm btn-default" title="Remove"><i class="fa fa-trash-o"></i></button>
                        
                      </div>
                      <a class="btn btn-sm btn-info m-l btn-rounded btn-icon"><i class="i i-grid2 icon"></i></a>
                      <a id="katg" class="h3 font-thin m-r m-t">Kategoriler</a>
                    </div>
                  </div>
                </header>
              <section class="hbox stretch" style="height: 560px !important;">   
                  <section class="vbox">
                  <section class="scrollable wrapper w-f col-sm-4">
                  <section class="panel panel-default">
                      <div class="table-responsive">
                      <table class="table table-striped m-b-none">
                        <thead>
                          <tr>
                            <th width="20"><label class="checkbox m-n i-checks"><input type="checkbox"><i style="margin-left: -2px"></i></label></th>
                            <th width="20"></th>
                            <th >Kategori ismi </th>
                            <th width="60"><a href="#modal-form-yeni" onclick="prepare_modal_yeni(1)" data-toggle="modal" class="btn btn-sm btn-default"><i class="fa fa-plus"></i> Yeni</a></th>
                            <th width="40"></th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                $dm_kat = new Kategori_DataModel();
                                $katgs = $dm_kat->getAll();
                                foreach ($katgs as $m) {
                            ?>
                            <tr>
                                <td><label class="checkbox m-n i-checks"><input type="checkbox" name="checks<?php echo $m->id ?>"><i style="margin-left: -2px;"></i></label></td>
                                <td><a href="#modal-form-duzenle" style="width: 30px; height: 30px" onclick="duzenleclick(<?php echo $m->id.",'".$m->isim."', 1" ?>)" data-toggle="modal">
                                        <i class="fa fa-edit text-muted" style="width: 18px; height: 20px;"></i></a></td>
                                <td><?php echo $m->isim; ?></td>
                                <td></td>
                                <td onclick="showtable(<?php echo $m->id.",'".$m->isim."'" ?>)">
                                    <a href="#"  class="active" >
                                        <i id="arrowright<?php echo $m->id; ?>" class="i i-arrow-right4 text-active"></i>
                                        <i id="arrowleft<?php echo $m->id; ?>" class="i i-arrow-left4 text"></i></a>
                                </td>
                          </tr>
                            
                                <?php } ?>
                          
                        </tbody>
                      </table>
                    </div>
                  </section>
                </section>
              </section>
                  <section class="vbox">
                  <section id="table" class="scrollable wrapper w-f col-sm-4">
                  <section class="panel panel-default">
                      <div id="innertable" class="table-responsive">
                       <table class="table table-striped m-b-none">
                        <thead>
                          <tr>
                            <th width="20"><label class="checkbox m-n i-checks"><input type="checkbox"><i style="margin-left: -2px"></i></label></th>
                            <th width="20"></th>
                            <th >Alt Kategori ismi</th>
                            <th width="40"></th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                
                            ?>
                            
                                <?php ?>
                          
                        </tbody>
                      </table>
                    </div>
                  </section>
                </section>
                  </section>
              </section>
                <footer class="footer bg-white b-t">
                  <div class="row text-center-xs">
                    <div class="col-md-6 hidden-sm">
                      <p class="text-muted m-t"></p>
                    </div>
                    
                  </div>
                </footer>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>

<?php
    include '/Includes/footer.php';
?>
<!-- modal yeni -->
<div class="modal fade" id="modal-form-yeni">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body wrapper-lg">
          <div class="row">
                <div class=" b-r">
                  <form data-validate="parsley" action="#">
                    <section class="panel panel-default">
                      <header class="panel-heading">
                          <span id="label2" class="h4">Yeni (alt) kategori ekle</span>
                      </header>
                      <div class="panel-body">
                        <p class="text-muted">Lütfen bilgileri giriniz</p>
                        <div id="disabled_div" class="form-group">
                          <label>Üst Kategori adı:</label>
                          <input id="ust_adi" type="text" class="form-control" disabled >                        
                        </div>
                        <div class="form-group">
                            <label id="label1">Alt Kategori adı:</label>
                          <input id="ekle_adi" type="text" class="form-control" data-required="true">                        
                        </div>
                       
                      </div>
                      <footer class="panel-footer text-right bg-light lter">
                        <a href="#modal-form-yeni" data-toggle="modal" class="btn btn-default btn-s-xs">İptal</a>
                        <button id="btn2" type="submit" onclick="ekleclick_alt()" class="btn btn-success btn-s-xs">Ekle</button>
                        <button id="btn1" type="submit" onclick="ekleclick()" class="btn btn-success btn-s-xs">Ekle</button>
                      </footer>
                    </section>
                  </form>
                </div>
               </div>       
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>

<!-- modal düzenle -->
<div class="modal fade" id="modal-form-duzenle">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body wrapper-lg">
          <div class="row">
                <div class=" b-r">
                  <form data-validate="parsley" action="#">
                    <section class="panel panel-default">
                      <header class="panel-heading">
                          <span id="label4" class="h4">Kategori düzenle</span>
                      </header>
                      <div class="panel-body">
                        <p class="text-muted">Lütfen bilgileri giriniz</p>
                        <div id="disabled_div2" class="form-group">
                          <label>Üst Kategori adı:</label>
                          <input id="duzenle_adi_ust" type="text" class="form-control" data-required="true" disabled>                        
                        </div>
                        <div class="form-group">
                            <label id="label3">Kategori adı:</label>
                          <input id="duzenle_adi" type="text" class="form-control" data-required="true">                        
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
    function prepare_modal_yeni(state){
        $('#ekle_adi').val('');
        if(state === 1){
            // üst katg.
            $('#btn1').show();
            $('#btn2').hide();
            $('#disabled_div').hide();
            $('#label1').text("Kategori adı");
            $('#label2').text("Yeni kategori ekle");
        }
        else if(state===2){
            //alt katg.
            $('#btn1').hide();
            $('#btn2').show();
            $('#disabled_div').show();
            $('#label1').text("Alt Kategori adı");
            $('#label2').text("Yeni alt kategori ekle");
        }
    }
    function prepare_modal_duzenle(state){
        if(state === 1){
            // üst katg.
            $('#disabled_div2').hide();
            $('#label3').text("Kategori adı");
            $('#label4').text("Kategori düzenle");
        }
        else if(state===2){
            //alt katg.
            $('#disabled_div2').show();
            $('#label3').text("Alt Kategori adı");
            $('#label4').text("Alt kategori düzenle");
        }
    }
    
function ekleclick(){
        var ad = $('#ekle_adi').val();
        $.ajax({
            url: "ajaxcalls.php",
            type: "GET",
            dataType: "json",
            data: { method:'createKatg', adi:ad },
            contentType: 'application/json; charset=utf-8',
            success: function (e){
                //alert(e); 
                location.reload();
            },
            error: function(e){ alert(e.responseText);} 
        });
    }    
    function ekleclick_alt(){
        var ad = $('#ekle_adi').val();
        $.ajax({
            url: "ajaxcalls.php",
            type: "GET",
            dataType: "json",
            data: { method:'createAltKatg', adi:ad, ust_id:opened },
            contentType: 'application/json; charset=utf-8',
            success: function (e){
                //alert(e); 
                location.reload();
            },
            error: function(e){ alert(e.responseText);} 
        });
    } 
    function duzenleclick(_id, _adi, state){
        prepare_modal_duzenle(state);
        $('#duzenle_adi').val( _adi);
        $('#duzenlesubmit').click(function(){
        var yeni = $('#duzenle_adi').val();
        var method = '';    
        if(state===1) method='editKatg';
        else if(state===2) method='editAltKatg';
       // alert('edit: ' + _id + yeni);
            $.ajax({
                url: "ajaxcalls.php",
                type: "GET",
                dataType: "json",
                data: { method:method, id:_id, adi:yeni },
            contentType: 'application/json; charset=utf-8',
            success: function (e){
                location.reload();
            },
            error: function(e){ alert(e.responseText);} 
            });
        });
    }
    function deleteselected(){
        var chcks= $('input[name^="checks"]:checked');
        var a_chcks= $('input[name^="a_checks"]:checked');
        var nums = [];
        var a_nums = [];
        
        var lng=chcks.length;
        var a_lng=a_chcks.length;
        if(lng === 0 && a_lng===0)
            return;
        if(lng!==0){
        // numaraları al
        for ( var i = 0; i < lng; i = i + 1 ) {
            var x = $(chcks[i]).attr('name').slice(6);
            nums.push(x);
        }
        var method = "deleteKatg";
        $.ajax({
            url: "ajaxcalls.php",
            type: "GET",
            dataType: "json",
            data: { method:method, numbers:nums },
            contentType: 'application/json; charset=utf-8',
            success: function (e){
                if(a_lng ===0 )
                    location.reload();
            },
        });
        }
        if(a_lng!==0){
        // alt numaraları al
        for ( var i = 0; i < a_lng; i = i + 1 ) {
            var x = $(a_chcks[i]).attr('name').slice(8);
            a_nums.push(x);
        }
        var a_method = "deleteAltKatg";
        $.ajax({
            url: "ajaxcalls.php",
            type: "GET",
            dataType: "json",
            data: { method:a_method, numbers:a_nums },
            contentType: 'application/json; charset=utf-8',
            success: function (e){
                location.reload();
            } 
        });
    }
    }
</script>

<script>
    /// alt kategori açma işlemleri
    var opened = -1;
    $(document).ready(function(){
        $('#table').hide();
    });
    function sola(){
        $('i[id^="arrowright"]').removeClass( "text-active" ).addClass( "text" );
        $('i[id^="arrowleft"]').removeClass( "text" ).addClass( "text-active" );
    }
    function saga(){
        $('i[id^="arrowleft"]').removeClass( "text-active" ).addClass( "text" );
        $('i[id^="arrowright"]').removeClass( "text" ).addClass( "text-active" );
    }
    function sola_id(id){
        $('#arrowleft'+id).removeClass( "text" ).addClass( "text-active" );
        $('#arrowright'+id).removeClass( "text-active" ).addClass( "text" );
    }
    function saga_id(id){
        $('#arrowleft'+id).removeClass( "text-active" ).addClass( "text" );
        $('#arrowright'+id).removeClass( "text" ).addClass( "text-active" );
    }
    function showtable(id, name){
        if(opened === -1){
            //direk aç
            $('#table').animate({width:'show'});
            opened = id;
            sola_id(id);
        }
        else if(id===opened){
            //kapat
            $('#table').animate({width:'hide'});
            opened = -1;
            saga_id(id);
        }
        else{
            saga();
            //kapat
            $('#table').animate({width:'hide'});
            //aç
            $('#table').animate({width:'show'});
            opened = id;
            sola_id(id);
        }
        $('#ust_adi').val(name);
        $('#duzenle_adi_ust').val(name);
        
        $.ajax({
            url: "ajaxcalls.php",
            type: "GET",
            dataType: "json",
            data: { method:'getAltKategori', ust_id:id },
            contentType: 'application/json; charset=utf-8',
            success: function (e){
                //alert(e["liste"][0]["id"]); 
                var builder = '<table class="table table-striped m-b-none">'+
                        '<thead><tr>'+
                            '<th width="20"><label class="checkbox m-n i-checks"><input type="checkbox"><i style="margin-left: -2px"></i></label></th>'+
                            '<th width="20"></th>'+
                            '<th >Alt Kategori ('+ name +')</th>'+
                            '<th width="60"><a href="#modal-form-yeni" onclick="prepare_modal_yeni(2)" data-toggle="modal" class="btn btn-sm btn-default"><i class="fa fa-plus"></i> Yeni</a></th>'+
                          '</tr></thead>'+
                        '<tbody>';
                for(var i=0; i<e["liste"].length; i++){
                    builder += '<tr>'+
                                '<td><label class="checkbox m-n i-checks"><input type="checkbox" name="a_checks'+e["liste"][i]["id"]+'"><i style="margin-left: -2px;"></i></label></td>'+
                                '<td><a href="#modal-form-duzenle" style="width: 30px; height: 30px" data-toggle="modal" onclick="duzenleclick('+ e["liste"][i]["id"] + ',\''+ e["liste"][i]["isim"] +'\',2)" ><i class="fa fa-edit text-muted"></i></a></td>'+
                                '<td>'+e["liste"][i]["isim"]+'</td>'+
                                '<td></td>'+
                            '</tr>';
                }
        builder += '</tbody>'+
                      '</table>';
                $('#innertable').html(builder);           
               // location.reload();
            },
            error: function(e){ alert(e.responseText);} 
        });
    }
</script>
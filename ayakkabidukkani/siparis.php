
<?php
include '/Includes/session_control.php';
    include '/Includes/header.php';
    require_once dirname(__FILE__).'../Model/DataModel/Siparis_DataModel.php';
    require_once dirname(__FILE__).'../Model/DataModel/SiparisUrunu_DataModel.php';
    require_once dirname(__FILE__).'../Model/DataModel/Uye_DataModel.php';
    
    $sip_id = $_GET['sip_id'];
    $dm_sip = new Siparis_DataModel();
    $siparis = $dm_sip->getByID($sip_id);
    
?>

<div id="main">
    <div id="content" class="float_r">
        <h1>Sipariş ayrıntıları</h1>
        <p>
            Durumu : <strong> <?php if($siparis->onaylandi==='1') echo 'Onaylandı'; else echo 'Onaylanmadı'; ?> </strong>
        </p>
        <p>
            Sipariş Tarihi : <strong> <?php echo $siparis->siparis_tarihi; ?> </strong>
        </p>
        	<table width="680px" cellspacing="0" cellpadding="5">
                   	<tr bgcolor="#ddd">
                        	<th width="220" align="left"> </th> 
                        	<th width="180" align="left">Ürün adı </th> 
                       	  	<th width="40" align="center">Adet </th> 
                        	<th width="80" align="right">Birim Fiyatı </th> 
                        	<th width="80" align="right">Toplam </th> 
                        	
                        </tr>
                        <?php
                        
                        $dm_sipurunu = new SiparisUrunu_DataModel();
                        $urunler = $dm_sipurunu->getAll($sip_id);
                        $geneltoplam = 0;
                        foreach ($urunler as $u) {
                        ?>
                        
                        <tr>
                            <td><img src="images/urunler/<?php echo $u->urun->resim ?>" alt="image 1" style="height: 150px;" /></td> 
                            <td><a href="urundetay.php?id=1" rel="nofollow"> <?php echo $u->urun->isim ?> </a></td> 
                            <td align="center"><?php echo $u->adet ?> </td>
                            <td align="right"><?php echo $u->urun->fiyat." TL" ?> </td> 
                            <td align="right" style="color: black; font-size: 15px"> <strong> <?php $tt = $u->urun->fiyat * $u->adet; echo $tt." TL"; $geneltoplam+=$tt; ?> </strong> </td>
                            		</tr>
                        
                        <?php } ?>
                    	<tr>
                            <td colspan="3" align="right"  height="30px"></td>
                            <td align="right" style="background:#ddd; font-weight:bold"> Genel Toplam </td>
                            <td align="right" style="background:#ddd; font-size: 15px"> <strong> <?php echo $geneltoplam.' TL'; ?> </strong> </td>
                            <td style="background:#ddd; font-weight:bold"> </td>
						</tr>
					</table>
                    <div style="float:right; width: 215px; margin-top: 20px;">
                    
                    	
                    </div>
    </div> 
    <div class="cleaner"></div>
    
</div>

<?php
    include '/Includes/footer.php';
?>
<script>
    function kaldir(id){
        $.ajax({
            url: "ajaxcalls.php",
            type: "GET",
            dataType: "json",
            data: { method:'sepUrunKaldir', sep_urun_id: id },
            contentType: 'application/json; charset=utf-8',
            success: function (e){
                //alert(e["state"]);
                location.reload();
            },
            error: function(e){ alert(e.responseText);} 
            });
    }
</script>

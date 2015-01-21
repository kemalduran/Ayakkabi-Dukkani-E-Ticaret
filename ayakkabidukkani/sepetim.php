
<?php
include '/Includes/session_control.php';
    include '/Includes/header.php';
    require_once dirname(__FILE__).'../Model/DataModel/Sepet_DataModel.php';
    require_once dirname(__FILE__).'../Model/DataModel/SepetUrunu_DataModel.php';
    
    if(isset( $_GET['action'])){
        include '/Includes/session_control.php';
        if($_GET['action'] == 'add'){
            $urun_id = $_POST['urun_id'];
            $adet = $_POST['adet'];
            
            $musteri_id = $_SESSION['uye_id'];
            $dm_spt = new Sepet_DataModel();
            $spt_id = $dm_spt->getByMusteriID($musteri_id)->id;
            
            $dm_spturn = new SepetUrunu_DataModel();
            $spturn = new SepetUrunu();
            $spturn->adet = $adet;
            $spturn->sepet_id = $spt_id;
            $spturn->urun_id = $urun_id;
            
            $dm_spturn->insert($spturn);
            
        }
        echo '<script type="text/javascript">'
            , 'location.replace("sepetim.php");'
            , '</script>';
    }
    
?>

<div id="main">
    <div id="content" class="float_r">
        <h1>Sepetim</h1>
        	<table width="680px" cellspacing="0" cellpadding="5">
                   	<tr bgcolor="#ddd">
                        	<th width="220" align="left"> </th> 
                        	<th width="180" align="left">Ürün adı </th> 
                       	  	<th width="40" align="center">Adet </th> 
                        	<th width="80" align="right">Birim Fiyatı </th> 
                        	<th width="80" align="right">Toplam </th> 
                        	<th width="80"> </th>
                            
                        </tr>
                        <?php
                        $musteri_id = $_SESSION['uye_id'];
                        $dm_sepet = new Sepet_DataModel();
                        $sepet = $dm_sepet->getByMusteriID($musteri_id);
                        $dm_sepeturun = new SepetUrunu_DataModel();
                        $urunler = $dm_sepeturun->getAll($sepet->id);
                        $geneltoplam = 0;
                        foreach ($urunler as $u) {
                        ?>
                        
                        <tr>
                            <td><img src="images/urunler/<?php echo $u->urun->resim ?>" alt="image 1" style="height: 150px;" /></td> 
                            <td><a href="urundetay.php?id=1" rel="nofollow"> <?php echo $u->urun->isim ?> </a></td> 
                            <td align="center"><?php echo $u->adet ?> </td>
                            <td align="right"><?php echo $u->urun->fiyat." TL" ?> </td> 
                            <td align="right" style="color: black; font-size: 15px"> <strong> <?php $tt = $u->urun->fiyat * $u->adet; echo $tt." TL"; $geneltoplam+=$tt; ?> </strong> </td>
                            <td align="center"> <a onclick="kaldir(<?php echo $u->id; ?>)" href="#"><img src="images/remove_x.gif" alt="remove" style="height: 18px" /><br />Kaldır</a> </td>
						</tr>
                        
                        <?php } ?>
                    	<tr>
                            <td colspan="3" align="right"  height="30px">Sepetinizi değiştirdiyseniz lütfen sayfayı <a onclick="location.reload()"><strong>yenileyiniz</strong></a>&nbsp;&nbsp;</td>
                            <td align="right" style="background:#ddd; font-weight:bold"> Genel Toplam </td>
                            <td align="right" style="background:#ddd; font-size: 15px"> <strong> <?php echo $geneltoplam.' TL'; ?> </strong> </td>
                            <td style="background:#ddd; font-weight:bold"> </td>
						</tr>
					</table>
                    <div style="float:right; width: 215px; margin-top: 20px;">
                    
                        <?php if(count($urunler) != 0){ ?>
                        <p>
                            <button onclick="location.replace('siparisver.php')" style="font-weight: 500; border-radius: 2px; color: #fff; background-color: #177bbb; border-color: #177bbb; min-width: 140px; margin-bottom: 6px; padding: 6px 12px; font-size: 16px; vertical-align: middle;">
                                Sipariş Ver</button>
                        </p>
                        <?php } ?>
                        <p><a href="index.php">Alışverişe devam et</a></p>
                    	
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

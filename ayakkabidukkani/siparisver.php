
<?php
include '/Includes/session_control.php';
    include '/Includes/header.php';
   require_once dirname(__FILE__).'../Model/DataModel/Sepet_DataModel.php';
    require_once dirname(__FILE__).'../Model/DataModel/SepetUrunu_DataModel.php';
?>

<div id="main">
    <div id="content" class="float_r">
        <h1>Siparişi onayla</h1>
        	
        <table width="680px" cellspacing="0" cellpadding="5">
                   	<tr bgcolor="#ddd">
                        	<th width="220" align="left"> </th> 
                        	<th width="180" align="left">Ürün adı </th> 
                       	  	<th width="40" align="center">Adet </th> 
                        	<th width="80" align="right">Birim Fiyatı </th> 
                        	<th width="80" align="right">Toplam </th>
                            
                        </tr>
                        <?php
                        $musteri_id = $_SESSION['uye_id'];
                        $dm_sepet = new Sepet_DataModel();
                        $sepet = $dm_sepet->getByMusteriID($musteri_id);
                        $dm_sepeturunu = new SepetUrunu_DataModel();
                        $urunler = $dm_sepeturunu->getAll($sepet->id);
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
                    
                        <p>
                            <button onclick="location.replace('siparissonuc.php')" style="font-weight: 500; border-radius: 2px; color: #fff; background-color: #177bbb; border-color: #177bbb; min-width: 160px; margin-bottom: 6px; padding: 6px 12px; font-size: 16px; vertical-align: middle;">
                                Siparişi Onaylıyorum</button>
                        </p>
                    	
                    </div>
        
    </div> 
    <div class="cleaner"></div>
    
</div>

<?php
    include '/Includes/footer.php';
?>


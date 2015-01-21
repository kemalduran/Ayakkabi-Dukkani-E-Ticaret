<?php
    include '/Includes/header.php';
    $urun_id = $_GET['id'];
    $dm_urun = new Urun_DataModel();
    $urun = $dm_urun->getByID($urun_id);
    
?>

<script>
    document.title = "<?php echo $urun->isim; ?>";
</script>

<div id="main">
    <div id="content" class="float_r">
            <h1><?php echo $urun->isim ?></h1>
            <div class="content_half float_l">
        	<a  rel="lightbox[portfolio]" href="images/product/10_l.jpg"><img src="images/urunler/<?php echo $urun->resim; ?>" alt="image" style="width:300px; max-height: 320px;" /></a>
            </div>
            <form id="form1" action="sepetim.php?action=add" method="post">
            <div class="content_half float_r">
                <table>
                    <tr>
                        <td width="160">Fiyat:</td>
                        <td style="color:black; font-size: 22px;"><strong><?php echo $urun->fiyat; ?> TL</strong></td>
                    </tr>
                    <tr>
                        <td>Stok Durumu:</td>
                        <td> <?php if($urun->stokSayisi == 0) echo 'Stokta yok';
                            else echo 'Stokta var';
                        ?></td>
                    </tr>
                    <tr>
                        <td>Markası:</td>
                        <td><?php echo $urun->marka_adi ?> <input type="hidden" name="urun_id" value="<?php echo $urun->id ?>"></input> </td>
                    </tr>
                    <tr>
                    	<td>Adet</td>
                        <td><input name="adet" type="number" value="1" style="width: 36px; text-align: right" /></td>
                    </tr>
                </table>
                <div class="cleaner h20"></div>

                <?php if($urun->stokSayisi != 0){ ?>
                
                    <a class="addtocart" href="javascript:{}" onclick="document.getElementById('form1').submit();"></a>
                
                <?php } ?>
			</div>
            
            <div class="cleaner h30"></div>
            </form>
            <table>
                <tr>
                    <td valign="middle">
                        <img src="images/info.png" style="width: 20px; height: 20px;" />
                    </td>
                    <td valign="middle" >
                        <h5>Ürün Açıklaması</h5>
                    </td>
            </tr>
            </table>
            <p> <?php echo $urun->aciklama ?> </p>	
            
          <div class="cleaner h50"></div>
            <h3>Benzer Ürünler</h3>
            
            <?php
                $dm_urun = new Urun_DataModel();
                $urunler = $dm_urun->getAll();
                $count = 1;
                foreach ($urunler as $u) {
                    if($u->altKat_id == $urun->altKat_id && $u->id != $urun->id){  ?>
                        <div class="product_box">
                            <a href="urundetay.php?id=<?php echo $u->id; ?>"><img src="images/urunler/<?php echo $u->resim; ?>" alt="" style="width: 200px;" /></a>
                            <h3> <a href="urundetay.php?id=<?php echo $u->id; ?>"> <?php echo $u->isim ?> </a></h3>
                        <p class="product_price"> <?php echo $u->fiyat." TL" ?> </p>
                        <a href="shoppingcart.html" class="addtocart"></a>
                        <a href="urundetay.php?id=<?php echo $u->id; ?>" class="detail"></a>
                        </div>
                    <?php if($count%3==0){ echo '<div class="cleaner"></div>'; } $count++; ?>
                    <?php } } ?>
            
        </div> 
    
</div>

<?php
    include '/Includes/footer.php';
?>
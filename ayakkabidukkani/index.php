
<?php
    include '/Includes/header.php';
    require_once dirname(__FILE__).'../Model/DataModel/Kampanya_DataModel.php';
?>

<div id="main">
     <div id="content" class="float_r">
        	<div id="slider-wrapper">
                <div id="slider" class="nivoSlider">
                    <?php
                        $dm_kamp = new Kampanya_DataModel();
                        $kamps = $dm_kamp->getAll();
                        foreach ($kamps as $kk) {
                    ?>
                    <a href="#"><img src="images/slider/<?php echo $kk->resim ?>" alt="" title="<?php echo $kk->aciklama ?>" /></a>
                    
                        <?php } ?>
                </div>
            </div>
            <script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
            <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
            <script type="text/javascript">
            $(window).load(function() {
                $('#slider').nivoSlider();
            });
            </script>
            <h1>En Ucuz Ayakkabılar</h1>
            <?php
                $dm_urun = new Urun_DataModel();
                $urunler = $dm_urun->getAll();
                $count = 1;
                foreach ($urunler as $u) {
                    
            ?>
            <div class="product_box">
                <h3><a class="urunadi" href="urundetay.php?id=<?php echo $u->id ?>" > <?php echo substr($u->isim,0,30); if(strlen($u->isim) >=30) echo "...";  ?> </a></h3>
            	<a href="urundetay.php?id=<?php echo $u->id ?>"><img src="images/urunler/<?php echo $u->resim; ?>" alt="shoe" style="height: 150px; width: 150x" /></a>
                <p><?php echo substr($u->aciklama, 0, 60)."..." ?></p>
                <p class="product_price"><?php echo $u->fiyat." TL" ?></p>
                <?php if($u->stokSayisi != 0){ ?>
                <a href="urundetay.php?id=<?php echo $u->id ?>" class="addtocart"></a>
                <?php } ?>
                <a href="urundetay.php?id=<?php echo $u->id ?>" class="detail"></a>
            </div> 
            <?php if($count%3 == 0){ ?>
                <div class="cleaner"></div>
            <?php }; ?>
            <?php $count++; }; ?>
             	
        </div> 
        <div class="cleaner"></div>
    
</div>

<?php
    include '/Includes/footer.php';
?>

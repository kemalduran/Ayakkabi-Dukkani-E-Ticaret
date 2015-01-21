
<?php
    include '/Includes/header.php';
    
    $katg = NULL;
    $altkat = NULL;
    $mark = NULL;
    if(isset($_GET["kategori"]))
        $katg = $_GET["kategori"];
    if(isset($_GET["altkategori"]))
        $altkat = $_GET["altkategori"];
    if(isset($_GET["markaid"]))
        $mark = $_GET["markaid"];
    
    // filtreleme
    function control($urun, $katg, $altkat, $mark) {
        if($altkat != NULL){
            if($urun->altKat_id == $altkat)
                return true;
        }
        elseif ($katg != NULL) {
            $dm_altk = new AltKategori_DataModel();
            $alt = $dm_altk->getByID($urun->altKat_id);
            if($alt->ust_id == $katg)
                return true;
        }
        else if($mark != NULL){
            if($urun->marka_id == $mark)
                return TRUE;
        }
        return false;
    }
?>

<div id="main">
    
    <div class="allbrands">
        <?php
            $dm_marka = new Marka_DataModel();
            $markalar = $dm_marka->getAll();
            $dm_urun = new Urun_DataModel();
            $urunler = $dm_urun->getAll();
            foreach ($markalar as $mm) {
                
                    $sayi = markaAdet($mm->id, $urunler);
                    $str = $mm->marka_adi." <strong> (".$sayi.")</strong>";
                    echo '<a href="urunler.php?markaid='.$mm->id.'"> '.$str.' </a>';
                
            }
            
            function markaAdet($marka_id, $urnler) {
                $cnt = 0;
                foreach ($urnler as $u) {
                    if($u->marka_id == $marka_id)
                       $cnt++;
                }
                return $cnt;
            }
            
        ?>
    </div>
    <img src="images/all-brands.png" style="width: 680px; margin-bottom: 20px;" />
        
    <div id="content" class="float_r">
    <h3>
        <?php
        if ($katg != NULL) {
                $dm_kat = new Kategori_DataModel();
                $str = $dm_kat->getByID($katg)->isim." Ayakkabıları";
                echo '<a href="urunler.php?kategori='.$katg.'">'. $str .'</a>';
            }    
        if($altkat != NULL){
                $dm_altk = new AltKategori_DataModel();
                $alt = $dm_altk->getByID($altkat);
                $dm_kat = new Kategori_DataModel();
                $kt = $dm_kat->getByID($alt->ust_id);
                $str1 = $kt->isim." Ayakkabıları";
                echo '<a href="urunler.php?kategori='.$kt->id.'">'. $str1 .'</a>';
                echo " -> ";
                echo '<a href="urunler.php?altkategori='.$altkat.'">'. $alt->isim .'</a>';
            }    
        ?>
    </h3>
            <?php
                $dm_urun = new Urun_DataModel();
                $urunler = $dm_urun->getAll();
                $count = 1;
                foreach ($urunler as $u) {
                    if( control($u,  $katg, $altkat, $mark)){
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
                    <?php $count++; }}; ?>
             	
        </div> 
        <div class="cleaner"></div>
    
</div>

<?php
    include '/Includes/footer.php';
?>

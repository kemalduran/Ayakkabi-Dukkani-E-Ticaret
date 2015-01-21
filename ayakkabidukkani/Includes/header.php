
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title> Ayakkabı Dükkanı | En Ucuzu Burada</title>
    <meta name="keywords" content="ayakkabı, alışveriş, en ucuz, online, site" />
    <meta name="description" content="Ayakkabı Dükkanı php ile yapılmış basit bir e-ticaret sitesidir." />
    <link rel="icon" type="image/ico" href="favicon.ico" />
    
    <link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="css/mycss.css" />

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"> </script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "top_nav", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>
</head>
<body>
    <?php
    require_once dirname(__FILE__).'../../Model/DataModel/Kategori_DataModel.php';
    require_once dirname(__FILE__).'../../Model/DataModel/AltKategori_DataModel.php';
    require_once dirname(__FILE__).'../../Model/DataModel/Urun_DataModel.php';
    require_once dirname(__FILE__).'../../Model/DataModel/Marka_DataModel.php';
    require_once dirname(__FILE__).'../../Model/DataModel/Sepet_DataModel.php';
    require_once dirname(__FILE__).'../../Model/DataModel/SepetUrunu_DataModel.php';
    ?>
<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">

	<div id="templatemo_header">
    	<div id="site_title"><h1><a href="index.php"></a></h1></div>
        <div id="header_right" style="min-width: 210px;">
        <?php if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        if(!isset($_SESSION['login_uye'])){ ?>	
            <p>
                <a href="kayit.php">Yeni Üye</a> | <a href="giris.php">Üye Girişi</a> |
	        <a href="#">Yardım</a></p>
        <?php } ?>
        <?php if(isset($_SESSION['login_uye'])){ ?>	
            <p>
                    Merhaba <a href="#"><?php echo $_SESSION['username']; ?></a> | <a href="cikis.php">Çıkış</a> |
                    <a href="siparislerim.php">Siparişlerim</a> | <a href="#">Hesabım</a> | <a href="#">Yardım</a></p>
        <?php } ?>
                
            <p>
            	Sepetim: <strong> 
                <?php 
                if(!isset($_SESSION['login_uye'])){
                    echo '0';
                }
                else{
                $musteri_id = $_SESSION['uye_id'];
                $dm_sepet = new Sepet_DataModel();
                $sepet = $dm_sepet->getByMusteriID($musteri_id);
                $dm_sepeturunu_h = new SepetUrunu_DataModel();
                $ogeler = $dm_sepeturunu_h->getAll($sepet->id);
                echo count($ogeler);
                
                }
                
                ?>  öğe</strong> ( <a href="sepetim.php">Sepete Git</a> )
			</p>
		</div>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_header -->
    
    <div id="templatemo_menubar">
    	<div id="top_nav" class="ddsmoothmenu">
            <ul>
                <li><a href="index.php" class="selected">Ana Sayfa</a></li>
                <li><a href="#">Ürünler</a>
                    
                    <ul>
                        <?php 
                        $dm = new Kategori_DataModel();
                        $dm_alt = new AltKategori_DataModel();
                        $katgs = $dm->getAll();
                        foreach ($katgs as $k) {
                            ?>
                            <li>
				<a href="urunler.php?kategori=<?php echo $k->id; ?>"><?php echo $k->isim; ?></a>
				<ul>
                                    <?php  $alts = $dm_alt->getAllByParent($k->id);
                                            foreach ($alts as $alt) {
                                    ?>
                                            <li><a href="urunler.php?altkategori=<?php echo $alt->id ?>"> <?php echo $alt->isim;  ?> </a></li>
                                    <?php } ?>
				</ul>
                            </li>
                        <?php } 
                        ?>
                        
                        
                  </ul>
                </li>
                <li><a href="hakkinda.php">Hakkında</a>
                   
                </li>
                <li><a href="sss.php">S.S.S.</a></li>
                <li><a href="iletisim.php">İletişim</a></li>
            </ul>
            <br style="clear: left" />
        </div> <!-- end of ddsmoothmenu -->
        <div id="templatemo_search">
            <form action="#" method="get">
              <input type="text" value=" " name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
              <input type="submit" name="Search" value=" " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
            </form>
        </div>
    </div> <!-- END of templatemo_menubar -->
    
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
            
            <?php
                foreach ($katgs as $k) {
                $index_num = 0;
            ?>
                <div class="sidebar_box"><span class="bottom"></span>
                    <a href="urunler.php?kategori=<?php echo $k->id ?>"><h3>  <?php echo $k->isim; ?> Ayakkabıları </h3></a>   
                <div class="content"> 
                    <ul class="sidebar_list">
                        <?php 
                            $alts = $dm_alt->getAllByParent($k->id);
                            $index_last = count($alts)-1;
                        foreach ($alts as $alt) {
                            ?>
                        <?php
                            if($index_num == 0){
                        ?>
                        <li class="first"><a href="urunler.php?altkategori=<?php echo $alt->id; ?>"> <?php echo $alt->isim; ?> </a></li>
                            <?php }
                            else if($index_num == $index_last){
                            ?>
                                <li class="last"><a href="urunler.php?altkategori=<?php echo $alt->id; ?>"> <?php echo $alt->isim;?> </a></li>
                            <?php } else{ ?>
                                <li><a href="urunler.php?altkategori=<?php echo $alt->id; ?>"> <?php echo $alt->isim; ?> </a></li> 
                            <?php }?>    
                        <?php $index_num++; } ?>
                    </ul>
                </div>
                </div>
            <?php 
                
                } ?>
            
            
            <div class="sidebar_box"><span class="bottom"></span>
            	<h3>Çok Satanlar </h3>   
                <div class="content"> 
                    <?php 
                        $dm_urun = new Urun_DataModel();
                        $coks = $dm_urun->getAllOrderBy(6, "satisSayisi", "desc");
                        foreach ($coks as $c) {
                    ?>
                    <div class="bs_box">
                    	<a href="urundetay.php?id=<?php echo $c->id; ?>"><img src="images/urunler/<?php echo $c->resim; ?>" alt="image" style="width: 58px; height: 58px;" /></a>
                        <h4><a href="urundetay.php?id=<?php echo $c->id; ?>"><?php echo $c->isim; ?></a></h4>
                        <p class="price"><?php echo $c->fiyat." TL"; ?></p>
                        <div class="cleaner"></div>
                    </div>
                    
                    <?php }?>
                </div>
            </div>
        </div>
        <div id="content" class="float_r">
        

    
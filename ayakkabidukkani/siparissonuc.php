
<?php
include '/Includes/session_control.php';
    include '/Includes/header.php';
    require_once dirname(__FILE__).'../Model/DataModel/Sepet_DataModel.php';
    require_once dirname(__FILE__).'../Model/DataModel/SepetUrunu_DataModel.php';
    require_once dirname(__FILE__).'../Model/DataModel/Siparis_DataModel.php';
    require_once dirname(__FILE__).'../Model/DataModel/SiparisUrunu_DataModel.php';
    
    $dm_sepet = new Sepet_DataModel();
    $dm_siparis = new Siparis_DataModel();
    
    $musteri_id = $_SESSION['uye_id'];
    $sepet = $dm_sepet->getByMusteriID($musteri_id);
    $dm_sepeturunu = new SepetUrunu_DataModel();
    $dm_sipurunu = new SiparisUrunu_DataModel();
    
    // siparişleri oluştur
    // sepetten siparişe aktar
    $urunler = $dm_sepeturunu->getAll($sepet->id);
    $sip = new Siparis();
    $sip->adres = $sepet->musteri->adres;
    $sip->musteri_id = $sepet->musteri_id;
    $sip->onaylandi = 0;
    $dt = new DateTime();
    $dtstr = $dt->format('Y-m-d');
    $sip->siparis_tarihi = $dtstr;
    $toplam = 0;
    foreach ($urunler as $u) {
        $toplam += $u->adet*$u->urun->fiyat;
    }
    $sip->toplam_fiyat = $toplam;
    $inserted = $dm_siparis->insert($sip);
    
    foreach ($urunler as $u) {
        $sip_urun = new SiparisUrunu();
        $sip_urun->urun_id = $u->urun_id;
        $sip_urun->adet = $u->adet;
        $sip_urun->birim_fiyat = $u->urun->fiyat;
        $sip_urun->siparis_id = $inserted;
        $dm_sipurunu->insert($sip_urun);
    }
    
    // sepeti sil
    foreach ($urunler as $u) {
        $dm_sepeturunu->delete($u);
    }
    $dm_sepet->delete($sepet);
    $spt = new Sepet();
    $spt->musteri_id = $musteri_id;
    $dm_sepet->insert($spt);
    
?>

<div id="main">
    <div id="content" class="float_r">
        <h1>Siparişiniz alındı</h1>
        <p>
            Siparişiniz en yakın zamanda adresinize teslim edilecektir.
        </p>
        <p>
            Bizi tercih ettiğiniz için teşekkür ederiz.
        </p>
        <p>
            Siparişlerinizi <a href="siparislerim.php">buradan</a> takip edebilirsiniz.
        </p>
        
        
    </div> 
    <div class="cleaner"></div>
    
</div>

<?php
    include '/Includes/footer.php';
?>


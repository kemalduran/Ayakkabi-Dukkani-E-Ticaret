<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Kaydol</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/icon.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />  
    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body class="" >
  <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
    <div class="container aside-xl">
      <div class="navbar-logo block" style="margin-bottom: 4px;">
          <img src="images/logo.png" style="height: 50px;" />
          <label style="font-size: 16px; margin-left: 4px;"> <strong>Hesap Oluştur</strong> </label>
      </div>
      <section class="m-b-lg">
          <br/>
        <?php
        
        require_once dirname(__FILE__).'../../Model/DataModel/Sepet_DataModel.php';
        
        $ad = $_POST['ad'];
        $soyad = $_POST['soyad'];
        $email = $_POST['email'];
        $sifre = $_POST['sifre'];
        $adres = $_POST['adres'];
        
        $uye = new Uye();
        $uye->ad = $ad;
        $uye->soyad = $soyad;
        $uye->email = $email;
        $uye->sifre = $sifre;
        $uye->adres = $adres;
        
        $dt = new DateTime();
        $dtstr = $dt->format('Y-m-d');
        $uye->kayitTarihi = $dtstr;
        
        $dm = new Uye_DataModel();
        $uye_id = $dm->insert($uye);
        
        $dm_sepet = new Sepet_DataModel();
        $sepet = new Sepet();
        $sepet->musteri_id = $uye_id;
        $dm_sepet->insert($sepet);
        
        ?>
          <div align='center'>
        Tebrikler, kaydınız tamamlandı!
        <br/>
        <a href="giris.php">Buradan</a> giriş yapabilirsiniz.
        </div>
      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder clearfix">
      <p>
        <small>Kemal Duran<br>&copy; 2015
        </small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
  <script src="js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.js"></script>
  <!-- App -->
  <script src="js/app.js"></script>  
  <script src="js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/app.plugin.js"></script>
</body>
</html>
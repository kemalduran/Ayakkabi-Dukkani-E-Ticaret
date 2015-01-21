<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Hemen Kayıt Ol!</title>
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
        
          <form action="kayittamamla.php" method="post">
          <div class="list-group">
            <div class="list-group-item">
              <input name='ad' placeholder="Ad" required='true' class="form-control no-border">
            </div>
            <div class="list-group-item">
              <input name='soyad' placeholder="Soyad" required='true' class="form-control no-border">
            </div>
            <div class="list-group-item">
              <input name='email' type="email" placeholder="E-posta" required='true' class="form-control no-border">
            </div>
            <div class="list-group-item">
               <input name='sifre' type="password" required='true' placeholder="Şifre" class="form-control no-border">
            </div>
            <div class="list-group-item">
              <input name='adres' placeholder="Adres" required='true' class="form-control no-border">
            </div>
          </div>
          
          <button type="submit" class="btn btn-lg btn-primary btn-block">Kayıt ol</button>
          <div class="line line-dashed"></div>
          <p class="text-muted text-center"><small>Zaten hesabınız var mı?</small></p>
          <a href="giris.php" class="btn btn-lg btn-default btn-block">Giriş yap</a>
        </form>
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
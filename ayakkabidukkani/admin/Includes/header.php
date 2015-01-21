
<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>Admin | Ayakkabı Dükkanı</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/icon.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />  
  <link rel="stylesheet" href="js/chosen/chosen.css" type="text/css" />
  
  <link rel="stylesheet" href="js/nestable/nestable.css" type="text/css" />
    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body class="" >
     <?php
     include '/Includes/session_control.php';
    require_once dirname(__FILE__).'../../../Model/DataModel/Kategori_DataModel.php';
    require_once dirname(__FILE__).'../../../Model/DataModel/AltKategori_DataModel.php';
    require_once dirname(__FILE__).'../../../Model/DataModel/Kategori_DataModel.php';
    require_once dirname(__FILE__).'../../../Model/DataModel/Urun_DataModel.php';
    require_once dirname(__FILE__).'../../../Model/DataModel/Marka_DataModel.php';
    require_once dirname(__FILE__).'../../../Model/DataModel/Siparis_DataModel.php';
    ?>
    
  <section class="vbox">
    <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
      <div class="navbar-header aside-md dk">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="fa fa-bars"></i>
        </a>
        <a href="index.php" class="navbar-brand">
          <img src="images/logo.png" class="m-r-sm" alt="scale">
              <span class="hidden-nav-xs" style="font-size: 14px">Admin Paneli</span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
      <ul class="nav navbar-nav hidden-xs">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="i i-grid"></i>
          </a>
          <section class="dropdown-menu aside-lg bg-white on animated fadeInLeft">
            <div class="row m-l-none m-r-none m-t m-b text-center">
              <div class="col-xs-4">
                <div class="padder-v">
                    <a href="../index.php">
                    <span class="m-b-xs block">
                        <img src="./../images/home.png" style="width: 26px" />
                      
                    </span>
                    <small class="text-muted">Ana Sayfa</small>
                  </a>
                </div>
              </div>
            </div>
          </section>
        </li>
      </ul>
      <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-sm bg-white b-white btn-icon"><i class="fa fa-search"></i></button>
            </span>
            <input type="text" class="form-control input-sm no-border" placeholder="Ürünlerde ara...">            
          </div>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
        <li class="hidden-xs">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="i i-chat3"></i>
            <span class="badge badge-sm up bg-danger count">0</span>
          </a>
          <section class="dropdown-menu aside-xl animated flipInY">
            <section class="panel bg-white">
              <div class="panel-heading b-light bg-light">
                <strong>You have <span class="count">0</span> notifications</strong>
              </div>
              <div class="list-group list-group-alt">
                
              </div>
              <div class="panel-footer text-sm">
                <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
              </div>
            </section>
          </section>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
              <img src="images/admin-icon.png" alt="...">
            </span>
            <?php echo $_SESSION['username']; ?> <b class="caret"></b>
          </a>
          <ul class="dropdown-menu animated fadeInRight">            
            
            <li class="divider"></li>
            <li>
              <a href="cikis.php" >Çıkış</a>
            </li>
          </ul>
        </li>
      </ul>      
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-black aside-md hidden-print hidden-xs" id="nav">          
          <section class="vbox">
            <section class="w-f scrollablesol">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                <div class="clearfix wrapper dk nav-user hidden-xs">
                  <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <span class="thumb avatar pull-left m-r">                        
                        <img src="images/admin-icon.png" class="dker" alt="...">
                        <i class="on md b-black"></i>
                      </span>
                      <span class="hidden-nav-xs clear">
                        <span class="block m-t-xs">
                          <strong class="font-bold text-lt"> <?php echo $_SESSION['username']; ?> </strong> 
                          <b class="caret"></b>
                        </span>
                        <span class="text-muted text-xs block">Admin</span>
                      </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">                      
                     
                      <li class="divider"></li>
                      <li>
                        <a href="cikis.php" >Çıkış</a>
                      </li>
                    </ul>
                  </div>
                </div>                


                <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                    <ul class="nav nav-main" data-ride="collapse">
                        <li>
                            <a href="index.php" class="auto">
                        <i class="fa fa-dashboard">
                        </i>
                        <span class="font-bold">Dashboard</span>
                      </a>
                        </li>
                    </ul>
                    <div class="line dk hidden-nav-xs"></div>
                    <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Menüler</div>
                  <ul class="nav nav-main" data-ride="collapse">
                    <li >
                      <a href="siparisler.php" class="auto">
                        <i class="fa fa-envelope-o">
                        </i>
                        <b class="badge bg-danger pull-right"><?php $dm_siparis = new Siparis_DataModel(); $ii = $dm_siparis->getUnReadedNumber(); echo $ii ?></b>
                        <span class="font-bold">Siparişler</span>
                      </a>
                    </li>
                    <li >
                      <a href="urunler.php" class="auto">
                        <i class="fa fa-tags">
                        </i>
                        <span class="font-bold">Ürünler</span>
                      </a>
                    </li>
                    <li >
                      <a href="kategoriler.php" class="auto">
                            <i class="i i-grid2 icon">
                        </i>
                        <span class="font-bold">Kategoriler</span>
                      </a>
                    </li>
                    <li >
                      <a href="markalar.php" class="auto">
                        <i class="i i-docs icon">
                        </i>
                        <span class="font-bold">Markalar</span>
                      </a>
                    </li>
                    <li >
                      <a href="kampanyalar.php" class="auto">
                        <i class="i i-statistics icon">
                        </i>
                        <span class="font-bold">Kampanyalar</span>
                      </a>
                    </li>
                  </ul>
                  <div class="line dk hidden-nav-xs"></div>
                  
                </nav>
                <!-- / nav -->
              </div>
            </section>
            
            <footer class="footer hidden-xs no-padder text-center-nav-xs">
              <a href="modal.lockme.html" data-toggle="ajaxModal" class="btn btn-icon icon-muted btn-inactive pull-right m-l-xs m-r-xs hidden-nav-xs">
                <i class="i i-logout"></i>
              </a>
              <a href="#nav" data-toggle="class:nav-xs" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs">
                <i class="i i-circleleft text"></i>
                <i class="i i-circleright text-active"></i>
              </a>
            </footer>
          </section>
        </aside>
        <!-- /.aside -->
      
              
                  
               
                

<?php
    include '/Includes/header.php';
    //require_once dirname(__FILE__).'../../Model/DataModel/Urun_DataModel.php';
?>

 <section id="content">
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                <section class="scrollable padder">              
                  <section class="row m-b-md">
                    <div class="col-sm-6">
                      <h3 class="m-b-xs text-black">Dashboard</h3>
                      <small>Hoşgeldiniz, John Smith </small>
                    </div>
                   
                  </section>
                      
                  <div class="row bg-light dk m-b">
                    <div class="col-md-6 dker">
                      <section>
                        <header class="font-bold padder-v">
                          <div class="pull-right">
                            <div class="btn-group">
                              <button data-toggle="dropdown" class="btn btn-sm btn-rounded btn-default dropdown-toggle">
                                <span class="dropdown-label">Week</span> 
                                <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu dropdown-select">
                                  <li><a href="#"><input type="radio" name="b">Month</a></li>
                                  <li><a href="#"><input type="radio" name="b">Week</a></li>
                                  <li><a href="#"><input type="radio" name="b">Day</a></li>
                              </ul>
                            </div>
                              <a onclick="asd()" href="#" class="btn btn-default btn-icon btn-rounded btn-sm">Go</a>
                          </div>
                          <table>
                              <tr>
                                  <td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(101,181,194);overflow:hidden"></div></div></td>
                                  <td class="legendLabel" style="padding-right: 6px">Yeni üye</td>
                                  <td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(35,100,158);overflow:hidden"></div></div></td>
                                  <td class="legendLabel">Sipariş sayısı</td>
                              </tr>
                          </table>
                        </header>
                        <div class="panel-body">
                          <div id="flot-sp1ine" style="height:210px"></div>
                        </div>
                        <div class="row text-center no-gutter">
                          <div class="col-xs-3">
                            <span class="h4 font-bold m-t block">5</span>
                            <small class="text-muted m-b block">Sipariş</small>
                          </div>
                          <div class="col-xs-3">
                            <span class="h4 font-bold m-t block">11</span>
                            <small class="text-muted m-b block">Satış</small>
                          </div>
                          <div class="col-xs-3">
                            <span class="h4 font-bold m-t block">21</span>
                            <small class="text-muted m-b block">Ürün</small>
                          </div>
                          <div class="col-xs-3">
                            <span class="h4 font-bold m-t block">35</span>
                            <small class="text-muted m-b block">Üye</small>                        
                          </div>
                        </div>
                      </section>
                    </div>
                    <div class="col-md-6">
                      <section>
                        <header class="font-bold padder-v">
                          <div class="btn-group pull-right">
                            <button data-toggle="dropdown" class="btn btn-sm btn-rounded btn-default dropdown-toggle">
                              <span class="dropdown-label">Last 24 Hours</span> 
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-select">
                                <li><a href="#"><input type="radio" name="a">Today</a></li>
                                <li><a href="#"><input type="radio" name="a">Yesterday</a></li>
                                <li><a href="#"><input type="radio" name="a">Last 24 Hours</a></li>
                                <li><a href="#"><input type="radio" name="a">Last 7 Days</a></li>
                                <li><a href="#"><input type="radio" name="a">Last 30 days</a></li>
                                <li><a href="#"><input type="radio" name="a">Last Month</a></li>
                                <li><a href="#"><input type="radio" name="a">All Time</a></li>
                            </ul>
                          </div>
                          En çok satanlar
                        </header>
                        <div class="panel-body flot-legend">
                          <div id="flot-pie-donut"  style="height:240px"></div>
                        </div>
                      </section>
                    </div>
                  </div>
                
                </section>
              </section>
            </section>
            <!-- side content -->
           
            <!-- / side content -->
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>

<?php
    include '/Includes/footer.php';
?>
  <!-- App -->
 
   
 
  <script src="js/charts/flot/jquery.flot.min.js"></script>
  <script src="js/charts/flot/jquery.flot.tooltip.min.js"></script>
  <script src="js/charts/flot/jquery.flot.spline.js"></script>
  <script src="js/charts/flot/jquery.flot.pie.min.js"></script>
  <script src="js/charts/flot/dashboard.js"></script>


  <script src="js/app.plugin.js"></script>
  <script>
      function asd(){
  $.ajax({
        url: "dashboard_json.php",
        type: "GET",
        dataType: "json",
        data: { method:"asd" },
        contentType: 'application/json; charset=utf-8',
        success: function (e){
            alert(e[0]["label"]);
        },
        error: function(e){ alert(e.responseText);} 
    });
    }
    </script>
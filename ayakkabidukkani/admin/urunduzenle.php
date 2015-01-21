<?php
    include '/Includes/header.php';
    //require_once dirname(__FILE__).'../../Model/DataModel/Urun_DataModel.php';
    
?>

<section id="content">
          <section class="vbox">
            <header class="header bg-light lt b-b b-light">
                <p class="h4 font-thin pull-left m-r m-b-sm">Ürünler</p>
                <a href="urunler.php" class="btn btn-sm btn-info btn-rounded btn-icon"><i class="fa fa-tags"></i></a>
              
              
            </header>
            <section class="scrollable wrapper">
    
               <div class="row">
                <div class="col-sm-10">
                  <form data-validate="parsley" action="#">
                    <section class="panel panel-default">
                      <header class="panel-heading">
                        <span class="h4">Ürün bilgileri</span>
                      </header>
                      <div class="panel-body">
                          <p class="text-muted"><h4><strong>6</strong> adet satıldı </h4> </p>
                        <div class="form-group">
                          <label>Ürün ismi:</label>
                          <input type="text" class="form-control" data-required="true">                        
                        </div>
                       
                    <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                            <label >Marka seçiniz</label>
                            <div >
                                <select style="width:260px" class="chosen-select">
                                <option value="CA">California</option>
                                <option value="NV">Nevada</option>
                                <option value="OR">Oregon</option>
                                <option value="WA">Washington</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label >Kategori seçiniz</label>
                            <div >
                                  <select style="width:260px" class="chosen-select">
                            <optgroup label="Kadın Ayakkabıları">
                                <option value="AK">Alaska</option>
                                <option value="HI">Hawaii</option>
                            </optgroup>
                            <optgroup label="Erkek Ayakkabıları">
                                <option value="CA">California</option>
                                <option value="NV">Nevada</option>
                                <option value="OR">Oregon</option>
                                <option value="WA">Washington</option>
                            </optgroup>
                            <optgroup label="Çocuk Ayakkabıları">
                                <option value="AZ">Arizona</option>
                                <option value="CO">Colorado</option>
                                <option value="ID">Idaho</option>
                                <option value="MT">Montana</option><option value="NE">Nebraska</option>
                                <option value="NM">New Mexico</option>
                                <option value="ND">North Dakota</option>
                                <option value="UT">Utah</option>
                                <option value="WY">Wyoming</option>
                            </optgroup>
                        </select>
                   
                            </div>
                        </div>
                      
                    </div>
                        
                        <div class="form-group pull-in clearfix">
                            <div class="col-sm-6">
                                <label>Stok sayısı</label>
                                <input type="number" class="form-control" placeholder="0" data-required="true">
                            </div>
                            <div class="col-sm-6">
                                <label>Fiyatı</label>
                                <div class="input-group m-b">
                                    <span class="input-group-addon">$</span>
                                    <input type="text" class="form-control">
                                    <span class="input-group-addon">.00</span>
                                </div>
                            </div>
                        </div>
                    <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                            <label >Ürün görseli</label>
                            <div >
                                <input type="file" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <img src="../images/urunler/Spor_4127313.jpg" style="height: 85px;" />
                        </div>
                    </div>
                         
                    <div class="line line-dashed b-b line-lg pull-in"></div>

                    <div class="form-group">
                      <label >Ürün açıklaması</label>
                      <div >
                        <div class="btn-toolbar m-b-sm btn-editor" data-role="editor-toolbar" data-target="#editor">
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                              <ul class="dropdown-menu">
                              </ul>
                          </div>
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                              <ul class="dropdown-menu">
                              <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
                              <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
                              <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
                              </ul>
                          </div>
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                          </div>
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                          </div>
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                          </div>
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                            <div class="dropdown-menu">
                              <div class="input-group m-l-xs m-r-xs">
                                <input class="form-control input-sm" placeholder="URL" type="text" data-edit="createLink"/>
                                <div class="input-group-btn">
                                  <button class="btn btn-default btn-sm" type="button">Add</button>
                                </div>
                              </div>
                            </div>
                            <a class="btn btn-default btn-sm" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                          </div>
                          
                          <div class="btn-group hide">
                            <a class="btn btn-default btn-sm" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                          </div>
                          <div class="btn-group">
                            <a class="btn btn-default btn-sm" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                            <a class="btn btn-default btn-sm" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                          </div>
                        </div>
                        <div id="editor" class="form-control" style="overflow:scroll;height:260px;max-height:350px">
                          Go ahead&hellip;
                        </div>
                      </div>
                    </div>
                      </div>
                      <footer class="panel-footer text-right bg-light lter">
                       
                        <button class="btn btn-default">İptal</button>
                        <button type="submit" class="btn btn-primary">Değişiklikleri kaydet</button>
                     
                        
                      </footer>
                    </section>
                  </form>
                </div>
               </div>
                
                </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>

<?php
    include '/Includes/footer.php';
?>

 <!-- parsley -->
<script src="js/parsley/parsley.min.js"></script>
<script src="js/parsley/parsley.extend.js"></script>
  <script src="js/app.plugin.js"></script>
  
  <!-- wysiwyg -->
  <script src="js/wysiwyg/jquery.hotkeys.js"></script>
  <script src="js/wysiwyg/bootstrap-wysiwyg.js"></script>
  <script src="js/wysiwyg/demo.js"></script>
  <!-- markdown -->
  <script src="js/markdown/epiceditor.min.js"></script>
  <script src="js/markdown/demo.js"></script>

    <!-- file input -->  
  <script src="js/file-input/bootstrap-filestyle.min.js"></script>
  
  <script src="js/chosen/chosen.jquery.min.js"></script>
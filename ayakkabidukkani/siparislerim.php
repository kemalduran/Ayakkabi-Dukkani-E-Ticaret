
<?php
include '/Includes/session_control.php';
    include '/Includes/header.php';
    require_once dirname(__FILE__).'../Model/DataModel/Siparis_DataModel.php';
    require_once dirname(__FILE__).'../Model/DataModel/SiparisUrunu_DataModel.php';
    require_once dirname(__FILE__).'../Model/DataModel/Uye_DataModel.php';
?>

<div id="main">
    <div id="content" class="float_r">
        <h1>Siparişlerim</h1>
        	<table width="680px" cellspacing="0" cellpadding="5">
                   	<tr bgcolor="#ddd">
                            <th width="60" align="center"> </th>
                        	<th width="60" align="left">Veriliş Tarihi </th> 
                       	  	<th width="60" align="center">Durumu </th> 
                        	<th width="60" align="center">Toplam Fiyatı </th>
                                
                        </tr>
                        <?php
                        $musteri_id = $_SESSION['uye_id'];
                        $dm = new Siparis_DataModel();
                        $sips = $dm->getAllByMusteri($musteri_id);
                        $i = 1;
                        foreach ($sips as $sip) {
                        
                        ?>
                        <tr>
                            <td align="center"> <a href="siparis.php?sip_id=<?php echo $sip->id ?>"> Sipariş <?php echo $i ?> </a> </td>
                            <td><?php echo $sip->siparis_tarihi ?></td> 
                            <td align="center"> <?php if($sip->onaylandi==='1') echo "Onaylandı"; else echo 'Onaylanmadı'; ?> </td>
                            <td align="center"> <?php echo $sip->toplam_fiyat." TL" ?> </td> 
                        </tr>
                        <?php $i++; } ?>
                        
                </table>
    </div> 
    <div class="cleaner"></div>
    
</div>

<?php
    include '/Includes/footer.php';
?>
<script>
    function kaldir(id){
        $.ajax({
            url: "ajaxcalls.php",
            type: "GET",
            dataType: "json",
            data: { method:'sepUrunKaldir', sep_urun_id: id },
            contentType: 'application/json; charset=utf-8',
            success: function (e){
                //alert(e["state"]);
                location.reload();
            },
            error: function(e){ alert(e.responseText);} 
            });
    }
</script>

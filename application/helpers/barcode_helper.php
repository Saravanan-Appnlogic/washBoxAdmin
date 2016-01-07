<?php
    function barcode($data,$identifier)
    {
        $script=site_url()."application/assets/plugins/barcode";
        echo '<script src="'.$script.'/EAN_UPC.js"></script><script src="'.$script.'/CODE128.js"></script><script src="'.$script.'/JsBarcode.js"></script>';
        echo '<script>$("'.$identifier.'").JsBarcode("'.$data.'",{displayValue:true});</script>';
    }
?>
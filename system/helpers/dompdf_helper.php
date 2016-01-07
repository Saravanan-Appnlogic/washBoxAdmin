<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function pdf_create($html,$acc_no, $filename='', $stream=TRUE) 
{
    require_once("dompdf/dompdf_config.inc.php");
    $date=date("m/d/Y");
    $html = stripslashes($html);
    $acc_no=$acc_no[0]['ACCOUNT_NUMBER'];
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    //$dompdf->set_paper($_POST["paper"], $_POST["orientation"]);
    $dompdf->render();

  $dompdf->stream("$acc_no($date).pdf", array("Attachment" => true));
    
    
    
    //$dompdf = new DOMPDF();
    //$dompdf->load_html($html);
    //$dompdf->render();
    //if ($stream) {
    //    $dompdf->stream($filename.".pdf");
    //} else {
    //    return $dompdf->output();
    //}
}

//function pdf_create($html, $filename='', $stream=TRUE) 
//{
//    require_once("dompdf/dompdf_config.inc.php");
//    $savein = 'uploads/';
//    $dompdf = new DOMPDF();
//    $dompdf->load_html($html);
//    $dompdf->render();
//    $canvas = $dompdf->get_canvas();
//    $font = Font_Metrics::get_font("arial", "normal","12px");
//
//    // the same call as in my previous example
//    $canvas->page_text(540, 773, "Page {PAGE_NUM} of {PAGE_COUNT}",
//                   $font, 6, array(0,0,0));
//
//    $pdf = $dompdf->output();      // gets the PDF as a string
//
//    file_put_contents($savein.str_replace("/","-",$filename), $pdf);    // save the pdf file on server
//    unset($html);
//    unset($dompdf); 
//
//}
?>
<?php

//by using third party module to generate PDF format file

namespace SimpleLibrary;

defined('SAFE_CALL') OR exit('No direct script access allowed');

require_once('../third_party/tcpdf/tcpdf.php');
require_once 'Simple_Log.php';

use SimpleLibrary\Simple_Log;

class Simple_PDF{
    private $filename;
    private $header ;
    private $footer ;
    private $content ; 

    
    private function init_class() {
    }
    
    public function set_filename($source_header){
        $this->header = $source_header ;
    }

    public function set_header($source_header){
        $this->header = $source_header ;
    }

    public function set_footer($source_footer){
        $this->footer = $source_footer ;
    }
    
    public function set_contect($source_content){
        $this->content = $source_content ;
    }
    
    public function __construct($source_file_name ,$source_header, $source_footer, $source_content) {
        $this->init_class(); 
        $this->set_filename($source_file_name);
        $this->set_header($source_header);
        $this->set_footer($source_footer);
        $this->set_contect($source_content);
    }

    
}
/*

    function prepare_header(){
        $logo = '../assest/images/default.jpg';
        $company_name = 'PUBLIC GOLD MARKETING SDN BHD (930830-K)';
        $company_add = 'PLOT 21, TECHNOPLEX, MEDAN BAYAN LEPAS, TAMAN PERINDUSTRIAN BAYAN LEPAS, PHASE IV, 11900 BAYAN LEPAS,PENANG, MALAYSIA';
        $company_phone = '+604-643 9999';
        $company_fax = '+604-646 4916';
        $company_email = 'enquiry@publicgold.com.my';
        $company_web_url = 'http://www.publicgold.com.my';
        $company_gst_code = '000484327424';
        
        $document_title = 'Proforma Tax Invoice';
        
        $return_value = <<<EOD
        <div style="text-align:center">
        
        </div>
        <table border="0" cellspacing="0" style="text-align:center">
        <tr>
            <th><img src="$logo" alt="public gold logo" width="200" height="50" border="0" /></th>
        </tr>
        <tr>
            <th><h1>$company_name</h1></th>
        </tr>
        <tr>
            <td>$company_add <br /></td>
        </tr>
        <tr>
            <td>
                <table border="0" cellspacing="5" >
                    <tr>
                        <td style="text-align:right">Phone : $company_phone&nbsp;</td>
                        <td style="text-align:left">Fax : $company_fax </td>
                    </tr>
                    <tr>
                        <td style="text-align:right">Email : $company_email&nbsp;</td>
                        <td style="text-align:left">Website : $company_web_url </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>(GST Reg No : $company_gst_code)<br /></td>
        </tr>
        </table>
        

EOD;
        return $return_value ; 
        
    }

    function pdf_gen(){
        $pdf_title = '';
        $pdf_author = 'Public Gold Marketing Sdn Bhd';
        $pdf_subject = 'some document';
        $pdf_keywords = 'testing, document';
        
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor($pdf_author);
        $pdf->SetTitle($pdf_title);
        $pdf->SetSubject($pdf_subject);
        $pdf->SetKeywords($pdf_keywords);
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
$pdf->SetFont('dejavusans', '', 11);
    $pdf->AddPage(); 
    $logo = '../assest/images/default.jpg';
  
    // set text shadow effect
    //$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));    
  
    $test = 100 +15 ; 
    // Set some content to print
    $header = prepare_header();
    $html = <<<EOD
    $header ; 
    test
EOD;
  
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);   
//$pdf->Line(20, 129, 195, 129);
  
    // ---------------------------------------------------------    
  
    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.
    $now = date("Ymd").date("His");
    $path = getcwd().'/report';
    echo $path;
    //$pdf->Output('e'.$now.'.pdf', 'I');    
    $pdf->Output($path.'/e'.$now.'.pdf', 'F');
    //============================================================+
    // END OF FILE
    //============================================================+
    }
*/
?>
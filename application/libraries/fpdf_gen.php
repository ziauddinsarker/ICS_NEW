<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Name:  FPDF
 *
 * Description:  This is a Codeigniter library which allows you to generate a PDF with the FPDF library
 *
 */

class Fpdf_gen {

    public function __construct() {

        require_once APPPATH.'third_party/fpdf/fpdf.php';

        $pdf = new FPDF();
        $pdf->AddPage();

        $CI =& get_instance();
        $CI->fpdf = $pdf;

    }

}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fpdf_test extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('fpdf_gen');

    }
    /**
     * Example: FPDF
     *
     * Documentation:
     * http://www.fpdf.org/ > Manual
     *
     */
    public function index() {
        /*
         *Header
         */
        //Title
        $this->fpdf->SetTitle("ICS - PDF Output");
        //Set Font for Header
        $this->fpdf->setFont('Arial','',10);
        $this->fpdf->setFillColor(255,255,255);
        $this->fpdf->cell(100,6,"SIMURA Non-Wovens Limited",0,0,'L',1);
        $this->fpdf->cell(90,6,"Date : " . date('d/m/Y'),0,1,'R',1);
        //Set header Image
       // $this->fpdf->Image(base_url().'assets/images/logo.png', 10, 25,'25','15','png');

        $this->fpdf->cell(100,6,' ',0,1,'L',1);
        $this->fpdf->SetFontSize(20);
        $this->fpdf->SetFont('Arial','U');
        $this->fpdf->cell(0,6,"SIMURA Non-Wovens Limited",0,0,'C',1);
        $this->fpdf->cell(100,6,' ',0,1,'L',1);
        //$this->fpdf->SetLineWidth(1);
        //$this->fpdf->Line(20, 30,20, 30);

        $this->fpdf->SetFont('Arial','','');
        $this->fpdf->SetFontSize(10);
        $this->fpdf->cell(0,6,"Hoouse #109, Masjid Road, Old DOHS, Banani, Dhaka-1206, Bangladesh.",0,0,'C',1);
        $this->fpdf->cell(100,6,' ',0,1,'L',1);
        $this->fpdf->cell(0,6,"Contact person: Md. Nizam Uddin,  Tel: +88-01717919009,",0,0,'C',1);
        $this->fpdf->cell(100,6,' ',0,1,'L',1);
        $this->fpdf->cell(0,6,"Mail: merchandiser03@simuragroup.com , Website: www.simuranonwovens.com",0,0,'C',1);
        $this->fpdf->cell(100,6,' ',0,1,'C',1);
        $this->fpdf->SetFontSize(15);
        $this->fpdf->SetFillColor(200,220,255);
        $this->fpdf->cell(0,6,"Price List",0,0,'C',1);

        $this->fpdf->cell(100,6,' ',0,1,'L',1);
        $this->fpdf->setFont('Arial','',10);
        $this->fpdf->setFillColor(255,255,255);
        $this->fpdf->cell(100,6,"Time of Shipment:",0,0,'L',1);

        $this->fpdf->cell(100,6,' ',0,1,'L',1);
        $this->fpdf->setFont('Arial','',10);
        $this->fpdf->setFillColor(255,255,255);
        $this->fpdf->cell(100,6,"Term of Payment:",0,0,'L',1);

        $this->fpdf->cell(100,6,' ',0,1,'L',1);
        $this->fpdf->setFont('Arial','',10);
        $this->fpdf->setFillColor(255,255,255);
        $this->fpdf->cell(100,6,"Validity Time:",0,0,'L',1);

        $this->fpdf->Ln(12);
        $this->fpdf->setFont('Arial','',14);
        $this->fpdf->setFillColor(255,255,255);
        $this->fpdf->cell(25,6,'',0,0,'C',0);
        $this->fpdf->cell(100,6,' ',0,1,'L',1);
        $this->fpdf->cell(100,6,' ',0,1,'L',1);

        $this->fpdf->Ln(5);
        $this->fpdf->setFont('Arial','',10);
        $this->fpdf->SetFillColor(200,220,255);

        /**
         * Content
         *
         */
        $this->fpdf->cell(20,6,'Item No.',1,0,'C',1);
        $this->fpdf->cell(45,6,'Size.',1,0,'C',1);
        $this->fpdf->cell(20,6,'Color.',1,0,'C',1);
        $this->fpdf->cell(40,6,'Material.',1,0,'C',1);
        $this->fpdf->cell(25,6,'Qty.',1,0,'C',1);
        $this->fpdf->cell(40,6,'Picture.',1,0,'C',1);

        //Database
        $ppnw_costing_id = $this->uri->segment(3);
        //var_dump($ppnw_costing_id);
        $this->db->select('tbl_order_rev_id, tbl_dimension_body_height_total,tbl_dimension_body_width_total,tbl_dimension_body_panel_total');
        $this->db->from('ppnw_costing_rev');
        $this->db->where('tbl_order_rev_id',$ppnw_costing_id);
        $query = $this->db->get();
        $n = $query->result();
       // var_dump($n);


        foreach($n as $q)
        {
            //$id = $q["tbl_order_rev_id"];
            $height = $q["tbl_dimension_body_height_total"];

            $this->fpdf->cell(100,6,' ',0,1,'L',1);
            $this->fpdf->setFont('Arial','',10);
            $this->fpdf->setFillColor(255,255,255);
            $this->fpdf->cell(40,6,$height,1,0,'C',1);
            //echo $id;
            //echo $height;
        }



        /**
         * Footer
         */
        $this->fpdf->AliasNbPages();
        $this->fpdf->SetFont('Times','',12);

        $this->fpdf->Output();

        //echo $this->fpdf->Output('ics.pdf','D');
    }

    /**
     *
     */
    function header()
    {
        // Select Arial bold 15
        $this->fpdf->SetFont('Arial','B',15);
        // Move to the right
        $this->fpdf->Cell(80);
        // Framed title
        $this->fpdf->Cell(30,10,'Title',1,0,'C');
        // Line break
        $this->fpdf->Ln(20);
    }

    /**
     *
     */
    function footer()

    {
        // Go to 1.5 cm from bottom
        $this->fpdf->SetY(-15);
        // Select Arial italic 8
        $this->fpdf->SetFont('Arial','I',8);
        // Print centered page number
        $this->fpdf->Cell(0,10,'Page '.$this->fpdf->PageNo(),0,0,'C');
    }
}

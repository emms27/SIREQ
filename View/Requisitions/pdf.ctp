<?php 
/**
 * @version 1.0
 * @author Emmanuel Sánchez Carreón
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 */
App::import('Vendor','tcpdf/config/lang/spa'); 
App::import('Vendor','tcpdf/tcpdf'); 

class XTCPDF  extends TCPDF { 
 function Header(){} 
 function Footer(){
  $this->SetY(-15);  $this->SetFont('helvetica','I',8);    $this->SetTextColor(120);
  $this->Cell(0,10,'Honorable Tribunal Superior de Justicia del Estado de Puebla.',0,0,'L');$this->Ln(3);
  $this->Cell(0,10,'Ciudad Judicial Siglo XXI PerifÃ©rico Ecológico Arco Sur No. 4000, San AndrÃ©s Cholula, Puebla. |  TelÃ©fono: (222) 223.84.00',0,0,'L');
  $this->Cell(0,10,'PÃ¡gina '.$this->PageNo(),0,0,'R');   //NÃºmero de pÃ¡gina
  $this->Ln(3);
 }

 function Encabezado($orden) {
  $this->Ln(4);
  $urlogo='../webroot/img/logos/pj.jpg';
  $this->Image($urlogo,'15','7',99,30, 'JPG', 
               'http://www.htsjpuebla.gob.mx','',false, 150, '', false, false,'', false, false, false); 
  $this->SetFont('times','',11); 
  $style = array(
    'position' => '',
    'align' => 'R',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => 'R',
    'border' => false,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => false,
    'font' => 'times',
    'fontsize' => 14,
    'stretchtext' => 3
  );
  $this->Cell(93);  $codebar=$this->write1DBarcode($orden['Requisition']['id'], 'C39', '', '',82,12,'', $style, 'N'); 
  $this->Cell(30); $this->Cell(110,5,'Requisicion:',0,0,'R'); $this->Cell(50,5,$orden['Requisition']['id'],0,0,'L'); $this->Ln(5);
  $this->Cell(30); $this->Cell(110,5,'Fecha:',0,0,'R'); $this->Cell(50,5,$orden['Requisition']['fecha_registro'],0,0,'L'); $this->Ln(5);
  $this->Cell(30); $this->Cell(110,5,'Status:',0,0,'R'); $this->Cell(50,5,$orden['Requisition']['status'],0,0,'L');
 }

 function Title(){
  $this->Ln(20);
  $this->SetFont('times','B',10);
  $this->Cell(6.5); $this->Cell(180,5,"AL C.",0,0,'L');  $this->Ln(10);
  $this->Cell(6.5); $this->Cell(180,5,"DIRECTOR GENERAL DE ADMINISTRACION DEL ",0,0,'L');  $this->Ln(5);
  $this->Cell(6.5); $this->Cell(180,5,"H. TRIBUNAL SUPERIOR DE JUSTICIA DEL ESTADO",0,0,'L');  $this->Ln(5);
  $this->Cell(6.5); $this->Cell(180,5,"DEPARTAMENTO DE ALMACEN",0,0,'L');  $this->Ln(10);	 	 	 	 
  //$this->SetFont('arial','',10);
  $this->SetFont('times','B',10);
$this->Cell(6.5); $this->Cell(180,5,"P R E S E N T E",0,0,'L');  $this->Ln(15);	 
 }


 function Cuerpo($orden,$fecha,$user,$product){
  $stotal=0;
  $this->SetFont('Times','B',11); $this->Ln(15);
  $assignment=strtoupper($orden['AssignmentPersonal']['Assignment']['descripcion']);
  $this->Cell(202,5,$assignment,0,0,'L');  $this->Ln(10);
  $texto="           Se solicita los siguientes productos para el buen funcionamiento del juzgado:";
  $this->SetFont('times','',10);
  $this->MultiCell(202,6,$texto,'0','J'); $this->Ln(10);
  $this->SetFont('times','',8);
  $this->Cell(326.9,5,$fecha,0,0,'R');  $this->Ln(5);
  $this->SetFillColor(107,107,107); 
  $this->SetTextColor(255);
  $this->SetDrawColor(0,0,0);
  $this->SetLineWidth(.1);

  $w=array(6,13,140,27,18,23,22);
  $header=array('#','CLAVE','PRODUCTO','CATEGORIA','CANTIDAD');


  for($i=0;$i<count($header);$i++) $this->Cell($w[$i],5,$header[$i],1,0,'C',1);
  $this->Ln(5);

  $this->SetFillColor(224,235,255);
  $this->SetTextColor(0);
  $this->SetFont('times','',8);
  $j=1;  $fill=false;

  foreach ($product as $prequisition):
   $this->Cell($w[0],5,$j,1,0,'C',1,$fill); 
   $this->Cell($w[1],5,$prequisition['Product']['clave'],1,0,'C',$fill);
   $this->Cell($w[2],5,$prequisition['Product']['descripcion'],1,0,'C',$fill);
   $this->Cell($w[3],5,$prequisition['Product']['Categoria']['descripcion'],1,0,'C',$fill);
   $this->Cell($w[4],5,$prequisition['ProductRequisition']['cantidad'],1,0,'C',$fill);  
   $this->Ln(5); $j++; $fill=!$fill;
  endforeach;
 }  
	
}
 $fecha=$this->Dates->fechaActual();
 $filename='o'.$folio.'_'.date('dmY').'.pdf';
 $pdf = new XTCPDF('P','mm','LETTER', true, 'UTF-8', false);
 $pdf->SetCreator(PDF_CREATOR);
 $pdf->SetAuthor('L.I. Emmanuel Sánchez Carreón');
 $pdf->SetTitle('Honorable Tribunal Superior de Justicia del Estado de Puebla');
 $pdf->SetSubject('Requisicion');
 $pdf->SetKeywords('Almacen, Requisicion, SIREQ');

 $pdf->SetMargins(6,5, PDF_MARGIN_RIGHT,true);
 $pdf->SetHeaderMargin(0);
 $pdf->setLanguageArray($l);

 $pdf->AddPage();
 $markup = ob_get_clean();
 $pdf->Encabezado($row);
 $pdf->Cuerpo($row,$fecha,$user,$almacenproducts); 
 $pdf->Output($filename, 'I');
?>

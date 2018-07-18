<?php 
/**
 * View pdf para generar Orden de Pago.
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
  $this->Cell(0,10,'Palacio de Justicia   |  5 Oriente nÃºmero 9 col. Centro HistÃ³rico   |  TelÃ©fono(s): (222) 229.66.00',0,0,'L');
  $this->Cell(0,10,'PÃ¡gina '.$this->PageNo(),0,0,'R');   //NÃºmero de pÃ¡gina
  $this->Ln(3);
 }

 function Encabezado($juzgado,$orden) {
  $this->Ln(4);
  $urlogo='../webroot/img/logos/pj.jpg';
  $this->Image($urlogo,'15','10',32,30, 'JPG',
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
  $this->Cell(93);  $codebar=$this->write1DBarcode($orden['Aclaratorio']['id'], 'C39', '', '',95,12,'', $style, 'N'); 
  $this->Cell(30); $this->Cell(110,5,'Oficio Aclaratorio:',0,0,'R'); $this->Cell(50,5,$orden['Aclaratorio']['id'],0,0,'L'); $this->Ln(5);
  $this->Cell(30); $this->Cell(110,5,'Oficio:',0,0,'R'); $this->Cell(50,5,$orden['OrdenPago']['id'],0,0,'L'); $this->Ln(5);
  $this->Cell(30); $this->Cell(110,5,'Expediente:',0,0,'R'); $this->Cell(50,5,$orden['OrdenPago']['htsjpexpediente_id'],0,0,'L'); $this->Ln(5);
  $this->Cell(30); $this->Cell(110,5,'Asunto:',0,0,'R'); $this->MultiCell(50,5,'No fue posible dar tramite a su(s) oficio(s)',0,'L');
 }

 function Title($juzgado){
  $this->Ln(20);
  $this->SetFont('times','B',10);
  $this->Cell(6.5); $this->Cell(180,5,"AL C. JUEZ $juzgado",0,0,'L');  $this->Ln(10);	 
  //$this->SetFont('arial','',10);
  $this->SetFont('times','B',10);
$this->Cell(6.5); $this->Cell(180,5,"P R E S E N T E",0,0,'L');  $this->Ln(15);	 
 }


 function Cuerpo($importe,$orden,$fecha){
  $this->SetFont('Times','',12); $this->MultiCell(181.5,6,"           En atencion a su oficio numero ". $orden['Aclaratorio']['ddfmordenpago_id']." de fecha ".$fecha['registro']." recibido a esta oficina el dia ".$fecha['copia']." y con la finalidad de dar cumplimiento al Acuerdo fechado el dia ".$fecha['acuerdo'].", me permito solicitar a usted:",0,'J'); $this->Ln(15);
$this->SetFont('Times','B',12); $this->MultiCell(181.5,6,"               ".$orden['Aclaratorio']['descripcion'],0,'L');  $this->Ln(15);
$this->SetFont('Times','',12); $this->Cell(181.5,5,"               Para estar en posibilidad de realizar el tramite solicitado.",0,0,'L');  $this->Ln(37);

  $this->SetFont('Times','B',12);$this->Cell(186.5,5,"A T E N T A M E N T E",0,0,'C');  $this->Ln(5);
  $this->SetFont('Times','',10); $this->Cell(186.5,5,"H. Puebla de Zaragoza., a ".$fecha['hoy'],0,0,'C');  
  $this->Ln(40);
  $this->SetFont('Times','',8);
  $this->Cell(186.5,5,'________________________________________________________________________________',0,0,'C');
  $this->Ln(5);  
  $this->SetFont('Times','B',8); $this->Cell(186.5,5,'L.A. HECTOR EFREN HEREDIA SAUCEDO',0,0,'C'); $this->Ln(5);      
  $this->SetFont('Times','',8);
  $this->Cell(186.5,5,'JEFE DEL DEPARTAMENTO DE DEPOSITOS, FIANZAS Y MULTAS',0,0,'C'); $this->Ln(5);
  $this->Cell(186.5,5,'DEL HONORABLE TRIBUNAL SUPERIOR DE JUSTICIA',0,0,'C'); $this->Ln(15);
 }  
	
}
 $folio=$orden['OrdenPago']['id'];
 //$expediente=$orden['OrdenPago']['htsjpexpediente_id'];
 //$expediente=substr($orden, 4,-8);
 //$anio=substr($folio, 8,-4);  
 //$juzgado=substr($folio,0, -12);
 //$ordenid=substr($folio, 12);    
 //$beneficiario=$orden['Involucrado']['nombre'];
 $importe=$this->Number->currency($orden['OrdenPago']['importe'], '$').'MXP';
 $fdatereg=explode(' ',$orden['OrdenPago']['fecha_registro']);
 $fdatecop=explode(' ',$orden['OrdenPago']['fecha_copia']);
 $fdateacu=explode(' ',$orden['OrdenPago']['fecha_acuerdo']);
 $fdateOrden['hoy']=$this->Dates->fechaActual();
 $fdateOrden['registro']=$this->Dates->FormatoCompletoFechaPDF($fdatereg[0]);
 $fdateOrden['copia']=$this->Dates->FormatoCompletoFechaPDF($fdatecop[0]);
 $fdateOrden['acuerdo']=$this->Dates->FormatoCompletoFechaPDF($fdateacu[0]);
 $filename='o'.$folio.'_'.date('dmY').'.pdf';
 $juzdesc=strtoupper($juzgados['Juzgado']['descripcion']);

 $pdf = new XTCPDF('P','mm','LETTER', true, 'UTF-8', false);

 // set document information
 $pdf->SetCreator(PDF_CREATOR);
 $pdf->SetAuthor('L.I. Emmanuel Sánchez Carreón');
 $pdf->SetTitle('Honorable Tribunal Superior de Justicia del Estado de Puebla');
 $pdf->SetSubject('Orden de Pago');
 $pdf->SetKeywords('DDFM, Orden de pago, Expediente');

 $pdf->SetMargins(PDF_MARGIN_LEFT,5, PDF_MARGIN_RIGHT,true);
 $pdf->SetHeaderMargin(0);
 $pdf->setLanguageArray($l);

 $pdf->AddPage();
 $markup = ob_get_clean();
 $pdf->Encabezado($juzdesc,$orden);
 $pdf->Title($juzdesc);
 //$pdf->Title2($folio);
 $pdf->Cuerpo($importe,$orden,$fdateOrden); 
 $pdf->Output($filename, 'I');
?>

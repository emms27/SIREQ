<?php 
/**
 * View pdf para generar Ficha de Depósito.
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 * echo utf8_decode('Sánchez')
 */
App::import('Vendor','tcpdf/config/lang/spa');
App::import('Vendor','tcpdf/tcpdf'); 

class XTCPDF  extends TCPDF {
 function Header(){ }
 function Footer(){
  $this->SetY(-15);  $this->SetFont('helvetica','I',8);    $this->SetTextColor(120);
  $this->Cell(0,10,'Honorable Tribunal Superior de Justicia del Estado de Puebla.',0,0,'L');$this->Ln(3);
  $this->Cell(0,10,'Palacio de Justicia   |  5 Oriente número 9 col. Centro Histórico   |  Teléfono(s): (222) 229.66.00',0,0,'L');
  $this->Cell(0,10,'Página '.$this->PageNo(),0,0,'R');
  $this->Ln(3);
 }

 function Encabezado($fechas,$estado,$juzgado) {
  $urlogo='../webroot/img/logos/pj.jpg';
  $this->Image($urlogo,'15','4',83,25, 'JPG', 
               'http://www.htsjpuebla.gob.mx','',false, 150, '', false, false,'', false, false, false); 
  $this->Ln(15); $this->SetFont('times','',11);
  //$this->Cell(35); $this->Cell(143,8,$juzgado,0,0,'L'); 
  //$this->Ln(5);  $this->SetFont('times','B',11);
  $this->Cell(36); $this->Cell(143,8,"INFORME DE REQUISICIONES ".$estado." DEL ".$fechas['inicio'].$fechas['fin'],0,0,'L');
  $this->Ln(15); $this->SetFont('times','B',11);
  $this->Cell(0.1); $this->Cell(143,8,$juzgado,0,0,'L'); 
 } 

   
 
 function Cuerpo ($deposito,$fecha,$user,$estado){	  
   $this->Ln(3);
   $tenproceso=$trechazada=$tautorizada=$total=$tentregada=1;
   $this->SetFont('times','',8);
   $this->Cell(327.9,5,$fecha,0,0,'R');  $this->Ln(5);
   $this->SetFillColor(107,107,107); 
   $this->SetTextColor(255);
   $this->SetDrawColor(0,0,0);
   $this->SetLineWidth(.1);

   if ($user['Role']['id']!=3){
    $w=array(6,27,98,98,40,36,23);
    $header=array('#','REQUISICIÓN','ASIGNACIÓN','TITULAR','STATUS','REGISTRO','AUTORIZADA');  
   }

   for($i=0;$i<count($header);$i++){
    if ($i == 0) $this->Cell(0.1); 
    $this->Cell($w[$i],5,$header[$i],1,0,'C',1);
   }	 
   $this->Ln(5);
   //Restauración de colores y fuentes
   $this->SetFillColor(224,235,255);
   $this->SetTextColor(0);
   $this->SetFont('times','',9);

   $j=1;
   $fill=false;
   foreach ($deposito as $row): 
    if ($user['Role']['id']!=3){
     $this->Cell(0.1); $this->Cell($w[0],5,$j,1,0,'C', $fill);  
     $this->Cell($w[1],5,$row['Requisition']['id'],1,0,'C',  $fill);  
     $this->Cell($w[2],5,$row['AssignmentPersonal']['Assignment']['descripcion'],1,0,'C',  $fill);  
     $this->Cell($w[3],5,$row['AssignmentPersonal']['Personal']['namefull'],1,0,'C',  $fill);
     $this->Cell($w[4],5,$row['Requisition']['status'],1,0,'C',  $fill);  
//     $this->Cell(0.1); $this->Cell($w[7],5,'$'.$row['Requisition']['importe'],1,0,'C',  $fill);     
     $this->Cell($w[5],5,$row['Requisition']['fecha_registro'],1,0,'C',$fill);
     $fdateddfm=explode(' ',$row['Requisition']['fecha_autorizada']);
     $this->Cell($w[6],5,$fdateddfm[0],1,0,'C',$fill); 
    }else{
     $this->Cell(0.1); $this->Cell($w[0],5,$j,1,0,'C', $fill);  
    }
    $this->Ln(5);	
    $j++; $fill=!$fill;
    switch($row['Requisition']['status']){
     case 'En proceso': $tenproceso+=$tenproceso;  break;
     case 'Autorizada': $tautorizada+=$tautorizada;  break;
     case 'Rechazada': $trechazada+=$trechazada;  break;
     case 'Entregada': $tentregada+= $tentregada;    break;
     default: break;
    } 
   endforeach;
   //$total=$this->Number->currency($total, '$').'MXP';
   $this->Cell(256.9,15,'',1,0,'C'); 
   $this->Cell(29,15,'',1,0,'C');
   $this->Cell(42,15,'',1,0,'C'); $this->Ln(15);
   $this->SetFont('times','',10);
   $this->Cell(256.9,5,'',1,0,'C'); 
   if (($user['Role']['id']!=3) || (($user['Role']['id']==3) && ($estado==""))){
    $this->Cell(29,5,"En proceso",1,0,'R');
    $this->SetFont('times','B',10);$this->Cell(42,5,$tenproceso,1,0,'R');$this->Ln(5);	
    $this->SetFont('times','',10); $this->Cell(256.9,5,'',1,0,'C'); $this->Cell(29,5,"Autorizada",1,0,'R');
    $this->SetFont('times','B',10);$this->Cell(42,5,$tautorizada,1,0,'R');$this->Ln(5);
    $this->SetFont('times','',10); $this->Cell(256.9,5,'',1,0,'C'); $this->Cell(29,5,"Rechazada",1,0,'R');
    $this->SetFont('times','B',10);$this->Cell(42,5,$trechazada,1,0,'R');$this->Ln(5);
    $this->SetFont('times','',10); $this->Cell(256.9,5,'',1,0,'C'); $this->Cell(29,5,"Entregada",1,0,'R');
    $this->SetFont('times','B',10);$this->Cell(42,5,$tentregada,1,0,'R');$this->Ln(5);
    $this->SetFont('times','B',12);
    $this->Cell(256.9,5,'',1,0,'C'); 
   }
   $this->Cell(29,5,"TOTAL",1,0,'R'); 
   $this->Cell(42,5,$total,1,0,'R');$this->Ln(5);
  }
}

 $fde=explode('-',$rfecha['from']);
 $fa=explode('-',$rfecha['to']);
 $status=strtoupper($rfecha['status']);
 $jdesc=strtoupper($deposito['AssignmentPersonal']['Assignment']['descripcion']);
 $frango['inicio']=$fde[2].' DE '.strtoupper($this->Dates->mesObtener($fde[1])).' DE '.$fde[0];
 $frango['fin']='  A  '.$fa[2].' DE '.strtoupper($this->Dates->mesObtener($fa[1])).' DE '.$fa[0];
 $fecha=$this->Dates->fechaActual();
 $filename='c'.$folio.'_'.date('dmY').'.pdf';
 $pdf = new XTCPDF('L','mm',array(216,340), true, 'UTF-8', false);
 // set document information
 $pdf->SetCreator(PDF_CREATOR);
 $pdf->SetAuthor('L.I. Emmanuel Sanchez Carreon');
 $pdf->SetTitle('Honorable Tribunal Superior de Justicia del Estado de Puebla');
 $pdf->SetSubject('Requisiciones del mes');
 $pdf->SetKeywords('Requisiciones, PJ, Almacen');

 $pdf->SetMargins(7,5,7,true);
 $pdf->SetHeaderMargin(0);
 $pdf->setLanguageArray($l);

 $pdf->AddPage();
 $markup = ob_get_clean();
 $pdf->Encabezado($frango,$status,$jdesc);
 $pdf->Cuerpo($deposito,$fecha,$user,$status);
 $pdf->Output($filename, 'I'); 

?>

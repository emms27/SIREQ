<?php
/**
 * View alta almacenamiento de Depositos.
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 */
  //echo $xseek = $xarray[substr(100, 1, 2)];
  echo $this->Html->css(array('radio'));
  $fdateupdate=explode(' ',$ordenpago['Aclaratorio']['fecha_update']);
  $fdatealta=explode(' ',$ordenpago['Aclaratorio']['fecha_registro']);
  $fdatejuzgado=explode(' ',$ordenpago['Aclaratorio']['fecha_juzgado']);
  $fdatecancel=explode(' ',$ordenpago['Aclaratorio']['fecha_cancelacion']);
?>
<div class="breadcrumb">
       <?php
         echo $this->Html->link('', 
                                array('controller'=>'pages','action'=>'home'),
				array('title'=>'Inicio','escape' => false,'class'=>'icon-home'));
         echo '<span class="divider">/</span>';
         echo $this->Html->link('Orden de Pago', 
                                array('controller'=>'Aclaratorios','action'=>'index'),
				array('title'=>'Orden de Pago','escape' => false));
         echo '<span class="divider">/</span>';
         echo $this->Html->link('Consulta', 
                                array('controller'=>'Aclaratorios','action'=>'index'),
				array('title'=>'Consulta de Orden de Pago','escape' => false));
         echo '<span class="divider">/</span>';
         echo $this->Html->link('Vista', 
                                array('controller'=>'Aclaratorios','action'=>'index'),
				array('title'=>'Vista','escape' => false));
       ?>
</div><br><br>
<table border="0">
 <tr>
  <td width="4%" align="center">
   <?php echo $this->Html->image("icons/icon_view.png",array("width"=>"28px","height"=>"28px","border"=>"0")); ?>
  </td>
  <td width="96%"><h1>Consulta Oficios Aclaratorios</h1></td>
 </tr>
 <tr>
  <td colspan="2" class="arial11gris" align="left">
   La consulta de oficios aclaratorios muestra el estado que guarda dicha orden.<br><br>
  </td>
 </tr>
 <tr>
  <td colspan="2">

  </td>
 </tr>
</table>
       
<!--  Informacion General -->       
<table border="0" class="estado">
 <tr>
  <td>
   <table border="0" width="100%">
    <tr>
     <td width="86%"><span align="left" class="arial14cafe2">OFICIOS ACLARATORIOS</span></td>
     <td width="14%">
      <ul class="actions-tools">
       <li>
       <?php 
        //if ($ordenpago['Aclaratorio']['estado']=='Autorizada'):
	  echo $this->Html->link(__('Imprimir'), 
		  	array('action' => 'oficio_pdf',$ordenpago['Aclaratorio']['id']), 
          		array('class'=>'pdf','target'=>'_blank','title'=>'Imprimir Orden de Pago')
	  );				
	//endif;
       ?>
       </li>
      </ul>
     </td>
    </tr>
   </table>
  </td>
 </tr>
 <tr><td><hr color="#CC9933"></td></tr>
 <tr>
  <td><br>
   <table border="0" >
    <tr>
     <td width="65%">

     </td>
     <td width="35%">
      <table border="0" cellspacing="7">
       <tr>    
        <td width="8%" class="arial10gris"><div align="right">Núm. Aclaratorio:</div></td>
        <td width="27%" class="arial12magenta"> <?php echo $ordenpago['Aclaratorio']['id'];  ?> </td>
       </tr>
       <tr>    
        <td width="8%" class="arial10gris"><div align="right">Orden:</div></td>
        <td width="27%" class="arial12magenta">
	<?php 
            echo $this->Html->link($ordenpago['Aclaratorio']['ddfmordenpago_id'],    	  	                   
                      array('controller'=>'OrdenPagos','action' => 'view',$ordenpago['Aclaratorio']['ddfmordenpago_id']), 
		     array('escape' => false,'title'=>'Ver más del Beneficiario')); 
       ?>
        </td>
       </tr>
       <tr>    
        <td width="8%" class="arial10gris"><div align="right">Status:</div></td>
        <td width="27%" class="arial12magenta"><?php echo h($ordenpago['Aclaratorio']['estado']); ?></td>
       </tr>
       <tr>    
        <td width="8%" class="arial10gris"><div align="right">Aclaratorio Procedente:</div></td>
        <td width="27%" class="arial12magenta">
          <?php 
            echo $this->Html->link($ordenpago['Aclaratorio']['ddfmaclaratorio_id'],    	  	                   
                array('controller'=>'Aclaratorios','action' => 'view',$ordenpago['Aclaratorio']['ddfmaclaratorio_id']), 
		array('escape' => false,'title'=>'Ver Orden de Pago Procedente')); 
          ?>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table><br><br>
  </td>
 </tr>
 <tr>
  <td><h3>INFORMACIÓN DEL OFICIO</h3>
   <table border="0" class="accionvista">
    <tr>
     <th><span>Fecha de Registro:</span></th>
     <td><?php  echo $this->Dates->FormatoCompletoFecha($fdatealta[0]).'&nbsp;&nbsp;'.$fdatealta[1]; ?></td>
    </tr>
    <tr>
     <th><span>Fecha de Juzgado:</span></th>
     <td><?php  if (($ordenpago['Aclaratorio']['fecha_juzgado']!=NULL) &&
		    ($ordenpago['Aclaratorio']['fecha_juzgado']!="") &&
		    ($ordenpago['Aclaratorio']['fecha_juzgado']!="0000-00-00 00:00:00"))
                echo $this->Dates->FormatoCompletoFecha($fdatejuzgado[0]).'&nbsp;&nbsp;'.$fdatejuzgado[1];
         ?>
     </td>
    </tr>
    <tr>
     <th><span>Fecha de Cancelacion:</span></th>
     <td><?php  if (($ordenpago['Aclaratorio']['fecha_cancelacion']!=NULL) &&
		    ($ordenpago['Aclaratorio']['fecha_cancelacion']!="") &&
		    ($ordenpago['Aclaratorio']['fecha_cancelacion']!="0000-00-00 00:00:00"))
                echo $this->Dates->FormatoCompletoFecha($fdatecopia[0]).'&nbsp;&nbsp;'.$fdatecopia[1];
         ?>
     </td>
    </tr>
   </table>
<p align="left" class="arial11gris"><br><br><br>Descripción</p>
   <?php  
		 echo $this->Form->textarea('notas', 
		               array(
				     'class'=>'ckeditor',
				     'rows' => '5', 
		                     'cols' => '5',
		                     'default'=>$ordenpago['Aclaratorio']['descripcion']
		              )); ?> 

<BR><BR><BR>
    </td>

 </tr>
</table><!-- FIN Informacion General -->    
<p align="center" class="arial11grisclaro" >
 <em><strong>Última Actualización:</strong>
  <?php  echo $this->Dates->FormatoCompletoFecha($fdateupdate[0]).'&nbsp;&nbsp;'.$fdateupdate[1]; ?>
 </em>
</p>

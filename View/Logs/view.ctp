<?php
/**
 * View alta almacenamiento de Depositos.
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 *
 */
//  $fdateupdate=explode(' ',$ficha['Deposito']['fecha_update']);
//  $fdatealta=explode(' ',$ficha['Deposito']['fecha_ficha']);
?>
<div class="breadcrumb">
       <?php
         echo $this->Html->link('', 
                                array('controller'=>'pages','action'=>'home'),
				array('title'=>'Inicio','escape' => false,'class'=>'icon-home'));
         echo '<span class="divider">/</span>';
         echo $this->Html->link('Actividad en el Sistema', 
                                array('controller'=>'Depositos','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
         echo '<span class="divider">/</span>';
         echo $this->Html->link('Vista', 
                                array('controller'=>'Depositos','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
       ?>
</div><br><br>
<table border="0">
 <tr>
  <td width="4%" align="center">
   <?php echo $this->Html->image("icons/icon_view.png",array("width"=>"28px","height"=>"28px","border"=>"0")); ?>
  </td>
  <td width="96%"><h1>Actividad en el Sistema</h1></td>
 </tr>
 <tr>
  <td colspan="2" class="arial11gris" align="left">
   La consulta del depósito muestran toda la información del depósito.<br><br>
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
     <td width="88%"><span align="left" class="arial14cafe2">Actividad en el Sistema</td>
     <td width="12%">

     </td>
    </tr>
   </table>
  </td>
 </tr>
 <tr><td><hr color="#CC9933"></td></tr>
 <tr>
  <td><br><br><br></td>
  </td>
 </tr>
 <tr>
  <td>
   <table border="0" class="accionvista">
    <tr>
     <th><span>Usuario:</span></th>
     <td>
      <?php
         echo $this->Html->link($ficha['Involucrado']['namefull'], 
                array('controller'=>'Involucrados','action'=>'view',$ficha['Involucrado']['id']),
		array('title'=>'Ver más de '.$ficha['Involucrado']['namefull'],'escape' => false));
      ?>
     </td>
    </tr>
    <tr>    
        <th><span>Title:</span></th>
        <td><?php echo $ficha['Deposito']['id']; ?></td>
    </tr>
    <tr>
     <th><span>Descripcion:</span></th>
     <td><?php echo h($ficha['Deposito']['htsjpconcepto_id']).' - '.h($ficha['Concepto']['conceptos']);  ?></td>
    </tr>
    <tr>
     <th><span>model:</span></th>
     <td><?php  echo h($ficha['Deposito']['htsjpcuenta_id']); ?></td>
    </tr>
    <tr>
     <th><span>Model_id:</span></th>
     <td><?php echo $this->Number->currency($ficha['Deposito']['importe'], '$'); ?></td>
    </tr>
    <tr>
     <th><span>Accion</span></th>
     <td><?php  echo $this->Dates->FormatoCompletoFecha($ficha['Deposito']['fecha_vencimiento']); ?></td>
    </tr>
    <tr>
     <th><span>IP</span></th>
     <td><?php  
      if (isset($ficha['Deposito']['fecha_deposito']))
       echo $this->Dates->FormatoCompletoFecha($ficha['Deposito']['fecha_deposito']); 
      ?>
     </td>
    </tr>
    <tr>
     <th><span>change</span></th>
     <td><?php  
      if (isset($ficha['Deposito']['fecha_deposito']))
       echo $this->Dates->FormatoCompletoFecha($ficha['Deposito']['fecha_deposito']); 
      ?>
     </td>
    </tr>
    <tr>
     <th><span>Fecha Emitida:</span></th>
     <td>  <?php  echo $this->Dates->FormatoCompletoFecha($fdatealta[0]).'&nbsp;&nbsp;'.$fdatealta[1]; ?></td>
    </tr>
   </table>
  </td>
 </tr>
   <tr>
     <td align="left" colspan="4" class="arial10blue"><br><br><br><i>OBSERVACIONES</i>
   <?php 
    echo $this->Form->textarea('notas', 

		               array('rows' => '5', 
				     'class'=>'ckeditor',
		                     'cols' => '5',
		                     'default'=>$ficha['Deposito']['notas']
		              ));
   ?>
    </td>
   </tr>
</table><!-- FIN Informacion General -->   
<p align="center" class="arial11grisclaro" >
 <em><strong>Última Actualización:</strong>
  <?php  echo $this->Dates->FormatoCompletoFecha($fdateupdate[0]).'&nbsp;&nbsp;'.$fdateupdate[1]; ?>
 </em>
</p><br>
<a class="easytooltiptrib" href="estado_exp.php?num=0002&year=2013">0002/2013<span>
     <table border='0' align='center'>
             <tr><td><div class='arial10gris' align='right'>Aperturado por:</div></td>
                 <td><div class='registro' align='left'>189.203.31.40(Emmanuel Sánchez Carreón)</div></td>                  
             </tr>
             <tr><td><div class='arial10gris' align='right'>Etapa:</div></td>
                 <td><div class='registro' align='left'>CEM-1C</div></td>                  
             </tr>                                                     
             <tr><td><div class='arial10gris' align='right'>Materia:</div></td>
                 <td><div class='registro' align='left'>PENAL</div></td>                  
             </tr>                                                                        
             <tr><td><div class='arial10gris' align='right'>Num. Inv:</div></td>
                 <td><div class='registro' align='left'>3</div></td>                  
             </tr>                                             
             <tr><td><div class='arial10gris' align='right'>Mediador:</div></td>
                 <td><div class='registro' align='left'>Lic. Carlos Arturo Chico Luis</div></td>                  
             </tr>
             <tr><td><div class='arial10gris' align='right'>Fecha de Mediaci&oacute;n:</div></td>
                 <td><div class='registro' align='left'> Martes, 08 de Enero de 2013</div></td>                  
             </tr>
             <tr><td><div class='arial10gris' align='right'>Hora de Mediaci&oacute;n:</div></td>
                 <td><div class='registro' align='left'>10:30</div></td>                  
             </tr>
            </table>   
    </span></a>
   

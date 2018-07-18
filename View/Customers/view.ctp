<?php
/**
 * View alta almacenamiento de Depositos.
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 *
 */
  echo $this->Html->css(array('radio'));
  $fdateupdate=explode(' ',$involucrado['Involucrado']['fecha_update']);
  $fdatealta=explode(' ',$involucrado['Involucrado']['fecha_registro']);
  $parteid=substr($involucrado['Involucrado']['id'],12); 
?>
<div class="breadcrumb">
       <?php
         echo $this->Html->link('', 
                                array('controller'=>'pages','action'=>'home'),
				array('title'=>'Inicio','escape' => false,'class'=>'icon-home'));
         echo '<span class="divider">/</span>';
         echo $this->Html->link('Partes', 
                                array('controller'=>'Involucrados','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
         echo '<span class="divider">/</span>';
         echo $this->Html->link('Vista', 
                                array('controller'=>'Involucrados','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
       ?>
</div><br><br>
<table border="0">
 <tr>
  <td width="4%" align="center">
   <?php echo $this->Html->image("icons/icon_view.png",array("width"=>"28px","height"=>"28px","border"=>"0")); ?>
  </td>
  <td width="96%"><h1>Consulta de la Parte</h1></td>
 </tr>
 <tr>
  <td colspan="2" class="arial11gris" align="left">
   La consulta de partes te muestran toda la informacion de la parte.<br><br>
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
     <td width="88%"><span align="left" class="arial14cafe2"><?php echo $involucrado['Involucrado']['tusuario']; ?></td>
     <td width="12%">
      <ul class="actions-tools">
       <li>
       <?php
	echo $this->Html->link(__('Editar'), 
	  	array('action' => 'edit',$involucrado['Involucrado']['id']),
		array('class'=>'edit','title'=>'Editar')
               );
       ?>
        </li></ul>
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
     <td width="65%"></td>
     <td width="35%">
      <table border="0" cellspacing="7">
       <tr>    
        <td width="8%" class="arial10gris"><div align="right">Expediente:</div></td>
        <td width="27%" class="arial12magenta">
          <?php 
            echo $this->Html->link($involucrado['Involucrado']['htsjpexpediente_id'],    	  	                   
                           array('controller'=>'Expedientes',
				 'action' => 'view',$involucrado['Involucrado']['htsjpexpediente_id']
                                ), 
				array('escape' => false)); 
          ?>
        </td>
       </tr>
       <tr>
        <td width="8%" class="arial10gris"><div align="right">Juzgado:</div></td>
        <td width="27%" class="arial12magenta"><?php echo $expediente['Juzgado']['descripcion']; ?></td>
       </tr>
       <tr>    
        <td width="8%" class="arial10gris"><div align="right">Parte:</div></td>
        <td width="27%" class="arial12magenta"><?php echo $parteid; ?>
        </td>
       </tr>
      </table>
     </td>
    </tr>
   </table><br><br>
  </td>
 </tr>
 <tr>
  <td>
   <table border="0" class="accionvista">
    <tr>
     <th><span>Tipo de Usuario:</span></th>
     <td><?php echo h($involucrado['Involucrado']['tusuario']);  ?></td>
    </tr>
    <tr>
     <th><span>Nombre:</span></th>
     <td><?php echo h($involucrado['Involucrado']['namefull']);  ?></td>
    </tr>
    <tr>
     <th><span>Email:</span></th>
     <td><?php echo h($involucrado['Involucrado']['email']);  ?></td>
    </tr>
    <tr>
     <th><span>Origen:</span></th>
     <td><?php echo h($involucrado['Estado']['entidad']);  ?></td>
    </tr>
    <tr>
     <th><span>Edad:</span></th>
     <td><?php echo h($involucrado['Involucrado']['edad']);  ?></td>
    </tr>
    <tr>
     <th><span>Genero:</span></th>
     <td><?php if ($involucrado['Involucrado']['sexo']=='M') echo "Masculino"; else echo "Femenino";  ?></td>
    </tr>
    <tr>
     <th><span>Identificación:</span></th>
     <td><?php echo h($involucrado['Involucrado']['tidentificacion']); ?></td>
    </tr>
    <tr>
     <th><span>Núm. de Identificación (OCR):</span></th>
     <td><?php echo h($involucrado['Involucrado']['nidentificacion']); ?></td>
    </tr>
    <tr>
     <th><span>Estado Civil:</span></th>
     <td><?php echo h($involucrado['Involucrado']['estadocivil']);  ?></td>
    </tr>
    <tr>
     <th><span>Escolaridad:</span></th>
     <td><?php echo h($involucrado['Involucrado']['escolaridad']);  ?></td>
    </tr>
    <tr>
     <th><span>Ocupación:</span></th>
     <td><?php echo h($involucrado['Involucrado']['ocupacion']);  ?></td>
    </tr>
    <tr>
     <th><span>Fecha de Regitro:</span></th>
     <td>  <?php  echo $this->Dates->FormatoCompletoFecha($fdatealta[0]).'&nbsp;&nbsp;'.$fdatealta[1]; ?></td>
    </tr>
   </table> <br><br>
  </td>
 </tr>
</table><!-- FIN Informacion General -->   
<p align="center" class="arial11grisclaro" >
 <em><strong>Última Actualización:</strong>
  <?php  echo $this->Dates->FormatoCompletoFecha($fdateupdate[0]).'&nbsp;&nbsp;'.$fdateupdate[1]; ?>
 </em>
</p>

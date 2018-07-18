<?php 
/**
 * View Actividades del Sistema.
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 */
$action=NULL;
?>
<ul id="nav-info" class="clearfix">
<li>
<?php echo $this->Html->link('', 
                                array('controller'=>'pages','action'=>'home'),
				array('title'=>'Inicio','escape' => false,'class'=>'fa fa-home')); ?>
</li>
<li>
<?php
         echo $this->Html->link('Actividades', 
                                array('controller'=>'Logs','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
?>
</li>
<li>
<?php
         echo $this->Html->link('Consulta', 
                                array('controller'=>'Logs','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
?>
</li>
</ul>

<h3 class="page-header page-header-top">Actividades del Sistema <small>Las actividades te muestran una línea temporal de todo lo que ha ocurrido en el Sistema desde el principio de los tiempos.</small></h3>
<p class="well">» Total de registros encontrados: <strong><?php echo $this->Paginator->counter(array('format' => '%count%')); ?></strong>.</br> » Se mostrar&aacute; un total de <strong>50</strong> registros por p&aacute;gina.</br>
    » Usted se encuentra consultando la p&aacute;gina <strong><?php echo $this->Paginator->counter(array('format' => '%page% de %pages%')); ?></strong>.</p>


<table id="example-datatables" class="table table-striped table-bordered table-hover">
 <?php foreach ($log as $Log): 
   $fregistro= explode(' ',$Log['Log']['created']); $fdiv= explode('-',$fregistro[0]); 
   switch($Log['Log']['action']){
    case 'add':  $img='<i class="fa fa-plus-circle"></i>';
		 $action='añadió';
		 break;
    case 'edit': 
		 //$fieldchange= explode(',',$Log['Log']['change']);
                 //debug($Log['Log']['change']);
                 $fieldver=substr($Log['Log']['change'],0,3); 
		 if ($fieldver=='ver'){ $action='canceló'; $img='<i class="fa fa-times-circle"></i>';}
                 else {
 		  if ($Log['Log']['almacenuser_id']==0) {$action='inició sesión'; $img='<i class="fa fa-sort"></i>';}
                  else {$action='actualizó'; $img='<i class="fa fa-pencil"></i>';}
                 }
/*		 for ($i=0; $i<count($fieldchange); $i++){
                  //echo $i.'-'.$fieldchange[$i];
		  if ($fieldchange[$i]=='ver'){ $action='canceló'; $img='cancel.png';}
}*/
		break;
    default: return false;
   }
 ?>
 <tr>
  <td> <?php echo $img; ?>
<!--
   <p class="easytooltiptrib">
   
    <span>
    <table border='0' class="none" style="clear:both;">
     <tr>
      <td><div class='arial10gris' align='right'>Registrado por:</div></td>
      <td><div class='registro' align='left'><?php echo $Log['Log']['ddfmuser_id']; ?></div></td>
     </tr>
     <tr>
      <td><div class='arial10gris' align='right'>IP:</div></td>
      <td><div class='registro' align='left'><?php echo $Log['Log']['ip']; ?></div></td>
     </tr>
     <tr>
      <td><div class='arial10gris' align='right'>Tabla:</div></td>
      <td><div class='registro' align='left'>
       <?php echo $Log['Log']['model'].' "'.$Log['Log']['model_id'].'"'; ?></div>
      </td>
     </tr>
     <tr>
      <td><div class='arial10gris' align='right'>Accion:</div></td>
      <td><div class='registro' align='left'><?php echo $Log['Log']['action']; ?></div></td>
     </tr>
     <tr>
      <td><div class='arial10gris' align='right'>Campos afectados:</div></td>
      <td><div class='registro' align='left'><?php echo $Log['Log']['change']; ?></div></td>
     </tr>

    </table>   
    </span>
   </p> -->
  </td>
     <td>
      <?php 
       if (isset($Log['User']['Personal']['namefull'])) $name=$Log['User']['Personal']['namefull'];
       else $name=NULL;
       echo $name.' '.$action.' "<strong>'.$Log['Log']['model'].'</strong>" con el id <strong>'.$Log['Log']['model_id'].'</strong>'; 
        ?> </td>
     <td align="right"><?php echo $this->Dates->fechaObtener($fdiv[2],$fdiv[1],$fdiv[0]).'   <strong>'.$fregistro[1].'</strong>'; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="paging">
<?php echo $this->Paginator->prev('« Anterior', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->numbers(array('modulus'=>'9','separator' => ''));  ?>
<?php echo $this->Paginator->next('Siguiente »', null, null, array('class' => 'disabled')); ?> 
</div></br></br>

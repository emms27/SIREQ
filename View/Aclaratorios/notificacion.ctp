<?php 
/**
 * View alta almacenamiento de Depositos.
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 */
?>
<div class="breadcrumb">
       <?php
         echo $this->Html->link('', 
                                array('controller'=>'pages','action'=>'home'),
				array('title'=>'Inicio','escape' => false,'class'=>'icon-home'));
         echo '<span class="divider">/</span>';
         echo $this->Html->link('Orden de Pago', 
                                array('controller'=>'OrdenPagos','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
         echo '<span class="divider">/</span>';
         echo $this->Html->link('Consulta', 
                                array('controller'=>'OrdenPagos','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
         echo '<span class="divider">/</span>';
         echo $this->Html->link('Notificaciones', 
                                array('controller'=>'OrdenPagos','action'=>'notificacion'),
				array('title'=>'Inicio','escape' => false));
       ?>
</div><br><br>
<?php  if (isset($userid['ddfmgroup_id']) && ($userid['ddfmgroup_id']!=1)){ ?>
<table border="0">
 <tr>
  <td width="4%" align="center">
   <?php echo $this->Html->image("icons/icon_view.png",array("width"=>"28px","height"=>"28px","border"=>"0")); ?>
  </td>
  <td width="55%"><h1>Notificaciones Aclaratorios</h1></td>
  <td width="45%"></td>
 </tr>
 <tr>
  <td colspan="3" class="arial11gris" align="left">
   La consulta de aclaratorio te muestran una línea temporal de todas las notificaciones de los oficios aclaratorios dados de alta en el Sistema desde el principio de los tiempos.<br><br>
  </td>
 </tr>
 <tr>
  <td colspan="3">
   <div style="border:1px solid #666666; background-color:#F4EDD5; padding:2px;">
    <p class="verdana11azul">» Total de registros encontrados: 
    <strong><?php echo $this->Paginator->counter(array('format' => '%count%')); ?></strong>.</br>
    » Se mostrar&aacute; un total de <strong>50</strong> registros por p&aacute;gina.</br>
    » Usted se encuentra consultando la p&aacute;gina 
    <strong><?php echo $this->Paginator->counter(array('format' => '%page% de %pages%')); ?></strong>.
    </p>
   </div>
  </td>
 </tr>
</table>
<div class="paging">
<?php 
  echo $this->Paginator->prev('« Anterior', null, null, array('class' => 'disabled')); 
  echo $this->Paginator->numbers(array('modulus'=>'9','separator' => '')); 
  echo $this->Paginator->next('Siguiente »', null, null, array('class' => 'disabled')); 
?> 
</div></br></br>

<table border=0 class="testgrid">
 <?php
   echo $this->Html->tableHeaders(
       array('#', 
             $this->Paginator->sort('OrdenPago.id', 'Orden'),
             $this->Paginator->sort('OrdenPago.htsjpexpediente_id', 'Expediente'),
             $this->Paginator->sort('OrdenPago.ddfmparte_id', 'Beneficiario'),
             $this->Paginator->sort('OrdenPago.importe', 'Monto'),
             $this->Paginator->sort('OrdenPago.estado', 'Status'),
	     'Acci&oacute;n')); 
 ?>

 <?php $d=1; foreach ($orden as $ficha):     $idstatus='divstatus_'.$ficha['OrdenPago']['id']; ?>
     <tr>
      <td><?php echo $d; ?></td>
      <td><?php echo $ficha['OrdenPago']['id']; ?></td>
      <td>
          <?php 
            echo $this->Html->link($ficha['OrdenPago']['htsjpexpediente_id'],    	  	                   
                           array('controller'=>'Expedientes',
				 'action' => 'view',$ficha['OrdenPago']['htsjpexpediente_id']
                                ), 
				array('escape' => false)); 
          ?>
      </td>
      <td>
          <?php 
            echo $this->Html->link($ficha['OrdenPago']['ddfmparte_id'],	  	                   
                           array('controller'=>'Involucrados','action' => 'view',$ficha['OrdenPago']['ddfmparte_id']), 
 			   array('escape' => false)); 
          ?>
      </td>
      <td><?php echo $this->Number->currency($ficha['OrdenPago']['importe'], '$'); ?></td>
      <td><?php echo $ficha['OrdenPago']['estado']; ?></td>
      <td><center>
       <ul class="actions-tools">
        <li>
       <?php 
	echo $this->Html->link(__('Ver'), 
	  	array('action' => 'view', $ficha['OrdenPago']['id']), 
		array('class'=>'view','title'=>'Ver más')
               );				
       ?>
        </li>
       </ul>
      </center>
     </td>
    </tr>
    <?php $d++; endforeach; ?>	
</table>
<div class="paging">
<?php echo $this->Paginator->prev('« Anterior', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->numbers(array('modulus'=>'9','separator' => ''));  ?>
<?php echo $this->Paginator->next('Siguiente »', null, null, array('class' => 'disabled'));?> 
</div>
<?php }else{ ?>
<table border="0">
 <tr>
  <td width="4%" align="center">
   <?php echo $this->Html->image("icons/icon_view.png",array("width"=>"28px","height"=>"28px","border"=>"0")); ?>
  </td>
  <td width="55%"><h1>Notificaciones Ordenes de Pago</h1></td>
  <td width="45%"></td>
 </tr>
 <tr>
  <td colspan="3" class="arial11gris" align="left">
   La consulta de ordenes de pago te muestran una línea temporal de todas las notificaciones de las ordenes dadas de alta en el Sistema desde el principio de los tiempos.<br><br>
  </td>
 </tr>
</table>
<?php } ?>
<script>
    $(function() {
        $( "#from" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 3,
            dateFormat: 'yy-mm-dd',
            onClose: function( selectedDate ) {
                $( "#to" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#to" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 3,
            dateFormat: 'yy-mm-dd',
            onClose: function( selectedDate ) {
                $( "#from" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
    });
</script>

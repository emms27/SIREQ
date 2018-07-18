<?php
/**
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 */
 $stotal=0;
?>
 <script type="text/javascript" src="/SIDFM/js/../themes/croogo/ui/1.10.4/js/jquery-1.10.2.js"></script>
<?php echo $this->Html->script(array('jeditable/jquery.jeditable.mini')); ?>
<ul id="nav-info" class="clearfix">
<li>&nbsp;
<?php
     echo $this->Html->link('',
                                array('controller'=>'pages','action'=>'home'),
				array('title'=>'Inicio','escape' => false,'class'=>'fa fa-home')); ?>
</li>
<li>
<?php
     echo $this->Html->link('Requisicion',
                                array('controller'=>'Requisitions','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
?>
</li>
<li class="active">
<?php
         echo $this->Html->link('Consulta',
                                array('controller'=>'Requisitions','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
?>
</li>
</ul>
<h3 class="page-header page-header-top">Consulta Requisición<small> La consulta de requisición...</small></h3>

<h3 class="sub-header text-center"><i class="fa fa-file-o"></i> Requisición #<?php echo $row['Requisition']['id']; ?></h3>
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="dash-tile dash-tile-dark no-opacity remove-margin">
<div class="dash-tile-content">
<div class="dash-tile-content-inner-fluid dash-tile-content-light">
<div class="row">
<div class="col-md-6">
<address>
<strong><i class="fa fa-home"></i> ALMACEN</strong><br>
CIUDAD JUDICIAL SIGLO XXI Periférico Ecológico Arco Sur No. 4000.<br>
San Andrés Cholula, Puebla. Reserva Territorial Atlixcayotl.<br><br>
<abbr title="Phone"><i class="fa fa-phone"></i> </abbr> (222) 223-84-00
</address>
</div>
<div class="col-md-5 col-md-offset-1">
<table class="table table-borderless table-condensed">
<tbody>
<tr>
<td colspan="2">
<address>
<strong><?php echo $row['Personal']['Assignment']['descripcion']; ?></strong><br>
<?php echo $row['Personal']['namefull']; ?><br>
</address>
</td>
</tr>
<tr>
<td><strong>Requisición</strong></td>
<td><span class="label label-danger">#<?php echo $row['Requisition']['id']; ?></span></td>
</tr>
<tr>
<td><strong>Creación</strong></td>
<td><span class="label label-warning"><?php echo $row['Requisition']['fecha_registro']; ?></span></td>
</tr>
<tr>
<td><strong>Status</strong></td>
    <td><?php
      switch ($row['Requisition']['status']){
	  case "En proceso": $l="default";  break;
	  case "Autorizada con Modificación": $l="info";     break;
	  case "Rechazada": $l="warning";     break;
	  case "Cancelada":  $l="danger";   break;
	  case "Cancelada por Tiempo":  $l="danger";   break;
	  case "Entregada":    $l="success";  break;
	 }
      ?>
      <span class="label label-<?php echo $l.'">'.$row['Requisition']['status']; ?></span>
     </td>
</tr>
</tbody>
</table>
</div>
</div>

<table class="table table-borderless table-hover">
<thead>
<tr>
<th></th>
<th>Clave</th>
<th>Producto</th>
<th class="hidden-xs hidden-sm">Categoría</th>
<th class="hidden-xs hidden-sm text-center">Cant. Área</th>
<th class="hidden-xs hidden-sm text-center">Cant. Almacén</th>
<th class="hidden-xs hidden-sm text-center">Stock</th>
<th class="text-center">Status</th>
</tr>
</thead>
<tbody>
<?php
  $d=1; foreach ($almacenproducts as $product): $idtitular='divtitular_'.$product['ProductRequisition']['id'];
  if (($product['Product']['ucantidad']<$product['ProductRequisition']['cantidad_autorizada']) ||
     ($product['ProductRequisition']['ver']!=1))
    $bkcolor="danger";
  else $bkcolor="success";
 ?>
<tr class="<?php echo $bkcolor; ?>">
<td><?php echo $d; ?></td>
<td><?php echo $product['Product']['clave'];  ?></td>
<td class="hidden-xs hidden-sm"><em><?php echo $product['Product']['descripcion']; ?></em></td>
<td class="hidden-xs hidden-sm text-center"><?php echo $product['Product']['Categoria']['descripcion']; ?></td>
<td class="hidden-xs hidden-sm text-center"><?php echo $product['ProductRequisition']['cantidad']; ?></td>
<td class="text-center">
     <div class="edit" id="<?php echo $idtitular; ?>"><?php echo $product['ProductRequisition']['cantidad_autorizada']; ?></div>
		<?php
  if ($user['id']==1){
		echo $this->Ajax->editor($idtitular,
		    array(
    			'controller' => 'ProductRequisitions',
    			'action' => 'upcantidad',$product['ProductRequisition']['id']
		    ),
		    array(
          // 'loadurl'  => 'http://www.example.com/load.php',
    			'indicator' => $this->Html->image('loading/loading.gif'),
    			'submit' => 'OK',
    			'cancel' => 'Cancel',
          'cancelcssclass' => 'btn btn-danger',
          'submitcssclass' => 'btn btn-success',
    		  'onblur' => 'submit',
    		  'event'  => "dblclick",
    			// 'style'  => 'inherit',
    			'id'     => $product['ProductRequisition']['id'],
    		  'name'   => 'data[Juzgado][titular]',
    		        //'type' => 'text',
    			'submitdata' => array('email'=>2),
    			'tooltip'    => 'Doble clic para editar...',
    		  'width'  => '100%',
    		  'height' => '25px'
			 )
		);
  }
		?>
     </td>
<td class="hidden-xs hidden-sm text-center"><?php echo $product['Product']['ucantidad']; ?></td>
<td class="text-center">
  <?php
       if ($product['ProductRequisition']['ver']==0) $sclass="fa fa-times text-danger";
       else $sclass="fa fa-check text-success";

         echo $this->Html->link('<i class="'.$sclass.'"></i>',
                   array('controller'=>'ProductRequisitions','action'=>'status',$product['ProductRequisition']['id']),
				array('title'=>'Ver este elemento',
				      'escape' => false,
				      'class'=>'view',
				      'data-title'=>'Ver este elemento',
				      'rel'=>"tooltip",
				      'data-placement'=>"top",
				      'data-trigger'=>"hover"
         ));
  ?>
</td>
</tr>
<?php $d++; endforeach; ?>
<?php if ($user['id']==1){ ?>
<tr class="warning">
<td></td>
<td></td>
<td class="hidden-xs hidden-sm"></td>
<td class="hidden-xs hidden-sm"></td>
<td class="text-right"></td>
<td class="text-right"></td>
</tr>
<tr class="warning">
<td></td>
<td></td>
<td></td>
<td class="hidden-xs hidden-sm"></td>
<td class="hidden-xs hidden-sm"></td>
</tr>
<?php } ?>
</tbody>
</table>

<div class="row">
<?php
   echo $this->Form->input('Requisition.notas',
	                       array('rows' => '5',
	 		   	     'class'=>'ckeditor',
				        'div' => array('class' => 'col-md-12'),
		                     'value'=>$row['Requisition']['notas']
   ));
?>
</div><br><br><br>
<div class="clearfix">
  <?php
  if ($user['id']==1){
	 echo $this->Form->postLink(_('<i class="fa fa-exchange"></i> Entregar'),
                     array('controller'=>'Requisitions','action'=>'entregar',$row['Requisition']['id']),
		        array('class'=>'btn btn btn-success pull-right push','escape' => false,'data-title'=>'Cancelar este elemento',"data-toggle"=>"tooltip",'title'=>'Entregar este elemento','data-placement'=>"top",'data-trigger'=>"hover"), __('¿Realmente desea entregar la requisición "'.$row['Requisition']['id'].'" ?'));


	 echo $this->Form->postLink(_('<i class="fa fa-times"></i> Recoger'),
                     array('controller'=>'Requisitions','action'=>'cancelar',$row['Requisition']['id']),
		        array('class'=>'btn btn btn-warning pull-right push','escape' => false,'data-title'=>'Cancelar este elemento',"data-toggle"=>"tooltip",'title'=>'Cancelar este elemento','data-placement'=>"top",'data-trigger'=>"hover"), __('¿Realmente desea cancelar la requisición "'.$row['Requisition']['id'].'" ?'));


	 echo $this->Form->postLink(_('<i class="fa fa-thumbs-o-up"></i> Autorizar'),
                     array('controller'=>'Requisitions','action'=>'autorizar',$row['Requisition']['id']),
		        array('class'=>'btn btn btn-info pull-right push','escape' => false,'data-title'=>'Cancelar este elemento',"data-toggle"=>"tooltip",'title'=>'Autorizar este elemento','data-placement'=>"top",'data-trigger'=>"hover"), __('¿Realmente desea autorizar la requisición "'.$row['Requisition']['id'].'" ?'));


		echo $this->Html->link('<i class="fa fa-print"></i> Imprimir',
  			array('action' => 'pdf', $row['Requisition']['id']),
			array('escape' => false,'class'=>'btn btn btn-default pull-right push','data-title'=>'Ver este elemento',"data-toggle"=>"tooltip",'title'=>'Ver este elemento','data-placement'=>"top",'data-trigger'=>"hover",'target'=>'_blank'));

		echo $this->Html->link('<i class="fa fa-cart-plus"></i>  Agregar Producto',
  			array('controller'=>'ProductRequisitions','action' => 'add'),
			array('escape' => false,'class'=>'btn btn btn-default pull-right push','data-title'=>'Agregar   elemento',"data-toggle"=>"tooltip",'title'=>'Agregar elemento','data-placement'=>"top",'data-trigger'=>"hover",'target'=>'_blank'));
  }
	       ?>

<p><i class="fa fa-envelope"></i> <a href="javascript:void(0)">almacen@htsjpuebla.gob.mx</a><br>Última Actualización <span class="label label-info"><?php echo $row['Requisition']['fecha_update']; ?></span></p>
</div>
</div>
</div>
</div>
</div>
</div>

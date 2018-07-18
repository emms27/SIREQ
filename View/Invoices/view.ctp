<?php
    // echo $this->Html->css(array('reset','style','fonts', 'generic.university',
											//  'ui-lightness/jquery-ui-1.8.23.custom','http://fonts.googleapis.com/css?family=Amaranth'));

/**
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 */
 $stotal=0;
?>
<?php echo $this->Html->script(array('jeditable/jquery.jeditable.mini')); ?>
<link rel="stylesheet" href="http://127.0.0.1/system/Universidad/css/ui-lightness/jquery-ui-1.8.23.custom.css">
<script type="text/javascript" src="http://127.0.0.1/system/Universidad/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="http://127.0.0.1/system/Universidad/js/jquery-ui-1.8.23.custom.min.js"></script>

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
                                array('controller'=>'Invoices','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
?>
</li>
<li class="active">
<?php
         echo $this->Html->link('Consulta',
                                array('controller'=>'Invoices','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
?>
</li>
</ul>
<h3 class="page-header page-header-top">Factura<small> La consulta de ...</small></h3>
<h3 class="sub-header text-center"><i class="fa fa-file-o"></i> Factura #<?php echo $row['Invoice']['folio']; ?></h3>

<div class="row">
  <div class="col-md-2">  </div>
  <div class="col-xs-12 col-md-8">
    <div class="wrapper_autocomplete">
    <?php
    /*
    $form   = $this->Js->get('#form_buscar');
    //$search = $this->Js->get('#name');
    $form->event(
        'click',
        $this->Js->request(
            array('controller'=>'courses','action' => 'autoComplete'),
            array( 'async' => true,
    				   'update' => '#resultados',
    					'dataExpression' => true,
    					'method' => 'post',
    					'data' => $this->Js->serializeForm(array('isForm'=>false, 'inline'=>true))
    				)
        )
    );
    */
    	echo $this->Form->create(null,array());
    	echo $this->Form->input('name', array(
        'label'=>false,
        'class'=>'form-control',
        'placeholder'=>'Buscar factura','id'=>'name'));
    	echo $this->Form->end();
    ?>

      <div id="resultados"></div>
    </div>
    <script type="text/javascript">
    var $j = jQuery.noConflict(true);
    	$j(document).ready(function(){
    		$j( "#name" ).autocomplete({
    					minLength: 2,
    					source: '../autoCompletado',
    					focus: function( event, ui )  { $j( "#name" ).val( ui.item.Invoice.folio ); return false;},
    					select: function( event, ui ) {
    						$j("#resultados").hide('slow');
    						$j( "#name" ).val( ui.item.Invoice.folio );
    						var id = ui.item.Invoice.id;
    						$j.ajax({
    							url: '../getData/'+id,
    							dataType: 'json',
    							success: function(data){
    									var curso = data.Invoice;
    									var url = id;
    									var html  = '<div id="inter_resultados"><div class="datos_curso">';
    										 html += '<h3>Factura:</h3><div class="desc">';
    										 html += '<ul><li>';
    									    html += curso["folio"] + '<br><a href="'+url+'">Ver más...' ;
    									    html += '</a></li></ul></div></div></div>';
    									$j("#resultados").html(html);
    									$j("#resultados").show('slow');
    								}//success
    							});
    						return false;
    					}//select
    				}).data( "autocomplete" )._renderItem = function( ul, item ) {
    					return $j( "<li></li>" )
    								.data( "item.autocomplete", item )
    								.append( "<a>" + item.Invoice.folio + "</a>" )
    								.appendTo( ul );
    				};//autocomplete
    	});// document
    </script>
  </div>
  <div class="col-md-2">  </div>
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
<strong><?php echo $row['Provider']['razon_social']; ?></strong><br>
<?php echo $row['Provider']['rfc']; ?><br>
<?php echo $row['Provider']['domicilio']; ?><br>
</address>
</td>
</tr>
<tr>
<td><strong>Folio</strong></td>
<td><span class="label label-danger">#<?php echo $row['Invoice']['folio']; ?></span></td>
</tr>
<tr>
<td><strong>Creación</strong></td>
<td><span class="label label-warning"><?php echo $row['Invoice']['fecha_registro']; ?></span></td>
</tr>
<tr>
<td><strong>Status</strong></td>
    <td><?php
      switch ($row['Invoice']['status']){
	  case "En proceso": $l="default";  break;
	  case "Autorizada": $l="info";     break;
	  case "Rechazada": $l="warning";     break;
	  case "Cancelada":  $l="danger";   break;
	  case "Cancelada por Tiempo":  $l="danger";   break;
	  case "Entregada":    $l="success";  break;
	 }
      ?>
      <span class="label label-<?php echo $l.'">'.$row['Invoice']['status']; ?></span>
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
<th class="hidden-xs hidden-sm text-center">U. Métrica</th>
<th class="hidden-xs hidden-sm text-center">Cantidad</th>
<th class="hidden-xs hidden-sm text-center">Precio</th>
<th class="hidden-xs hidden-sm text-center">Stock</th>
<th class="text-center">Status</th>
</tr>
</thead>
<tbody>


<?php
  $d=1; foreach ($row['InvoiceProduct'] as $product):
  $idtitular='divtitular_'.$product['id'];
  $idcantidad='divcantidad_'.$product['id'];
  $idprecio='divprecio_'.$product['id'];
  $idstock='divstock_'.$product['Product']['id'];
  if ($product['ver']!=1)
    $bkcolor="danger";
  else $bkcolor="success";
 ?>
<tr class="<?php echo $bkcolor; ?>">
<td><?php echo $d; ?></td>
<td><?php echo $product['Product']['clave'];  ?></td>
<td class="hidden-xs hidden-sm"><em><?php echo $product['Product']['descripcion']; ?></em></td>
<td class="text-center">
     <div class="edit" id="<?php echo $idtitular; ?>"><?php echo $product['fmetrica']; ?></div>
		<?php
  if ($user['id']==1){
    echo $this->Ajax->editor($idtitular,
		    array(
    			'controller' => 'InvoiceProducts',
    			'action' => 'upmetrica',$product['id']
		    ),
		    array(
    			'indicator' => $this->Html->image('loading/loading.gif'),
    			'submit' => 'OK',
    			'cancel' => 'Cancel',
    		  'onblur' => 'submit',
    		  'event'  => "dblclick",
    			'style'  => 'inherit',
    			'id'     => $product['id'],
    		  'name'   => 'data[Emmanuel][titular]',
    		        //'type' => 'text',
    			'submitdata' => array('email'=>2),
    			'tooltip'    => 'Doble clic para editar...',
    		  'width'  => '90px',
    		  'height' => '25px'
			 )
		);
  }
		?>
 </td>
 <td class="text-center">
      <div class="edit" id="<?php echo $idcantidad; ?>"><?php echo $product['fcantidad']; ?></div>
 		<?php
   if ($user['id']==1){
     echo $this->Ajax->editor($idcantidad,
 		    array(
     			'controller' => 'InvoiceProducts',
     			'action' => 'upcantidad',$product['id']
 		    ),
 		    array(
     			'indicator' => $this->Html->image('loading/loading.gif'),
     			'submit' => 'OK',
     			'cancel' => 'Cancel',
     		  'onblur' => 'submit',
     		  'event'  => "dblclick",
     			'style'  => 'inherit',
     			'id'     => $product['id'],
     		  'name'   => 'data[Emmanuel][cantidad]',
     		        //'type' => 'text',
     			'submitdata' => array('email'=>2),
     			'tooltip'    => 'Doble clic para editar...',
     		  'width'  => '90px',
     		  'height' => '25px'
 			 )
 		);
   }
 		?>
 </td>
 <td class="text-center">
      <div class="edit" id="<?php echo $idprecio; ?>"><?php echo $product['fprecio']; ?></div>
 		<?php
   if ($user['id']==1){
     echo $this->Ajax->editor($idprecio,
 		    array(
     			'controller' => 'InvoiceProducts',
     			'action' => 'upprecio',$product['id']
 		    ),
 		    array(
     			'indicator' => $this->Html->image('loading/loading.gif'),
     			'submit' => 'OK',
     			'cancel' => 'Cancel',
     		  'onblur' => 'submit',
     		  'event'  => "dblclick",
     			'style'  => 'inherit',
     			'id'     => $product['id'],
     		  'name'   => 'data[Emmanuel][precio]',
     		        //'type' => 'text',
     			'submitdata' => array('email'=>2),
     			'tooltip'    => 'Doble clic para editar...',
     		  'width'  => '90px',
     		  'height' => '25px'
 			 )
 		);
   }
 		?>
 </td>
 <td class="hidden-xs hidden-sm"><?php echo $product['Product']['ucantidad']; ?></td>

 <td class="text-center">
  <?php
       if ($product['ver']==0) $sclass="fa fa-times text-danger";
       else $sclass="fa fa-check text-success";

         echo $this->Html->link('<i class="'.$sclass.'"></i>',
                   array('controller'=>'InvoiceProducts','action'=>'status',$product['id']),
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
   echo $this->Form->input('Invoice.notas',
	                       array('rows' => '5',
	 		   	     'class'=>'ckeditor',
				        'div' => array('class' => 'col-md-12'),
		                     'value'=>$row['Invoice']['notas']
   ));
?>
</div><br><br><br>
<div class="clearfix">
  <?php
  // if ($user['id']==1){
	//  echo $this->Form->postLink(_('<i class="fa fa-exchange"></i> Entregar'),
  //                    array('controller'=>'Invoices','action'=>'entregar',$row['Invoice']['id']),
	// 	        array('class'=>'btn btn btn-success pull-right push','escape' => false,'data-title'=>'Cancelar este elemento',"data-toggle"=>"tooltip",'title'=>'Entregar este elemento','data-placement'=>"top",'data-trigger'=>"hover"), __('¿Realmente desea entregar la requisición "'.$row['Invoice']['id'].'" ?'));


	 echo $this->Form->postLink(_('<i class="fa fa-times"></i> Cancelar'),
                     array('controller'=>'Invoices','action'=>'cancelar',$row['Invoice']['id']),
		        array('class'=>'btn btn btn-danger pull-right push','escape' => false,'data-title'=>'Cancelar este elemento',"data-toggle"=>"tooltip",'title'=>'Cancelar este elemento','data-placement'=>"top",'data-trigger'=>"hover"), __('¿Realmente desea cancelar la requisición "'.$row['Invoice']['id'].'" ?'));


	 echo $this->Form->postLink(_('<i class="fa fa-thumbs-o-up"></i> Autorizar'),
                     array('controller'=>'Invoices','action'=>'autorizar',$row['Invoice']['id']),
		        array('class'=>'btn btn btn-info pull-right push','escape' => false,'data-title'=>'Cancelar este elemento',"data-toggle"=>"tooltip",'title'=>'Autorizar Factura','data-placement'=>"top",'data-trigger'=>"hover"), __('¿Realmente desea autorizar la factura #'.$row['Invoice']['folio'].'?'));


		// echo $this->Html->link('<i class="fa fa-print"></i> Imprimir',
  	// 		array('action' => 'pdf', $row['Invoice']['id']),
		// 	array('escape' => false,'class'=>'btn btn btn-default pull-right push','data-title'=>'Ver este elemento',"data-toggle"=>"tooltip",'title'=>'Ver este elemento','data-placement'=>"top",'data-trigger'=>"hover",'target'=>'_blank'));

		echo $this->Html->link('<i class="fa fa-cart-plus"></i>  Agregar Producto',
  			array('controller'=>'InvoiceProducts','action' => 'add'),
			array('escape' => false,'class'=>'btn btn btn-default pull-right push','data-title'=>'Agregar   elemento',"data-toggle"=>"tooltip",'title'=>'Agregar elemento','data-placement'=>"top",'data-trigger'=>"hover",'target'=>'_blank'));
  // }
	       ?>


<p><i class="fa fa-envelope"></i> <a href="javascript:void(0)">almacen@htsjpuebla.gob.mx</a><br>Última Actualización <span class="label label-info"><?php echo $row['Invoice']['fecha_update']; ?></span></p>
</div>
</div>
</div>
</div>
</div>
</div>

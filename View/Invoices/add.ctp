<?php
/**
 * @version 3.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 *
 */

/*
   $options = array(
    'label' => 'Guardar Información',
    'class'=> 'btn btn-success',
    'onClick'=>"validar()",
    'type'=>'button',
    'escape' => false,
    'div' => array('class' => ''));
*/
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>';
?>

<ul id="nav-info" class="clearfix">
<li>
<?php
     echo $this->Html->link('',
                                array('controller'=>'pages','action'=>'home'),
				array('escape' => false,'class'=>'fa fa-home')); ?>
</li>
<li>
<?php
     echo $this->Html->link('Requisiciones',
                                array('controller'=>'Customers','action'=>'index'),
				array('escape' => false));
?>
</li>
<li class="active">
<?php
         echo $this->Html->link('Add',
                                array('controller'=>'Depositos','action'=>'index'),
				array('escape' => false));
?>
</li>
</ul>
<h3 class="page-header page-header-top">Agregar Factura<small> ...</small></h3>
<br>



<?php
 		echo $this->Form->create('Invoice', array('action'=>'add',"name"=>"FrmPass","class"=>"form-horizontal form-box"));
		echo $this->Form->input('Invoice.id',array('type'=>'hidden'));
?>
<h4 class="form-box-header">Detalle Factura</h4>
<div class="form-box-content">
  <div class="form-group">
   <label class="control-label col-md-2">Folio</label>
   <div class="col-md-5">
    <div class="input-group">
                    <?php
  		  echo $this->Form->input('Invoice.folio',
  				          array(
                      'label' =>false,
  							      'type'=>'text',
  						        'placeholder'=>'270501',
  							      'class'=>"form-control",
                      'onchange' => 'this.form.submit()'
  							  )
  		                                );
  		 ?>
    </div>
   </div>
  </div>


 <div class="form-group">
<label class="control-label col-md-2" for="example-input-success"></label>
<?php
			echo $this->Form->input('Invoice.almacenprovider_id',
							array(
								'type'=>'select',
								'label'=> 'Proveedores',
								'div' => array('class' => 'col-md-4'),
								'id'=>"example-select-chosen",
								'class'=>"form-control select-chosen",
								'empty' => 'Por favor, seleccione...',
								// 'onchange' => 'this.form.submit()',
											//'placeholder'=>'Seleccione la opcion deseada',
								// 'autofocus'
			));
?>

 </div>
<br><br>

<h4 class="form-box-header">Productos</h4>
<style>
	th, td {
    text-align: center;
}
</style>
<table id="mytable">
<tr style="text-align:center;"><th></th><th>Producto</th><th>U. Métrica</th><th>Cantidad</th><th>Precio</th></tr>
<tr id="person0" style="display:none;">
	<td><?php echo $this->Form->button('&nbsp;-&nbsp;',array('type'=>'button','title'=>'Click Here to remove this person')); ?></td>
	<td>
		<?php
			echo $this->Form->input('unused.almacenproducts_id',array(
								'type'=>'select',
								'id'=>'productid',
								'label'=> false,//'Clientes',
								// 'div' => array('class' => 'col-md-12'),
								'id'=>"example-select-chosen",
								// 'class'=>"form-control select-chosen",
								'class'=>"form-control",
								'empty' => 'Por favor, seleccione...',
								// 'onchange' => 'this.form.submit()',
											//'placeholder'=>'Seleccione la opcion deseada',
								// 'autofocus'
				 )
			);
		?>
	</td>
	<td><?php echo $this->Form->input('unused.fmetrica',
					array('label'=>'','type'=>'text','id'=>'fmetrica'));
					?>
	</td>
  <td><?php echo $this->Form->input('unused.fcantidad',
					array('label'=>'','type'=>'text','id'=>'fcantidad'));
					?>
	</td>
	<td><?php echo $this->Form->input('unused.fprecio',
					array('label'=>'','type'=>'text','id'=>'fprecio')); ?></td>
</tr>
<tr id="trAdd"><td>
	<?php
	// echo $this->Form->button('+',array('id'=>'btnplus','type'=>'button','title'=>'Click Here to add another person','onclick'=>'addPerson()'));
	echo $this->Form->button('+',array('id'=>'btnplus','type'=>'button','title'=>'Click Here to add another person'));
	?> </td><td></td><td></td><td></td><td></td></tr>
</table>
<br><br><br>

 <h4 class="form-box-header">Observaciones</h4>
<div class="form-group">
<label class="control-label col-md-2" for="example-input-success"></label>
<?php
   echo $this->Form->input('Invoice.notas',
	                       array('rows' => '5',
	 		   	     'class'=>'ckeditor',
				        'div' => array('class' => 'col-md-9'),
		                     'cols' => '5',
		                     'placeholder'=>'Escriba una observacion si es necesario'
   ));
?>
</div>
<?php
  // echo $this->Form->error('Invoice.notas');
?>

<div class="form-group form-actions">
 <div class="col-md-10 col-md-offset-2">
   <?php  //echo $this->Form->end($options); ?>
  <button class="btn btn-success"><i class="fa fa-paper-plane"></i> Recibir Factura</button>
 </div>
</div>
 <?php  echo $this->Form->end(); ?>
</div>



  <?php //echo $this->Form->end($options);
// echo $this->Html->script(array('jquery-1.6.4.min'));
?>


<script type="text/javascript">
		// var $j = $.noConflict(true);
		var $j = jQuery.noConflict(true);

		function removePerson(x) {
		 $("#person"+x).remove();
		}
		// $(function(){
		// 	console.log($.fn.jquery)
		// });

		$j(document).ready(function(){
			// console.log($j.fn.jquery);
		 var lastRow=0;
		 function addPerson() {
			 lastRow++;
			 $j("#mytable tbody>tr:#person0").clone(true).attr('id','person'+lastRow).removeAttr('style').insertBefore("#mytable tbody>tr:#trAdd");
			 $j("#person"+lastRow+" button").attr('onclick','removePerson('+lastRow+')');
			 $j("#person"+lastRow+" select").attr('name','data[InvoiceProduct]['+lastRow+'][almacenproduct_id]').attr('id','productid'+lastRow);
			//  $j("#productid1").addClass("in-see");
			 $j("#productid"+lastRow).removeAttr('style');
			 $j("#person"+lastRow+" input:first").attr('name','data[InvoiceProduct]['+lastRow+'][fmetrica]').attr('id','fmetrica'+lastRow);
       $j("#person"+lastRow+" input:eq(1)").attr('name','data[InvoiceProduct]['+lastRow+'][fcantidad]').attr('id','fmetrica'+lastRow);
			 $j("#person"+lastRow+" input:eq(2)").attr('name','data[InvoiceProduct]['+lastRow+'][fprecio]').attr('id','fprecio'+lastRow);
		 }

			 $('#btnplus').on('click',function(){
			 		addPerson();
			 });

		});

	</script>









		<br><br>

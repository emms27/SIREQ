<?php  
/**
 * @version 3.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 *
 */

   $options = array(
    'label' => 'Guardar Información',
    'class'=> 'btn btn-success',
    'onClick'=>"validar()",
    'type'=>'button',
    'escape' => false,
    'div' => array('class' => ''));
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
<h3 class="page-header page-header-top">Agregar Requisición<small> ...</small></h3>
<br>



<?php 
 echo $this->Form->create('Requisition', array('action'=>'add',"name"=>"FrmPass","class"=>"form-horizontal form-box"));   
    echo $this->Form->input('Requisition.id',array('type'=>'hidden'));
?>
<h4 class="form-box-header">Requisiciones</h4>
<div class="form-box-content">
 <div class="form-group">
<label class="control-label col-md-2" for="example-input-success"></label>
<?php
      echo $this->Form->input('Requisition.htsjpassignmentemployee_id',
                                  array('type'=>'select',
                                        'label'=> 'Clientes', 
				        'div' => array('class' => 'col-md-4'),
					'id'=>"example-select-chosen",
					'class'=>"form-control select-chosen",
 			                //'placeholder'=>'Seleccione la opcion deseada',
				        'autofocus'
                                       )
                            );
?>
 </div>

<div class="form-group">
<label class="control-label col-md-2" for="example-input-success"></label>
<?php
   echo $this->Form->input('Requisition.notas',
	                       array('rows' => '5', 
	 		   	     'class'=>'ckeditor',
				        'div' => array('class' => 'col-md-9'),
		                     'cols' => '5',
		                     'placeholder'=>'Escriba una observacion si es necesario'
   ));
?>
</div>

 <h4 class="form-box-header">Productos o Servicios</h4>
<div class="form-group">
<!-- example-datatables -->
<table id="mytable" class="table table-striped table-bordered table-hover">
  <tr id="person0" style="display:none;">
   <td>
    <?php 
           echo $this->Form->button('&nbsp;-&nbsp;',
				    array('type'=>'button',
				        //'div' => array('class' => 'col-md-3'),
					'title'=>'clic para remover este elemento')); 
    ?>
   </td>
   <td><?php 
      echo $this->Form->input('unused.almacenproduct_id',
                                  array('type'=>'text',
                                        'label'=> 'Productos', 
				        'div' => array('class' => 'col-md-4'),
				        'value'=>1,
					//'id'=>"example-select-chosen",
					'class'=>"form-control",
 			                //'placeholder'=>'Seleccione la opcion deseada',
				        'autofocus'
                                       )
                            );
?>
   </td>
   <td><?php 
     echo $this->Form->input('unused.cantidad',
				         array('type'=>'text',
					       'label' => 'Cantidad',
						  'size'=>'7',
						  'maxlength'=>'5',
	        			       'div' => array('class' => 'col-md-3'),
				               'id'=>"example-input-tooltip",
				               'data-toggle'=>"tooltip",
				               //'class'=>"form-control",
				               'title'=>"cantidad máxima, tres dígitos",
				               'placeholder'=>'27'
		 ));
?>
   </td>
   <td><?php          


     
                echo $this->Form->input('unused.unidad_medida',
				            array('label' => 'U/Métrica',
						  'type'=>'text',
						  'size'=>'7',
						  'maxlength'=>'5',
	        			       'div' => array('class' => 'col-md-3'),
				               'id'=>"example-input-tooltip",
				               'data-toggle'=>"tooltip",
				               //'class'=>"form-control",
				               'title'=>"Debe llevar la unidad métrica un el dígito",
				                  'placeholder'=>'29m'
						  )
                                        );
             ?></td>
	</tr>
	<tr id="trAdd"><td> 
	 <?php 
echo $this->Form->button('+',array('type'=>'button','title'=>'clic para agregar otro elemento','onclick'=>'addPerson()')); ?> </td><td></td><td></td><td></tr>
	</table><br><br>




</div>


  <?php //echo $this->Form->end($options);?>



<div class="form-group form-actions">
 <div class="col-md-10 col-md-offset-2">
   <?php  echo $this->Form->end($options); ?>
  <!-- <button class="btn btn-success"><i class="fa fa-save"></i> Guardar Información</button> -->
 </div>
</div>
 </div><?php  echo $this->Form->end(); ?>





  

<?php echo $this->Html->script(array('jquery-1.6.4.min'));?>
<script type='text/javascript'>

//jQuery.noConflict();
//(function( $ ) {
	var lastRow=0;
function validar(){
	if (document.getElementById("cantidad"+lastRow).value==""){
		alert("Falto la cantidad");
		document.getElementById("cantidad"+lastRow).focus();   
		return false;	
	}else if (document.getElementById("producto"+lastRow).value==""){
		alert("Falto el producto");
		document.getElementById("producto"+lastRow).focus();   
		return false;	
	}else document.FrmPass.submit();
}

var $j = jQuery.noConflict();
// $j is now an alias to the jQuery function; creating the new alias is optional.
 
//$j(document).ready(function() {
    //$j( "div" ).hide();
//});


//addPerson();



	function addPerson() {
		lastRow++;
		$j("#mytable tbody>tr:#person0").clone(true).attr('id','person'+lastRow).removeAttr('style').insertBefore("#mytable tbody>tr:#trAdd");
   $j("#person"+lastRow+" button").attr('onclick','removePerson('+lastRow+')');
   $j("#person"+lastRow+" input:first").attr('name','data[ProductRequisition]['+lastRow+'][cantidad]').attr('id','cantidad'+lastRow);
   $j("#person"+lastRow+" select").attr('name','data[ProductRequisition]['+lastRow+'][almacenproduct_id]').attr('id','producto'+lastRow);
   $("#person"+lastRow+" input:eq(1)").attr('name','data[ProductRequisition]['+lastRow+'][unidad_medida]').attr('id','unidad'+lastRow);
	}
	
	function removePerson(x) {
		$("#person"+x).remove();
	}




//})(jQuery);
</script>

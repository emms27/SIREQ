<?php
	//echo $this->Html->css(array('AddRemove/style'));
	//echo $this->Html->script(array('AddRemove/jquery-1.5.2.min','AddRemove/jquery-ui.min'));
        echo $this->Html->script(array('ui-lightness/jquery-1.6.4.min'));
        //echo $this->Html->script(array('ui-lightness/jquery-1.9.1','ui-lightness/jquery-ui-1.10.2.custom.min'));
?>

<style type="text/css">
body{
	font-family:arial;
	color:#666;
}
form input{
	border:2px solid #dadada;
    border-radius:7px;
    font-size:20px;
    padding:5px;
	width:250px;
}

input:focus { 
    outline:none;
    border-color:#9ecaed;
    box-shadow:0 0 10px #9ecaed;
}

form .button{
	background: -moz-linear-gradient(top,  #00b7ea 21%, #009ec3 76%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(21%,#00b7ea), color-stop(76%,#009ec3)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #00b7ea 21%,#009ec3 76%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #00b7ea 21%,#009ec3 76%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #00b7ea 21%,#009ec3 76%); /* IE10+ */
	background: linear-gradient(to bottom,  #00b7ea 21%,#009ec3 76%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00b7ea', endColorstr='#009ec3',GradientType=0 ); /* IE6-9 */
	color:#DFE9EC;
	border:none;
	cursor:pointer;
	padding:7px;
}
.txt_div{
	float:left;
	width:300px;
	margin-bottom:10px;
}
.left{
	float:left;
	width:250px;
}
.right{
	float:right;
	width:40px;
	padding-top: 11px;
}
img{
	cursor:pointer;
}
</style>
<div style="width:800px; margin:auto;padding-top:100px;">
<h1>Requisición</h1>
<p>Si es necesario añada mas bienes o servicios dando clic en <?php echo $this->Html->image("add.png",array("border"=>"0")); ?></p>
<?php 
  echo $this->Form->create('Requisition', array('action'=>'add3'));   //('Expediente');
  echo $this->Form->input('Requisition.id',array('type'=>'text','value'=>'28'));
  echo $this->Form->input('Requisition.htsjpassignment_id',array('type'=>'hidden','value'=>'1'));
?>


<h2>Productos y Servicios</h2>


	<table id="mytable" border="1">
	<tr><th></th><th>Cantidad</th><th>Producto</th><th>Unidad metrica</th><th>Gender</th></tr>
	<tr id="person0" style="display:none;">
	 <td>
          <?php echo $this->Form->button('&nbsp;-&nbsp;',
			array('type'=>'button','title'=>'Click Here to remove this person')); 
	  ?>
         </td>
		<td><?php echo $this->Form->input('unused.cantidad',array('label'=>'','type'=>'text')); ?></td>
		<td><?php 
                          echo $this->Form->input('unused.almacenproducto_id',
			      array('type'=>'select',
                                    'label'=> false,
                                    'empty' => 'Por favor, seleccione...'));
                     ?>
                </td>
		<td><?php echo $this->Form->input('unused.email',array('label'=>'','type'=>'text')); ?></td>
		<td><?php echo $this->Form->input('unused.gender',array('label'=>'','type'=>'select','options'=>array('M'=>'M','F'=>'F','T'=>'T'))); ?></td>
	</tr>
	<tr id="trAdd">
         <td><?php echo $this->Form->button('+',
			array('type'=>'button',
			      'title'=>'Agregar otro elemento',
			      'onclick'=>'addPerson()')); ?> 
         </td><td></td><td></td><td></td><td></td></tr>
	</table>

	
<br><br>
<?php echo $this->Form->end('Guardar informacion'); ?>

<script type='text/javascript'>
	var lastRow=0;
	
	function addPerson() {
		$("#mytable tbody>tr:#person0").clone(true).attr('id','person'+lastRow).removeAttr('style').insertBefore("#mytable tbody>tr:#trAdd");
		$("#person"+lastRow+" button").attr('onclick','removePerson('+lastRow+')');
  	        $("#person"+lastRow+" input:first").attr('name','data[RequisitionDetalle]['+lastRow+'][cantidad]').attr('id','personLastName'+lastRow);
  	        $("#person"+lastRow+" input:first").attr('name','data[RequisitionDetalle]['+lastRow+'][almacenproducto_id]').attr('id','personLastName'+lastRow);
		$("#person"+lastRow+" input:eq(1)").attr('name','data[RequisitionDetalle]['+lastRow+'][lastName]').attr('id','personFirstName'+lastRow);
		$("#person"+lastRow+" input:eq(2)").attr('name','data[Person]['+lastRow+'][email]').attr('id','personEmail'+lastRow);
		$("#person"+lastRow+" select").attr('name','data[Person]['+lastRow+'][gender]').attr('id','personGender'+lastRow);
 	  lastRow++;

	}
	
	function removePerson(x) { $("#person"+x).remove(); }
</script>

<?php
	echo $this->Html->css(array('AddField/style'));
	echo $this->Html->script(array('ui-lightness/jquery-1.9.1','AddField/jquery.addfield'));
?>

<div id="stylized" class="myform" style="margin:20px auto;">
<?php 
  echo $this->Form->create('Requisition', array('action'=>'add'));   //('Expediente');
  echo $this->Form->input('Requisition.id',array('type'=>'hidden','value'=>'27'));
?>
  <div id="material_comprado"  > </div>  
  <h1>Requisición</h1>
  <p>Si es necesario a&ntilde;ade el material, bien o servicio a solicitar</p>
  <table border="0">
   <tr align="center">
    <td width="68px">Cantidad</td>
    <td width="203px">Descripción <span>bien o servicio</span></td>
    <td width="80px">Unidad</td>
    <td width=”100″>Acciones</td>
   </tr>
  </table>
  <div id="div_1">
    <?php
      echo $this->Form->input('Requisition.htsjpassignment_id',array('type'=>'hidden','value'=>'1'));
      echo $this->Form->input('RequisitionDetalle.0.cantidad', 
                                  array('type'=>'text',
                                        'label'=> false,
 			                'style'=>'width:60px;'
                                       )
                            ); 

/*
      echo $this->Form->input('Requisition.htsjpassignment_id', 
                                  array('type'=>'select',
                                        'label'=> false, 
                                        'empty' => 'Por favor, seleccione...'
                                       )
                            ); 
*/

      echo $this->Form->input('RequisitionDetalle.0.almacenproducto_id',
			      array('type'=>'select',
                                    'label'=> false,
                                    'empty' => 'Por favor, seleccione...'));
   ?> 
   <input type="text"   name="cantidadmateriales[]"  style="width:80px;" />
   <input class="bt_plus" id="1" type="button" value="+" /><div class="error_form"></div>
  </div><br>
  <?php echo $this->Form->end('Guardar informacion'); ?>

 </form>
</div>

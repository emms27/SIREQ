<?php
/**
 * View alta almacenamiento de Depositos.
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 */

 echo $this->Html->script(array('jeditable/jquery.jeditable.mini','jeditable/jquery.jeditable.datepicker'));
 $attributes=array('legend'=>false);

 $tipo = array('User' => 'User', 'Grupo' => 'Grupo', 'Todos' => 'Todos');
?>
<div class="breadcrumb">
       <?php
         echo $this->Html->link('', 
                                array('controller'=>'pages','action'=>'home'),
				array('title'=>'Inicio','escape' => false,'class'=>'icon-home'));
         echo '<span class="divider">/</span>';
         echo $this->Html->link('Versiones', 
                                array('controller'=>'Avisos','action'=>'index'),
				array('title'=>'Consulta de Avisos','escape' => false));
         echo '<span class="divider">/</span>';
         echo $this->Html->link('Alta', 
                                array('controller'=>'Avisos','action'=>'alta'),
				array('title'=>'Alta de Avisos','escape' => false));

       ?>
</div><br><br>
<table border="0">
 <tr>
  <td width="4%" align="center">
   <?php echo $this->Html->image("icons/icon_add.png",array("width"=>"28px","height"=>"28px","border"=>"0")); ?>
  </td>
  <td width="96%"><h1>Agregar Version del Sistema</h1></td>
 </tr>
 <tr>
  <td colspan="2" class="arial11gris" align="left">
...<br><br>
  </td>
 </tr>
 <tr>
  <td colspan="2">

  </td>
 </tr>
</table>

<?php echo $this->Form->create('Versione',array('action'=>'edit')); 
 echo $this->Form->input('id',array('type'=>'hidden'));
?>
<!--  Informacion General -->       
<table border="0">
 <tr>
  <td><!--  Informacion del Expediente -->       
   <div class="square3_Externo">
    <b class="square3_1"><!--&nbsp;--></b>
    <b class="square3_2"><!--&nbsp;--></b>
    <b class="square3_3"><!--&nbsp;--></b>
    <b class="square3_4"><!--&nbsp;--></b>
    <div class="square3_Interno">                                                                                  
    <table border="0">
     <tr>
        <td>
	 <?php 
	    echo $this->Form->input('version', 
                                        array('type'=>'text',
                                              'label'=> 'version',
					      'size'=>'12',
					      'maxlength'=>'10'
            ));
        ?>
        </td>
        <td>
         <?php echo $this->Form->input('fecha_liberacion');  ?>
        </td>
       </tr>
       <tr>
        <td colspan="2">
	 <?php 
	    echo $this->Form->input('title', 
                                        array('type'=>'text',
                                              'label'=> 'título',
					      'size'=>'90',
					      'maxlength'=>'200'
            ));
        ?>
        </td>
       </tr>
       <tr>
        <td colspan="2" class="arial10blue" ><br><i>OBSERVACIONES</i>
   <?php 
    echo $this->Form->textarea('descripcion', 
		               array('rows' => '5', 
				     'class'=>'ckeditor',  				     
		                     'cols' => '5',
		                     'placeholder'=>'Escriba un aviso'
		              ));
     echo $this->Form->error('descripcion'); 
   ?>

	</td>
       </tr>
       <tr> <td colspan="2" align="center"><br><br><?php echo $this->Form->end('Guardar informacion'); ?></td></tr>
      </table>

<!-- FIN Informacion General -->    

      </div>
      <b class="square3_4b"></b>
      <b class="square3_3b"></b>
      <b class="square3_2b"></b>
      <b class="square3_1b"></b>
      </div> 
   </td>
  </tr>
</table>
<?php
echo $this->Ajax->datepicker('datepicker', array(
    'showButtonPanel' => true,
    'showWeek' => true,
    'showAnim' => 'slide',
    'changeMonth' => true,
    'changeYear' => true,
    'dateFormat' => 'yy-mm-dd',
    'altField'=>"#alternate",
    'altFormat'=>"DD, d MM, yy"
));
?>
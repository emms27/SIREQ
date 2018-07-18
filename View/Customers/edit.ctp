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
?>
<div class="breadcrumb">
       <?php
         echo $this->Html->link('', 
                                array('controller'=>'pages','action'=>'home'),
				array('title'=>'Inicio','escape' => false,'class'=>'icon-home'));
         echo '<span class="divider">/</span>';
         echo $this->Html->link('Partes', 
                                array('controller'=>'Involucrados','action'=>'index'),
				array('title'=>'Parte','escape' => false));
         echo '<span class="divider">/</span>';
         echo $this->Html->link('Editar', 
                                array('controller'=>'Involucrados','action'=>'index'),
				array('title'=>'Editar Parte','escape' => false));

       ?>
</div><br><br>
<table border="0">
 <tr>
  <td width="4%" align="center">
   <?php echo $this->Html->image("icons/icon_add.png",array("width"=>"28px","height"=>"28px","border"=>"0")); ?>
  </td>
  <td width="96%"><h1>Editar Parte</h1></td>
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

<?php 
 $osexo=array('F'=>'Femenino','M'=>'Masculino');

 $asexo=array('legend'=>false,
	      'label'=>false,
              'id'=>'enable'
              //'value'=>''
             );
 echo $this->Form->create('Involucrado',array('action'=>'edit')); echo $this->Form->input('id',array('type'=>'hidden')); 
?>
<table border="0">
 <tr>
  <td><!--  Informacion del Expediente -->       
   <div class="square3_Externo">
    <b class="square3_1"><!--&nbsp;--></b>
    <b class="square3_2"><!--&nbsp;--></b>
    <b class="square3_3"><!--&nbsp;--></b>
    <b class="square3_4"><!--&nbsp;--></b>
    <div class="square3_Interno">                                                                                  
<table border="0" >
 <tr><td class="arial12blueitalic">PARTE</td></tr>
 <tr>
  <td width="50%" valign="top"><!-- Informacion de la Parte -->
   <table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
     <td><!-- Informacion de la Parte -->
   <div class="square3_Externo">
    <b class="square3_1"><!--&nbsp;--></b>
    <b class="square3_2"><!--&nbsp;--></b>
    <b class="square3_3"><!--&nbsp;--></b>
    <b class="square3_4"><!--&nbsp;--></b>
    <div class="square3_Interno">                                            
      <table border="0">
       <tr>
        <td colspan="2" align="right">  <!-- Estado -->        
  	    <?php 
	      echo $this->Form->input('htsjpestado_id', 
                                  array('type'=>'select',
                                        'label'=> 'Origen', 
                                        'empty' => 'Por favor, seleccione...'
              ));
	   ?>
        </td>
       </tr>
       <tr>
        <td colspan="2"><!-- Nombre Completo -->
         <table border="0">
          <tr>
           <td width="34%">
             <?php
                 echo $this->Form->input('nombre',
				            array('label' => 'nombre',
						  'type'=>'text',
						  'size'=>'30',
						  'maxlength'=>'50',
				                  'placeholder'=>'Emmanuel',
		 ));
	      ?>
            </td>
            <td width="33%">
             <?php
                echo $this->Form->input('apepat',
				            array('label' => 'apellido paterno',
						  'type'=>'text',
						  'size'=>'30',
						  'maxlength'=>'50',
				                  'placeholder'=>'Sanchez'
						  )
                                        );
	     ?>
            </td>
            <td width="33%">
 	      <?php
                 echo $this->Form->input('apemat',
				            array('label' => 'apellido materno',
						  'type'=>'text',
						  'size'=>'30',
						  'maxlength'=>'50',
				                  'placeholder'=>'Carreon',
						  )
                                        );
	      ?>
            </td>
           </tr>
          </table>        
       </td><!-- FIN Nombre Completo -->
      </tr>
      <tr>
       <td colspan="2">
        <table border="0">
         <tr>
          <td width="20%"></td>
          <td width="30%" align="center">
           <?php  if ($this->request->data['Involucrado']['sexo']=='F'){ ?>
            <p class="switch">
             <label for="EnableF" class="cb-enable selected"><span class="arial10gris">Femenino</span></label>
             <label for="EnableM" class="cb-disable"><span class="arial10gris">Masculino</span></label>
            </p>
         <?php }else{ ?>
            <p class="switch">
            <label for="EnableF" class="cb-enable"><span class="arial10gris">Femenino</span></label>
            <label for="EnableM" class="cb-disable selected"><span class="arial10gris">Masculino</span></label>
            </p>
         <?php } echo $this->Form->error('sexo'); ?>
          </td>
          <td width="20%" align="center">
		 <?php 
		  echo $this->Form->input('edad',
						    array('label' => 'Edad',
							  'type'=>'text',
							  'size'=>'4',
							  'maxlength'=>'3',
						          'placeholder'=>'26'
							  )
		                                );
		 ?>

          </td>
          <td width="30%"></td>
         </tr>
	</table>

       </td>
      </tr>
      <tr>
       <td width="50%" align="center">
        <?php echo $this->EstadoCivil->ComboEstadoCivil('estadocivil','Estado Civil',null,null); ?>
       </td>
       <td width="50%" align="center">
        <?php echo $this->Escolaridad->ComboEscolaridad('escolaridad','Escolaridad',null,null); ?>
       </td>
      </tr>
      <tr>
       <td colspan="2" align="center"><!-- Identificacion -->        
        <?php echo $this->Ocupaciones->ComboOcupaciones('ocupacion','Ocupación',null,null); ?>
       </td>
      </tr>
      <tr>
        <td colspan="2" align="center">  <!-- email -->        
		 <?php 
		  echo $this->Form->input('email',
				          array('label' => 'Email',
							  'type'=>'text',
							  'size'=>'50',
							  'maxlength'=>'255',
						          'placeholder'=>'esanchez@htsjpuebla.gob.mx'
							  )
		                                );
		 ?>
       </td>  <!-- FIN email -->        
      </tr>
      <tr>
       <td colspan="2" align="center"><!-- Identificacion -->        
        <table border="0">
         <tr>
          <td width="50%" align="center">
           <?php echo $this->Identificacion->ComboIdentificacion('tidentificacion','Identificacion',null,null); ?>   
          </td>
          <td width="50%" align="center">
	    <?php
                 echo $this->Form->input('nidentificacion',
				            array('label' => 'Núm. Identicación',
						  'type'=>'text',
						  'size'=>'20',
						  'maxlength'=>'13',
				                  'placeholder'=>'1234567890123',
						  )
                                        );
	      ?>
         </td>  
        </tr>
       </table>  
      </td>  <!-- FIN Identificacion -->        
     </tr>
    </table>  <!-- FIN Informacion de la Parte --> 
  </div>
  <b class="square3_4b"></b>
  <b class="square3_3b"></b>
  <b class="square3_2b"></b>
  <b class="square3_1b"></b>
  </div>
   </td>  
  </tr>
 </table>
<div style="visibility:hidden">
<?php 
 echo $this->Form->radio('sexo',$osexo,$asexo);
?>
</div>
   </td>
  </tr>
  <tr><td align="center"><br><br><?php  echo $this->Form->end('Guardar informacion');  ?></td></tr>
 </table>
  </div>
  <b class="square3_4b"></b>
  <b class="square3_3b"></b>
  <b class="square3_2b"></b>
  <b class="square3_1b"></b>
  </div>      
  </td>
 </tr>
</table>

<script type="text/javascript">
$(document).ready( function(){ 
	$(".cb-enable").click(function(){
		var parent = $(this).parents('.switch');
		$('.cb-disable',parent).removeClass('selected');
		$(this).addClass('selected');
		$('.checkbox',parent).attr('checked', true);
	});
	$(".cb-disable").click(function(){
		var parent = $(this).parents('.switch');
		$('.cb-enable',parent).removeClass('selected');
		$(this).addClass('selected');
		$('.checkbox',parent).attr('checked', false);
	});
});
</script>

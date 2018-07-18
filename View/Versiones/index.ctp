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
         echo $this->Html->link('Estado de Cuenta', 
                                array('controller'=>'Versiones','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
         echo '<span class="divider">/</span>';
         echo $this->Html->link('Consulta', 
                                array('controller'=>'Versiones','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
         echo '<span class="divider">/</span>';
         echo $this->Html->link('Estado de Cuenta', 
                                array('controller'=>'Versiones','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
       ?>
</div><br><br>
<table border="0">
 <tr>
  <td width="4%" align="center">
   <?php echo $this->Html->image("icons/icon_view.png",array("width"=>"28px","height"=>"28px","border"=>"0")); ?>
  </td>
  <td width="55%"><h1>Consulta de Cuenta</h1></td>
  <td width="45%">
   <?php echo $this->Form->create('Versione',array('action'=>'index')); ?>
   <table border="0">
    <tr>
     <td><?php  echo $this->Form->input('scheque', 
					array('label'=>'',
  			   		      'id'=>'sorden',
		 			      'type'=>'search',
					      'placeholder'=>'Buscar cheque',
					      'style'=>'border:1px solid gray;',
		                              'x-webkit-speech speech required onspeechchange'=>'startSearch();',
                                              'autocapitalize'=>"on", 'autocomplete'=>"on",'autocorrect'=>"on" 
            )); 
          ?>
      </td>
      <td><?php echo $this->Form->end('Buscar'); ?></td>
    </tr>
   </table>
  </td>
 </tr>
 <tr>
  <td colspan="3" class="arial11gris" align="left">
   La consulta de cheques te muestran una línea temporal de todos los cheques dados de alta en el Sistema desde el principio de los tiempos.<br><br>
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
  if (isset($this->data['Versione']['scheque'])){
   $lang=$this->data['Versione']['scheque'];
   echo $this->Paginator->options(array('url'=> array_merge(array('scheque'=>$lang),$this->passedArgs))); 
  }
  echo $this->Paginator->prev('« Anterior', null, null, array('class' => 'disabled')); 
  echo $this->Paginator->numbers(array('modulus'=>'9','separator' => '')); 
  echo $this->Paginator->next('Siguiente »', null, null, array('class' => 'disabled')); 
?> 
</div></br></br>
<table border=0  class="testgrid">
 <?php
   echo $this->Html->tableHeaders(array(
					'#',
					$this->Paginator->sort('Versione.title', 'Title'),
					$this->Paginator->sort('Versione.version', 'Version'),
					$this->Paginator->sort('Versione.fecha', 'Fecha'),
					'Acci&oacute;n'
   )); 
   $c=1;foreach ($cheque as $cheque): 
 ?>
    <tr>
    <td><?php echo $c; ?></td>
     <td><?php echo $cheque['Versione']['title']; ?></td>
     <td><?php echo $cheque['Versione']['version']; ?></td>
     <td><?php echo $cheque['Versione']['fecha_liberacion']; ?></td>
     <td><center>
      <ul class="actions-tools">
       <li>
       <?php	
	echo $this->Html->link(__('Ver'), 
	  	array('controller'=>'Versiones','action' => 'edit', $cheque['Versione']['id']), 
		array('class'=>'edit','title'=>'Ver más'));

       ?>
       </li>
      </ul></center>
     </td>
    </tr>
    <?php endforeach; ?>
</table>
<div class="paging">
<?php echo $this->Paginator->prev('« Anterior', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->numbers(array('modulus'=>'9','separator' => ''));  ?>
<?php echo $this->Paginator->next('Siguiente »', null, null, array('class' => 'disabled')); ?> 
</div>

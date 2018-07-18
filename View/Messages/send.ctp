<?php
/**
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 *
 */
$encabezado= $this->Html->tableHeaders(
       array('',
             $this->Paginator->sort('Message.almacenuser_id', 'De'),
             $this->Paginator->sort('Message.almacenuser2_id', 'Para'),
             $this->Paginator->sort('Message.asunto', 'Asunto'),
             $this->Paginator->sort('Message.fecha_registro', 'Recibido'),
	     'Acci&oacute;n'));

?>

<ul id="nav-info" class="clearfix">
<li>
<?php
     echo $this->Html->link('',
                                array('controller'=>'pages','action'=>'home'),
				array('title'=>'Inicio','escape' => false,'class'=>'fa fa-home')); ?>
</li>
<li>
<?php
     echo $this->Html->link('Partes',
                                array('controller'=>'Assignments','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
?>
</li>
<li class="active">
<?php
         echo $this->Html->link('Consulta',
                                array('controller'=>'Depositos','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
?>
</li>
</ul>
<h3 class="page-header page-header-top"><i class="fa fa-inbox"></i> Bandeja de Salida<small>    En la bandeja de salida muestra una línea temporal de todas los mensajes enviados de la sección de contacto del  Sistema desde el principio de los tiempos.</small></h3>
<p class="well">» Total de registros encontrados: <strong><?php echo $this->Paginator->counter(array('format' => '%count%')); ?></strong>.</br> » Se mostrar&aacute; un total de <strong>50</strong> registros por p&aacute;gina.</br>
    » Usted se encuentra consultando la p&aacute;gina <strong><?php echo $this->Paginator->counter(array('format' => '%page% de %pages%')); ?></strong>.</p>

   <?php echo $this->Form->create('Message',array('action'=>'index'));  ?>
<div class="form-group">
 <div class="col-md-12">
  <div class="input-group">
   <?php
  echo $this->Form->input('sparte', array('label'=>'',
	 			              'type'=>'search',
  			   		      'id'=>'sdeposito',
					      'placeholder'=>'Busca elemento',
					      'class'=>'form-control',
		                              'x-webkit-speech speech required onspeechchange'=>'startSearch();',
                                              'autocapitalize'=>"on", 'autocomplete'=>"on",'autocorrect'=>"on"
            ));
          ?>
   <span class="input-group-btn"><button class="btn btn-success"><i class="fa fa-search"></i>&nbsp;</button></span>
   <span class="input-group-btn">
    <?php
      echo $this->Html->link('<i class="fa fa-repeat"></i>&nbsp;',
                                array('controller'=>'Assignments','action'=>'index'),
				array('title'=>'Nueva Busqueda',
				      'escape' => false,
				      'class'=>'btn btn-default',
				      'data-title'=>'Nueva Busqueda',
				      'rel'=>"tooltip",
				      'data-placement'=>"top",
				      'data-trigger'=>"hover"
         ));

      echo $this->Form->end(); ?></span>
  </div>
 </div>
</div></form><br><br><br>
<table id="example-datatables" class="table table-striped table-bordered table-hover">
 <?php echo $encabezado; ?>

 <?php $d=1; foreach ($mensajes as $ficha):
   ?>
     <tr>
    <td><?php
      switch ($ficha['Message']['estado']){
	  case "Leído": $l="success";  break;
	  case "Enviado": $l="default";     break;
	 }
      ?>
      <span class="label label-xs label-<?php echo $l.'">'.$ficha['Message']['estado']; ?></span>
     </td>
      <td><?php echo $ficha['User']['Personal']['namefull']; ?></td>
      <td><?php echo $ficha['Contacto']['Personal']['namefull']; ?></td>
      <td><?php echo $ficha['Message']['asunto']; ?></td>
      <td><?php echo $ficha['Message']['fecha_registro']; ?></td>
      <td>
      <div class="btn-group">
	       <?php
		echo $this->Html->link(_(''),
 	  	        array('action' => 'view', $ficha['Message']['id']),
			array('class'=>'btn btn-xs btn-info fa fa-search','data-title'=>'Ver este elemento',"data-toggle"=>"tooltip",'title'=>'Ver este elemento','data-placement'=>"top",'data-trigger'=>"hover"));
	       ?>
      </div>
     </td>
    </tr>
    <?php $d++; endforeach; ?>
</table>
<div class="paging">
<?php echo $this->Paginator->prev('« Anterior', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->numbers(array('modulus'=>'9','separator' => ''));  ?>
<?php echo $this->Paginator->next('Siguiente »', null, null, array('class' => 'disabled')); ?>
</div><br><br>

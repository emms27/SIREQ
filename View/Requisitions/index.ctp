<?php
/**
 * @version 3.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 *
 */
$encabezado= $this->Html->tableHeaders(array('#',
    $this->Paginator->sort('Requisition.id', '<i class="fa fa-file-text-o"></i> ID', array('escape' => false)),
    $this->Paginator->sort('Requisition.cliente', 'Cliente', array('escape' => false)),
    $this->Paginator->sort('Requisition.status', '<i class="fa fa-tasks"></i> Estado', array('escape' => false)),
    $this->Paginator->sort('Requisition.fecha_registro', '<i class="fa fa-clock-o"></i> Registro', array('escape' => false)),
    $this->Paginator->sort('Requisition.fecha_entregada', '<i class="fa fa-clock-o"></i> Entregada', array('escape' => false)),
    '<i class="fa fa-bolt"></i> Acci&oacute;n'
   ));

?>

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
                                array('controller'=>'Depositos','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
?>
</li>
</ul>
<h3 class="page-header page-header-top">Consulta Post<small> La consulta de post te muestran una línea temporal de todos los post dadas de alta en el Sistema desde el principio de los tiempos.</small></h3>
<p class="well">» Total de registros encontrados: <strong><?php echo $this->Paginator->counter(array('format' => '%count%')); ?></strong>.</br> » Se mostrar&aacute; un total de <strong>50</strong> registros por p&aacute;gina.</br>
    » Usted se encuentra consultando la p&aacute;gina <strong><?php echo $this->Paginator->counter(array('format' => '%page% de %pages%')); ?></strong>.</p>

   <?php echo $this->Form->create('Requisition',array('action'=>'index'));  ?>
<div class="form-group">
 <div class="col-md-12">
  <div class="input-group">
   <?php
  echo $this->Form->input('sparte', array('label'=>'',
	 			              'type'=>'search',
  			   		      'id'=>'sdeposito',
					      'placeholder'=>'Busca una parte',
					      'class'=>'form-control',
		                              'x-webkit-speech speech required onspeechchange'=>'startSearch();',
                                              'autocapitalize'=>"on", 'autocomplete'=>"on",'autocorrect'=>"on"
            ));
          ?>
   <span class="input-group-btn"><button class="btn btn-success"><i class="fa fa-search"></i>&nbsp;</button></span>
   <span class="input-group-btn">
    <?php
      echo $this->Html->link('<i class="fa fa-repeat"></i>&nbsp;',
                                array('controller'=>'Requisitions','action'=>'index'),
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
<?php echo $encabezado; $p=1; foreach ($parte as $row): ?>
    <tr>
   	<td><?php echo $p; ?></td>
        <td><?php echo $row['Requisition']['id'];  ?></td>
     <td><?php echo $row['Personal']['Assignment']['descripcion']; ?><br><strong><?php echo $row['Personal']['namefull']; ?></strong></td>
    <td><?php
      switch ($row['Requisition']['status']){
	  case "En proceso": $l="default";  break;
	  case "Autorizada con Modificación": $l="info";     break;
	  case "Cancelada":  $l="danger";   break;
	  case "Cancelada por Tiempo":  $l="danger";   break;
	  case "Entregada":    $l="success";  break;
	 }
      ?>
      <span class="label label-<?php echo $l.'">'.$row['Requisition']['status']; ?></span>
     </td>
     <td><?php echo $row['Requisition']['fecha_registro']; ?> </td>
     <td><?php echo $row['Requisition']['fecha_entregada']; ?> </td>
<td class="text-center">
<div class="btn-group">
	       <?php
		echo $this->Html->link(_(''),
		  	array('action' => 'view', $row['Requisition']['id']),
			array('class'=>'btn btn-xs btn-info fa fa-search',"data-toggle"=>"tooltip","title"=>"Details")
               );

	       ?>
      </div>
     </td>
    </tr>
    <?php $p++; endforeach; ?>
</table>
<div class="paging">
<?php echo $this->Paginator->prev('« Anterior', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->numbers(array('modulus'=>'9','separator' => ''));  ?>
<?php echo $this->Paginator->next('Siguiente »', null, null, array('class' => 'disabled')); ?>
</div><br><br>

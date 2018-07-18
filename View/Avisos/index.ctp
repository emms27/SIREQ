<?php
/**
 * @version 3.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 *
 */
$encabezado= $this->Html->tableHeaders(array('#',
    $this->Paginator->sort('Aviso.aviso', '<i class="fa fa-exclamation-triangle"></i> Aviso', array('escape' => false)),
    $this->Paginator->sort('Aviso.role_id', '<i class="fa fa-users"></i> Grupo', array('escape' => false)),
    $this->Paginator->sort('Aviso.fecha_inicio', '<i class="fa fa-clock-o"></i> Inicio', array('escape' => false)),
    $this->Paginator->sort('Aviso.fecha_fin', '<i class="fa fa-clock-o"></i> Fin', array('escape' => false)),
    $this->Paginator->sort('Aviso.fecha_registro', '<i class="fa fa-clock-o"></i> Creación', array('escape' => false)),
    $this->Paginator->sort('Aviso.ver', '<i class="fa fa-tasks"></i> Status', array('escape' => false))
   ));

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
                                array('controller'=>'Avisos','action'=>'index'),
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
<h3 class="page-header page-header-top">Consulta de Avisos<small> La consulta de Avisos te muestran una línea temporal de todas los Avisos dados de alta en el Sistema desde el principio de los tiempos.</small></h3>
<p class="well">» Total de registros encontrados: <strong><?php echo $this->Paginator->counter(array('format' => '%count%')); ?></strong>.</br> » Se mostrar&aacute; un total de <strong>50</strong> registros por p&aacute;gina.</br>
    » Usted se encuentra consultando la p&aacute;gina <strong><?php echo $this->Paginator->counter(array('format' => '%page% de %pages%')); ?></strong>.</p>

   <?php echo $this->Form->create('Aviso',array('action'=>'index'));  ?>
<div class="form-group">
 <div class="col-md-12">
  <div class="input-group">
   <?php
  echo $this->Form->input('scheque', array('label'=>'',
	 			              'type'=>'search',
  			   		      'id'=>'scheque',
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
                                array('controller'=>'Avisos','action'=>'index'),
				array('title'=>'Nueva Busqueda',
				      'escape' => false,
				      'class'=>'btn btn-default',
				      'data-title'=>'Nueva Busqueda',
				      'rel'=>"tooltip",
				      'data-placement'=>"top",
				      'data-trigger'=>"hover"
         ));

      echo $this->Form->end(); ?></span>
      <span class="input-group-btn">
       <?php
         echo $this->Html->link('<i class="fa fa-plus"></i>&nbsp;',
                                   array('controller'=>'Avisos','action'=>'add'),
   				array('title'=>'Agregar Aviso',
   				      'escape' => false,
   				      'class'=>'btn btn-danger',
   				      'data-title'=>'Agregar Aviso',
   				      'rel'=>"tooltip",
   				      'data-placement'=>"top",
   				      'data-trigger'=>"hover"
            ));

         echo $this->Form->end(); ?></span>
  </div>
 </div>
</div></form><br><br><br>
<table id="example-datatables" class="table table-striped table-bordered table-hover">
<?php echo $encabezado; $p=1; foreach ($row as $row): ?>
    <tr>
   	<td><?php echo $p; ?></td>
        <td><?php echo $row['Aviso']['aviso'];  ?></td>
        <td><?php if ($row['Role']['name']==NULL) echo "Todos"; else echo $row['Role']['name'];  ?></td>
        <td><?php echo $row['Aviso']['fecha_inicio'];  ?></td>
        <td><?php echo $row['Aviso']['fecha_fin'];  ?></td>
        <td><?php echo $row['Aviso']['fecha_registro'];  ?></td>

     <td>
      <?php
       if ($row['Aviso']['ver']==0) $sclass="fa fa-times text-danger";
       else $sclass="fa fa-check text-success";

         echo $this->Html->link('<i class="'.$sclass.'"></i>',
                                array('controller'=>'Avisos','action'=>'status',$row['Aviso']['id']),
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
    <?php $p++; endforeach; ?>
</table>
<div class="paging">
<?php echo $this->Paginator->prev('« Anterior', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->numbers(array('modulus'=>'9','separator' => ''));  ?>
<?php echo $this->Paginator->next('Siguiente »', null, null, array('class' => 'disabled')); ?>
</div><br><br>

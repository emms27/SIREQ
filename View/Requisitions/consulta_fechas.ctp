<?php
 echo $this->Html->css(array('../themes/uadmin/colorbox-master/example1/colorbox'));
 echo $this->Html->script(array('../themes/uadmin/colorbox-master/jquery.colorbox'));

 $options=array(''=>'Todos','Cancelada'=>'Cancelada','Autorizada con Modificación'=>'Autorizadas','Entregada'=>'Entregada','En proceso'=>'En proceso'); 
 $attributes=array('legend'=>false); 
?>

<ul id="nav-info" class="clearfix">
<li>
<?php 
 echo $this->Html->link('', 
                                array('controller'=>'pages','action'=>'home'),
				array('title'=>'Inicio','escape' => false,'class'=>'fa fa-home'));
 ?>
</li>
<li>
<?php 
         echo $this->Html->link('Fichas', 
                                array('controller'=>'Requisitions','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
 ?>
</li>
<li>
<?php
         echo $this->Html->link('Consulta', 
                                array('controller'=>'Requisitions','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
?>
</li>
<li class="active">
<?php 
         echo $this->Html->link('Rango de Fechas', 
                                array('controller'=>'Requisitions','action'=>'consulta_fechas'),
				array('title'=>'Inicio','escape' => false));
?>
</li>
</ul>
<h3 class="page-header page-header-top">  Reporte de <I>Requisiciones</I> <small>es una consulta según el status y el rango de fechas (fecha de registro) de la requisición dadas de alta por el usuario; para mostrar una línea temporal de los movimientos en el Sistema.</small></h3>
<?php echo $this->Form->create('Requisition',array('action'=>'consulta_fechas',"class"=>"form-horizontal form-box"));
?>
<h4 class="form-box-header"><i class="fa fa-search"></i> Filtro de Busqueda</h4>
<div class="form-box-content">

<div class="form-group">
 <label class="control-label col-md-2" for="example-input-daterangepicker">Rango de Fechas</label>
 <div class="col-md-4">
  <div class="input-group">
    <?php 
          echo $this->Form->input('daterange',array('label'=>false,
						'id' => 'example-input-daterangepicker',
						'size' => '10',
						'value'=>date('m/d/Y').' - '.date('m/d/Y'),
					       	'type' => 'text',
					        'placeholder'=>'Rango de Fecha',
						'class'=>"form-control input-daterangepicker",
						'readonly'=>'readonly'
          ));

      ?>
   <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
  </div>
 </div>
</div>

 
 <div class="form-group">
<label class="control-label col-md-2" for="example-input-success">Clientes</label>
<?php
	    echo $this->Form->input('htsjpassignmentemployee_id', 
		                                        array('type'=>'select',
			 			              'div' => array('class' => 'col-md-4'),
		                                              'label'=> false,
							      'id'=>"example-select-chosen",
							      'class'=>"form-control select-chosen",
		                                              'empty' => 'Por favor, seleccione...'//,
							      //'onchange' => 'this.form.submit()'
                                                              )
                                    );
?>
 </div>
<!--
 <div class="form-group">
<label class="control-label col-md-2" for="example-input-success">Productos</label>
<?php
	    echo $this->Form->input('htsjpassignmentemployee_id', 
		                                        array('type'=>'select',
			 			              'div' => array('class' => 'col-md-4'),
		                                              'label'=> false,
							      'id'=>"example-select-chosen",
							      'class'=>"form-control select-chosen",
		                                              'empty' => 'Por favor, seleccione...'//,
							      //'onchange' => 'this.form.submit()'
                                                              )
                                    );
?>
 </div>
-->
<div class="form-group">
 <label class="control-label col-md-2">Status</label>
 <div class="col-md-5">
    <?php
      echo $this->Form->input('status', 
                                  array('type'=>'select',
                                        'label'=> false,
					'options' => array($options),
					'default'=>'En Juzgado',
					'id'=>"example-select-chosen",
					'class'=>"form-control select-chosen"
                                       )
                            );
     ?>
 </div><button class="btn btn-success"><i class="fa fa-search"></i> Buscar</button></div>
<?php  echo $this->Form->end(); ?>
</div>

<?php
//debug($this->data);
  if (((isset($this->data['Requisition']['daterange'])) && 
      (isset($this->data['Requisition']['status']))) ||
     ((isset($this->passedArgs['daterange'])) && 
      (isset($this->passedArgs['status'])))){
  if ((isset($this->data['Requisition']['daterange'])) && 
      (isset($this->data['Requisition']['status']))){
   $fecha=explode(' - ',$this->data['Requisition']['daterange']);
   $fecinicial=explode('/',$fecha[0]);
   $fecfinal=explode('/',$fecha[1]);
   $lang1=$fecinicial[2].'-'.$fecinicial[0].'-'.$fecinicial[1];//.' 00:00:00';
   $lang2=$fecfinal[2].'-'.$fecfinal[0].'-'.$fecfinal[1];//.' 23:59:59';
   $lang3=$this->data['Requisition']['status'];
   $lang4=$this->data['Requisition']['htsjpassignmentemployee_id'];
  }else if ((isset($this->passedArgs['daterange'])) && 
            (isset($this->passedArgs['status']))){
   $fecha=explode(' - ',$this->passedArgs['daterange']);
   $fecinicial=explode('/',$fecha[0]);
   $fecfinal=explode('/',$fecha[1]);
   $lang1=$fecinicial[2].'-'.$fecinicial[0].'-'.$fecinicial[1];//.' 00:00:00';
   $lang2=$fecfinal[2].'-'.$fecfinal[0].'-'.$fecfinal[1];//.' 23:59:59';
   $lang3=$this->passedArgs['status'];
   $lang4=$this->passedArgs['htsjpassignmentemployee_id'];
  }else $lang1=$lang2=$lang3=""; 
?>
<p class="well">» Total de registros encontrados: <strong><?php echo $this->Paginator->counter(array('format' => '%count%')); ?></strong>.</br> » Se mostrar&aacute; un total de <strong>50</strong> registros por p&aacute;gina.</br>
    » Usted se encuentra consultando la p&aacute;gina <strong><?php echo $this->Paginator->counter(array('format' => '%page% de %pages%')); ?></strong>.</p>
<br>
    <?php	
$encabezado= $this->Html->tableHeaders(array('#',
    $this->Paginator->sort('Requisition.id', '<i class="fa fa-file-text-o"></i> ID', array('escape' => false)),
    $this->Paginator->sort('Requisition.cliente', 'Cliente', array('escape' => false)),
    $this->Paginator->sort('Requisition.status', '<i class="fa fa-tasks"></i> Estado', array('escape' => false)),
    $this->Paginator->sort('Requisition.fecha_registro', '<i class="fa fa-clock-o"></i> Registro', array('escape' => false)),
    $this->Paginator->sort('Requisition.fecha_autorizada', '<i class="fa fa-clock-o"></i> Autorizada', array('escape' => false)),
    $this->Paginator->sort('Requisition.ver', '<i class="fa fa-tasks"></i> Status', array('escape' => false)),
    '<i class="fa fa-bolt"></i> Acci&oacute;n'
   ));
   ?>

<div class="form-group">

<div class="input-group">
<div class="input-group-btn">
<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Acción <span class="caret"></span></button>
<ul class="dropdown-menu">
<li>
    <?php
     echo $this->Html->link('<i class="fa fa-print"></i> Imprimir', 
		array('controller' => 'Requisitions',
		      'action' => 'reporte_fechas_pdf',1,'?' => array('from' => $lang1, 
						                      'to' => $lang2, 
							              'status' => $lang3,
							              'htsjpassignmentemployee_id' => $lang4
		)),
		array('title'=>'Reporte en formato pdf','target'=>'_blank','escape' => false));
   ?>
</li>
<li><a class='inline' href="#inline_content"><i class="fa fa-area-chart"></i> Graficar</a></li>
</ul>
</div>
</div>
</div>
<script>$(document).ready(function() {$(".inline").colorbox({inline:true, width:"50%"});});</script>
<script src="https://www.google.com/jsapi"></script>


                <div style='display:none'>
			<div id='inline_content' style='padding:10px; background:#fff;'>
			<p><strong>Gráfica</strong></p>
			<p>
		<?php
			echo $this->GChart->start('test');
			echo $this->GChart->visualize('test', $data);
		?>
			</p>
			
			<p><strong></strong></p>
			</div>
		</div>

		<?php
			//echo $this->GChart->start('test2');
			//echo $this->GChart->visualize('test2', $data);
		?>
<table id="example-datatables" class="table table-striped table-bordered table-hover">
 <?php  echo $encabezado; $d=1; foreach ($deposito as $row):      ?>
   <tr>
   	<td><?php echo $d; ?></td>
        <td><?php echo $row['Requisition']['id'];  ?></td>
     <td><?php echo $row['AssignmentPersonal']['Assignment']['descripcion']; ?><br><strong><?php echo $row['AssignmentPersonal']['Personal']['namefull']; ?></strong></td>
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
        <td><?php echo $row['Requisition']['fecha_autorizada']; ?> </td>
     <td>
      <?php
       if ($row['Requisition']['ver']==0) $sclass="fa fa-times text-danger";
       else $sclass="fa fa-check text-success";

         echo $this->Html->link('<i class="'.$sclass.'"></i>',
                                array('controller'=>'Requisitions','action'=>'status',$row['Requisition']['id']),
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

    <?php $d++; endforeach; ?>
</table>
<div class="paging">
<?php echo $this->Paginator->prev('« Anterior', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->numbers(array('modulus'=>'9','separator' => ''));  ?>
<?php echo $this->Paginator->next('Siguiente »', null, null, array('class' => 'disabled')); ?> 
</div><br><br>
<?php } ?>

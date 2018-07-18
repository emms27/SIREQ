<?php  
/**
 * View alta almacenamiento de Depositos.
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 *
 */
$encabezado= $this->Html->tableHeaders(array('#',
    $this->Paginator->sort('EstadoCuenta.folio', 'Folio', array('escape' => false)),
    $this->Paginator->sort('EstadoCuenta.cuenta', 'Cuenta', array('escape' => false)),
    $this->Paginator->sort('EstadoCuenta.referencia', 'Referencia', array('escape' => false)),
    $this->Paginator->sort('EstadoCuenta.tmovimiento', '<i class="fa fa-tasks"></i> Tipo Mov.', array('escape' => false)),
    $this->Paginator->sort('EstadoCuenta.importe', '<i class="fa fa-money"></i> Importe', array('escape' => false)),
    $this->Paginator->sort('EstadoCuenta.fecha_operacion', '<i class="fa fa-clock-o"></i> Operación', array('escape' => false)),
    $this->Paginator->sort('EstadoCuenta.ddfmcodigotransaccione_id', '<i class="fa fa-bolt"></i> Código', array('escape' => false)),
    $this->Paginator->sort('EstadoCuenta.status', '<i class="fa fa-bolt"></i> Status', array('escape' => false)),
    '<i class="fa fa-bolt"></i> Acci&oacute;n'
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
      echo $this->Html->link('Estado de Cuenta', 
                                array('controller'=>'EstadoCuentas','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
?>
</li>
<li>
<?php
  echo $this->Html->link('Consulta', 
                                array('controller'=>'EstadoCuentas','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
?>
</li>
<li class="active">
<?php
           echo $this->Html->link('Estado de Cuenta', 
                                array('controller'=>'EstadoCuentas','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
?>
</li>
</ul>
<h3 class="page-header page-header-top">Consulta de Cuenta<small> La consulta de cheques te muestran una línea temporal de todos los cheques dados de alta en el Sistema desde el principio de los tiempos.</small></h3>
<p class="well">» Total de registros encontrados: <strong><?php echo $this->Paginator->counter(array('format' => '%count%')); ?></strong>.</br> » Se mostrar&aacute; un total de <strong>50</strong> registros por p&aacute;gina.</br>
    » Usted se encuentra consultando la p&aacute;gina <strong><?php echo $this->Paginator->counter(array('format' => '%page% de %pages%')); ?></strong>.</p>
   <?php echo $this->Form->create('EstadoCuenta',array('action'=>'index')); ?>
<div class="form-group">
 <div class="col-md-12">
  <div class="input-group">
   <?php  
      echo $this->Form->input('sfolio', 
					array('label'=>'',
  			   		      'id'=>'sfolio',
		 			      'type'=>'search',
					      'placeholder'=>'Buscar folio',
					      'class'=>'form-control',
		                              'x-webkit-speech speech required onspeechchange'=>'startSearch();',
                                              'autocapitalize'=>"on", 'autocomplete'=>"on",'autocorrect'=>"on" 
            )); 
          ?>
   <span class="input-group-btn"><button class="btn btn-success"><i class="fa fa-search"></i>&nbsp;</button></span>
   <span class="input-group-btn">
 <?php        
      echo $this->Html->link('<i class="fa fa-repeat"></i>&nbsp;',
                                array('controller'=>'EstadoCuentas','action'=>'index'),
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
 <?php echo $encabezado; $c=1;foreach ($cheque as $cheque): ?>
    <tr>
    <td><?php echo $c; ?></td>
     <td><?php echo $cheque['EstadoCuenta']['folio']; ?></td>
     <td><?php echo $cheque['EstadoCuenta']['cuenta']; ?></td>
     <td>
      <?php 
        echo $this->Html->link($cheque['EstadoCuenta']['referencia'],    	  	                   
                   array('controller'=>'Depositos','action' => 'view',$cheque['EstadoCuenta']['referencia']), 
		   array('escape' => false,'title'=>'Ver Depósito')); 
      ?>
     </td>
     <td><?php echo $cheque['EstadoCuenta']['tipo_movimiento']; ?></td>
     <td><?php echo $this->Number->currency($cheque['EstadoCuenta']['importe'], '$'); ?></td>
     <td><?php echo $cheque['EstadoCuenta']['fecha_operacion']; ?></td> 
     <td>
   <?php  $class='label label-info';
  switch($cheque['EstadoCuenta']['ddfmcodigotransaccione_id']){
   case "C03":  $class='label label-warning'; break;
   case "Y05":  $class='label label-inverse'; break;
   case "Y15":  $class='label label-inverse'; break;
  }  ?>
      <span class="<?php echo $class; ?>"><?php echo $cheque['EstadoCuenta']['ddfmcodigotransaccione_id']; ?></span>
     </td>
     <td>
   <?php  $class='label label-default';
  switch($cheque['EstadoCuenta']['status']){
   case "Verificado":  $class='label label-success'; break;
   case "Cancelado":  $class="label label-danger";  break;
  }  ?>
      <span class="<?php echo $class; ?>"><?php echo $cheque['EstadoCuenta']['status']; ?></span>
     </td>
     <td>
      <div class="btn-group">
	       <?php
		echo $this->Html->link(_(''), 
	  	array('controller'=>'EstadoCuenta','action' => 'view', $cheque['EstadoCuenta']['id']), 
			array('class'=>'btn btn-xs btn-info fa fa-search',"data-toggle"=>"tooltip","title"=>"Details")
               );
	       ?>
      </div>    
     </td>
    </tr>
    <?php $c++; endforeach; ?>
</table>
<div class="paging">
<?php echo $this->Paginator->prev('« Anterior', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->numbers(array('modulus'=>'9','separator' => ''));  ?>
<?php echo $this->Paginator->next('Siguiente »', null, null, array('class' => 'disabled')); ?> 
</div><br><br>

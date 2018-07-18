<?php
/**
 * @version 3.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 *
 */
$encabezado= $this->Html->tableHeaders(array('#',
    $this->Paginator->sort('Invoice.folio', 'Folio', array('escape' => false)),
    $this->Paginator->sort('Invoice.almacenprovider_id', '<i class="fa fa-tasks"></i> Proveedor', array('escape' => false)),
    $this->Paginator->sort('Invoice.fecha_registro', '<i class="fa fa-clock-o"></i> Registro', array('escape' => false)),
    $this->Paginator->sort('Invoice.fecha_update', '<i class="fa fa-clock-o"></i> Update', array('escape' => false)),
		$this->Paginator->sort('Invoice.status', '<i class="fa fa-tasks"></i> Estado', array('escape' => false)),
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
<h3 class="page-header page-header-top">Consulta de Facturas<small> Te muestran una línea temporal de todos los registros dados de alta en el Sistema desde el principio de los tiempos.</small></h3>
<p class="well">» Total de registros encontrados: <strong><?php echo $this->Paginator->counter(array('format' => '%count%')); ?></strong>.</br> » Se mostrar&aacute; un total de <strong>50</strong> registros por p&aacute;gina.</br>
    » Usted se encuentra consultando la p&aacute;gina <strong><?php echo $this->Paginator->counter(array('format' => '%page% de %pages%')); ?></strong>.</p>

   <?php echo $this->Form->create('Invoice',array('action'=>'index'));  ?>
<div class="form-group">
 <div class="col-md-12">
  <div class="input-group">
   <?php
  echo $this->Form->input('sparte', array('label'=>'',
	 			              'type'=>'search',
  			   		      'id'=>'sdeposito',
					      'placeholder'=>'Buscar...',
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
	<?php
	  echo $encabezado;
		$p=1; foreach ($almaceninvoices as $almaceninvoice): ?>
	<tr>
		<td><?php echo $p; ?></td>
		<td>
			<?php echo $this->Html->link($almaceninvoice['Invoice']['folio'], array('action' => 'view', $almaceninvoice['Invoice']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($almaceninvoice['Provider']['razon_social'], array('controller' => 'Providers', 'action' => 'view', $almaceninvoice['Provider']['id'])); ?>
		</td>
		<td><?php echo h($almaceninvoice['Invoice']['fecha_registro']); ?>&nbsp;</td>
		<td><?php echo h($almaceninvoice['Invoice']['fecha_update']); ?>&nbsp;</td>
		<td>
			<?php
		       if ($almaceninvoice['Invoice']['ver']==0) $sclass="fa fa-times text-danger";
		       else $sclass="fa fa-check text-success";

		         echo $this->Html->link('<i class="'.$sclass.'"></i>',
		                   array('controller'=>'Invoices','action'=>'status',$almaceninvoice['Invoice']['id']),
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
		  	array('controller'=>'Invoices','action' => 'view', $almaceninvoice['Invoice']['id']),
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

	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
));
?>

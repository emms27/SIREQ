<?php 
/**
 * View alta almacenamiento de Depositos.
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 */

 echo $this->Html->script(array('jeditable/jquery.jeditable.mini','jeditable/jquery.jeditable.datepicker')); 

 $encabezado= $this->Html->tableHeaders(
       array('#', 
             $this->Paginator->sort('Aclaratorio.id', 'Aclaratorio'),
             $this->Paginator->sort('Aclaratorio.fecha_registro', 'Registro'),
             $this->Paginator->sort('Aclaratorio.fecha_juzgado', 'Recibido Juzgado'),
             $this->Paginator->sort('Aclaratorio.estado', 'Status'),
	     'Acci&oacute;n'
            )
	   ); 
?>

<ul id="nav-info" class="clearfix">
<li>
<?php echo $this->Html->link('', 
                                array('controller'=>'pages','action'=>'home'),
				array('title'=>'Inicio','escape' => false,'class'=>'fa fa-home')); ?>
</li>
<li>
<?php
         echo $this->Html->link('Orden de Pago', 
                                array('controller'=>'Aclaratorios','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
?>
</li>
<li class="active">
<?php 
         echo $this->Html->link('Consulta', 
                                array('controller'=>'Aclaratorios','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
?>
</li>
</ul>

<h3 class="page-header page-header-top">Consulta de Oficios Aclaratorios <small>La consulta de oficios aclaratorios segun la orden de pago te muestran una línea temporal de todas las ordenes dadas de alta en el Sistema desde el principio de los tiempos.</small></h3>
<p class="well">» Total de registros encontrados: <strong><?php echo $this->Paginator->counter(array('format' => '%count%')); ?></strong>.</br> » Se mostrar&aacute; un total de <strong>50</strong> registros por p&aacute;gina.</br>
    » Usted se encuentra consultando la p&aacute;gina <strong><?php echo $this->Paginator->counter(array('format' => '%page% de %pages%')); ?></strong>.</p>


   <?php echo $this->Form->create('Aclaratorio',array('action'=>'index')); ?>
<div class="form-group">
 <div class="col-md-12">
  <div class="input-group">
   <?php  
      echo $this->Form->input('saclaratorio', 
					array('label'=>'',
  			   		      'id'=>'sorden',
		 			      'type'=>'search',
					      'placeholder'=>'Busca un oficio aclaratorio',
					      'class'=>'form-control',
		                              'x-webkit-speech speech required onspeechchange'=>'startSearch();',
                                              'autocapitalize'=>"on", 'autocomplete'=>"on",'autocorrect'=>"on"
            ));
   ?>
   <span class="input-group-btn"><button class="btn btn-success"><i class="fa fa-search"></i>&nbsp;</button></span>
   <span class="input-group-btn">
    <?php        
      echo $this->Html->link('<i class="fa fa-repeat"></i>&nbsp;',
                                array('controller'=>'Aclaratorios','action'=>'index'),
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
 <?php echo $encabezado;  $d=1; foreach ($orden as $ficha):     $idstatus='divstatus_'.$ficha['Aclaratorio']['id']; ?>
     <tr>
      <td><?php echo $d; ?></td>
      <td><?php echo $ficha['Aclaratorio']['id']; ?></td>
      <td><?php echo $ficha['Aclaratorio']['fecha_registro']; ?></td>
      <td><?php echo $ficha['Aclaratorio']['fecha_juzgado']; ?></td>
      <td><?php echo $ficha['Aclaratorio']['estado']; ?></td>
      <td>
       <div class="btn-group">
	       <?php
		echo $this->Html->link(_(''), 
	  	        array('action' => 'view', $ficha['Aclaratorio']['id']), 
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
<script>
    $(function() {
        $( "#from" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 3,
            dateFormat: 'yy-mm-dd',
            onClose: function( selectedDate ) {
                $( "#to" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#to" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 3,
            dateFormat: 'yy-mm-dd',
            onClose: function( selectedDate ) {
                $( "#from" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
    });
</script>

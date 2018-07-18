<?php
/**
 * @version 3.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 *
 */
$encabezado= $this->Html->tableHeaders(array('#',
    $this->Paginator->sort('Provider.razon_social', '<i class="fa fa-file-text-o"></i> Razon Social', array('escape' => false)),
    $this->Paginator->sort('Provider.domicilio', '<i class="fa fa-file-text-o"></i> Domicilio', array('escape' => false)),
    $this->Paginator->sort('Provider.notas', '<i class="fa fa-user"></i>  Descripcion', array('escape' => false)),
    $this->Paginator->sort('Provider.ver', '<i class="fa fa-tasks"></i> Status', array('escape' => false)),
    '<i class="fa fa-bolt"></i> Acci&oacute;n'
   ));

 echo $this->Html->css(array('../themes/uadmin/fancyBox2.1.5/source/jquery.fancybox'));
 echo $this->Html->script(array('../themes/uadmin/fancyBox2.1.5/source/jquery.fancybox.pack'));
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
                                array('controller'=>'Providers','action'=>'index'),
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
<h3 class="page-header page-header-top">Consulta Proveedores<small> La consulta de proveedores te muestran una línea temporal de todas las partes dadas de alta en el Sistema desde el principio de los tiempos.</small></h3>
<p class="well">» Total de registros encontrados: <strong><?php echo $this->Paginator->counter(array('format' => '%count%')); ?></strong>.</br> » Se mostrar&aacute; un total de <strong>50</strong> registros por p&aacute;gina.</br>
    » Usted se encuentra consultando la p&aacute;gina <strong><?php echo $this->Paginator->counter(array('format' => '%page% de %pages%')); ?></strong>.</p>

   <?php echo $this->Form->create('Provider',array('action'=>'index'));  ?>
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
                                array('controller'=>'Providers','action'=>'index'),
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
                                   array('controller'=>'Providers','action'=>'add'),
   				array('title'=>'Nueva Busqueda',
   				      'escape' => false,
   				      'class'=>'btn btn-danger',
   				      'data-title'=>'Agregar Proveedor',
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
        <td><?php echo $row['Provider']['razon_social'];  ?></td>
        <td><?php echo $row['Provider']['domicilio'];  ?></td>
        <td><?php echo $row['Provider']['notas']; ?> </td>
     <td>
      <?php
       if ($row['Provider']['ver']==0) $sclass="fa fa-times text-danger";
       else $sclass="fa fa-check text-success";

         echo $this->Html->link('<i class="'.$sclass.'"></i>',
                                array('controller'=>'Providers','action'=>'status',$row['Provider']['id']),
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
		  	array('action' => 'edit', $row['Provider']['id']),
			array('class'=>'btn btn-xs btn-warning fa fa-pencil',
			      "data-toggle"=>"tooltip","title"=>"Details")
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
<script type="text/javascript">
$(document).ready(function() {
    $("#single_1").fancybox({
          helpers: {
              title : {
                  type : 'float'
              }
          }
      });

    $("#single_2").fancybox({
    	openEffect	: 'elastic',
    	closeEffect	: 'elastic',

    	helpers : {
    		title : {
    			type : 'inside'
    		}
    	}
    });

    $("#single_3").fancybox({
    	openEffect : 'none',
    	closeEffect	: 'none',
    	helpers : {
    		title : {
    			type : 'outside'
    		}
    	}
    });

    $("#single_4").fancybox({
    	helpers : {
    		title : {
    			type : 'over'
    		}
    	}
    });

/*
$.fancybox.open([
    {
        href : 'http://fancyapps.com/fancybox/demo/1_b.jpg',
        title : '1st title'
    },
    {
        href : 'http://fancyapps.com/fancybox/demo/2_b.jpg',
        title : '2nd title'
    }
], {
    padding : 0
});
*/
});
</script>

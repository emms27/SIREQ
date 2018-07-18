<?php
/**
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 *
 */
// $encabezado= $this->Html->tableHeaders(array('#',
//     $this->Paginator->sort('Product.clave', '<i class="fa fa-file-text-o"></i> Clave', array('escape' => false)),
//     $this->Paginator->sort('Product.descripcion', '<i class="fa fa-text-width"></i> Descripción', array('escape' => false)),
// //    $this->Paginator->sort('ProductRole.assignmentemployee_id','<i class="fa fa-user"></i>  Cliente', array('escape' => false)),
//     $this->Paginator->sort('ProductRole.role_id', 'Role', array('escape' => false)),
//     $this->Paginator->sort('ProductRole.fecha_registro', '<i class="fa fa-clock-o"></i>  Creación', array('escape' => false)),
//     $this->Paginator->sort('ProductRole.ver', '<i class="fa fa-tasks"></i> Status', array('escape' => false))
//    ));

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
                                array('controller'=>'Products','action'=>'index'),
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
<h3 class="page-header page-header-top">Consulta de Plantillas<small> La consulta de plantillas te muestran una línea temporal de todos los productos asignados a un perfil dados de alta en el Sistema desde el principio de los tiempos.</small></h3>
<p class="well">» Total de registros encontrados: <strong><?php echo $this->Paginator->counter(array('format' => '%count%')); ?></strong>.</br> » Se mostrar&aacute; un total de <strong>50</strong> registros por p&aacute;gina.</br>
    » Usted se encuentra consultando la p&aacute;gina <strong><?php echo $this->Paginator->counter(array('format' => '%page% de %pages%')); ?></strong>.</p>

   <?php echo $this->Form->create('ProductRole',array('action'=>'index'));  ?>
<div class="form-group">
 <div class="col-md-12">
  <div class="input-group">
   <?php
  echo $this->Form->input('sparte', array('label'=>'',
	 			              'type'=>'search',
                      'div'=>'col-md-6',
					      'placeholder'=>'Buscar producto',
					      'class'=>'form-control',
		                              'x-webkit-speech speech required onspeechchange'=>'startSearch();',
                                              'autocapitalize'=>"on", 'autocomplete'=>"on",'autocorrect'=>"on"
            ));

            echo $this->Form->input('sroles', array(
                          'label'=>'',
                          'div'=>'col-md-6',
          					      'class'=>'form-control',
                          'empty' => 'Por favor, seleccione...',
                          'onchange' => 'this.form.submit()'
                      ));

          ?>
   <span class="input-group-btn"><button class="btn btn-success"><i class="fa fa-search"></i>&nbsp;</button></span>
   <span class="input-group-btn">
    <?php
      echo $this->Html->link('<i class="fa fa-repeat"></i>&nbsp;',
                                array('controller'=>'ProductRoles','action'=>'index'),
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
                                   array('controller'=>'ProductRoles','action'=>'add'),
   				array('title'=>'Agregar Producto',
   				      'escape' => false,
   				      'class'=>'btn btn-danger',
   				      'data-title'=>'Agregar Producto',
   				      'rel'=>"tooltip",
   				      'data-placement'=>"top",
   				      'data-trigger'=>"hover"
            ));

         echo $this->Form->end(); ?></span>
  </div>
 </div>
</div></form><br><br><br>

<br><br><br>
<?php
// echo $this->Paginator->sort('ProductRole.role_id.1',__('language'));
   $p=1; foreach ($row as $row):
  if ($row['Product']['filename']!=NULL) $picture=$row['Product']['filename'];
  else $picture='no_picture.png';
  ?>


  <div class="col-sm-3">
    <div class="thumbnail">
      <?php
      echo $this->Html->link(
          $this->Html->image('uploads/almacenproducts/filename/'.$picture,array("class"=>"img-responsive")),
          'http://cloudbits.org.mx'.$this->webroot.'img/uploads'.DS.'almacenproducts'.DS.'filename'.DS.$picture,
          // array('controller' => 'settings', 'action' => 'lang', 'spa'),
          array('escape' => false,'id'=>'single_2',"data-toggle"=>"tooltip")
          // array('escape' => false, 'rel' => 'nofollow')
      );
      ?>
    <h4><?php echo $row['Product']['descripcion']; ?></h4>
    <p><b>Clave:</b> <?php echo $row['Product']['clave'];  ?></p>
    <p><b>Área o Dpto:</b> <?php echo $row['Role']['name']; ?></p>
    <p>
      <?php
       if ($row['ProductRole']['ver']==0) $sclass="fa fa-times text-danger";
       else $sclass="fa fa-check text-success";

         echo $this->Html->link('<i class="'.$sclass.'"></i>',
                                array('controller'=>'ProductRoles','action'=>'status',$row['ProductRole']['id']),
				array('title'=>'Ver este elemento',
				      'escape' => false,
				      'class'=>'view',
				      'data-title'=>'Ver este elemento',
				      'rel'=>"tooltip",
				      'data-placement'=>"top",
				      'data-trigger'=>"hover"
         ));
	        ?>
    </p>
    </div>
  </div>

    <?php
    if($p>3 && $p%4==0){
     echo '<div class="clearfix"></div>';
    }

    $p++; endforeach; ?>

<div class="clearfix"></div>

<div class="paging">
<?php echo $this->Paginator->prev('« Anterior', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->numbers(array('modulus'=>'9','separator' => ''));  ?>
<?php echo $this->Paginator->next('Siguiente »', null, null, array('class' => 'disabled')); ?>
</div><br><br>

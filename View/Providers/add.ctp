<?php
/**
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 *
 */
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
           echo $this->Html->link('Fichas',
                                array('controller'=>'Depositos','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
?>
</li>
<li class="clearfix">
<?php
         echo $this->Html->link('Alta',
                                array('controller'=>'Depositos','action'=>'alta'),
				array('title'=>'Inicio','escape' => false));
?>
</li>
<li class="active">
<?php
         echo $this->Html->link('Proveedores',
                                array('controller'=>'Providers','action'=>'add'),
				array('title'=>'Inicio','escape' => false));
?>
</li>
</ul>
<h3 class="page-header page-header-top">Agregar Proveedor <small>...</small></h3>
<br><br>
<?php echo $this->Form->create('Provider',array('action'=>'add',"class"=>"form-horizontal form-box"));
 echo $this->Form->input('id',array('type'=>'hidden'));
?>
<h4 class="form-box-header">Proveedor</h4>
<div class="form-box-content">




<div class="form-group">
 <label class="control-label col-md-2">Razon Social</label>
 <div class="col-md-5">
  <div class="input-group">
                  <?php
		  echo $this->Form->input('razon_social',
				          array('label' =>false,
							  'type'=>'text',
							  'size'=>'50',
							  // 'maxlength'=>'6',
						    // 'placeholder'=>'110010',
							  'id'=>"example-input-append2",
							  'class'=>"form-control"
							  )
		                                );
		 ?>
  </div>
 </div>
</div>


<div class="form-group">
 <label class="control-label col-md-2">Domicilio</label>
 <div class="col-md-5">
  <div class="input-group">
                  <?php
		  echo $this->Form->input('domicilio',
				          array('label' =>false,
							  'type'=>'text',
							  'size'=>'50',
							  // 'maxlength'=>'255',
						    //       'placeholder'=>'Disco Duro 2TB',
							  'id'=>"example-input-append2",
							  'class'=>"form-control"
							  )
		                                );
		 ?>
  </div>
 </div>
</div>

<div class="form-group">
 <label class="control-label col-md-2">RFC</label>
 <div class="col-md-5">
  <div class="input-group">
                  <?php
		  echo $this->Form->input('rfc',
				          array('label' =>false,
							  'type'=>'text',
							  'size'=>'50',
							  // 'maxlength'=>'255',
						    //       'placeholder'=>'Disco Duro 2TB',
							  'id'=>"example-input-append2",
							  'class'=>"form-control"
							  )
		                                );
		 ?>
  </div>
 </div>
</div>

<div class="form-group">
 <label class="control-label col-md-2">C.P.</label>
 <div class="col-md-5">
  <div class="input-group">
                  <?php
		  echo $this->Form->input('cp',
				          array('label' =>false,
							  'type'=>'text',
							  'size'=>'50',
							  // 'maxlength'=>'255',
						    //       'placeholder'=>'Disco Duro 2TB',
							  'id'=>"example-input-append2",
							  'class'=>"form-control"
							  )
		                                );
		 ?>
  </div>
 </div>
</div>

<div class="form-group">
 <label class="control-label col-md-2">Teléfono</label>
 <div class="col-md-5">
  <div class="input-group">
                  <?php
		  echo $this->Form->input('tel',
				          array('label' =>false,
							  'type'=>'text',
							  'size'=>'50',
							  // 'maxlength'=>'255',
						    //       'placeholder'=>'Disco Duro 2TB',
							  'id'=>"example-input-append2",
							  'class'=>"form-control"
							  )
		                                );
		 ?>
  </div>
 </div>
</div>

<div class="form-group">
<label class="control-label col-md-2" for="example-input-success">Descripción</label>
<?php
   echo $this->Form->input('notas',
	                       array('label'=>false,'rows' => '5',
	 		   	     'class'=>'ckeditor',
				        'div' => array('class' => 'col-md-9'),
		                     'cols' => '5',
		                     'placeholder'=>'Escriba una observacion si es necesario'
   ));
?>
</div>


<div class="form-group form-actions">
 <div class="col-md-10 col-md-offset-2">
  <button class="btn btn-success"><i class="fa fa-save"></i> Guardar Información</button>
 </div>
</div>
 </div>
<?php  echo $this->Form->end(); ?>

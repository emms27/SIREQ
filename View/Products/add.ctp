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
         echo $this->Html->link('Primera Ficha',
                                array('controller'=>'Expedientes','action'=>'alta_ficha'),
				array('title'=>'Inicio','escape' => false));
?>
</li>
</ul>
<h3 class="page-header page-header-top">Agregar Producto <small>...</small></h3>
<br><br>
<?php echo $this->Form->create('Product',array('action'=>'add','type'=>'file',"class"=>"form-horizontal form-box"));
 echo $this->Form->input('id',array('type'=>'hidden'));
?>
<h4 class="form-box-header">Producto</h4>
<div class="form-box-content">

 <div class="form-group">
<label class="control-label col-md-2" for="example-input-success">Categoría</label>
<?php
	    echo $this->Form->input('almacencategoria_id',
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


<div class="form-group">
 <label class="control-label col-md-2">Clave</label>
 <div class="col-md-5">
  <div class="input-group">
                  <?php
		  echo $this->Form->input('clave',
				          array('label' =>false,
							  'type'=>'text',
							  'size'=>'50',
							  'maxlength'=>'6',
						          'placeholder'=>'110010',
							  'id'=>"example-input-append2",
							  'class'=>"form-control"
							  )
		                                );
		 ?>
  </div>
 </div>
</div>


<div class="form-group">
 <label class="control-label col-md-2">Descripción</label>
 <div class="col-md-5">
  <div class="input-group">
                  <?php
		  echo $this->Form->input('descripcion',
				          array('label' =>false,
							  'type'=>'text',
							  'size'=>'50',
							  'maxlength'=>'255',
						          'placeholder'=>'Disco Duro 2TB',
							  'id'=>"example-input-append2",
							  'class'=>"form-control"
							  )
		                                );
		 ?>
  </div>
 </div>
</div>

<div class="form-group">
 <label class="control-label col-md-2">Imágen</label>
 <div class="col-md-5">
  <div class="input-group">
<?php
echo $this->Form->input('filename', array('type' => 'file','label'=>false));
echo $this->Form->input('dir', array('type' => 'hidden'));
echo $this->Form->input('mimetype', array('type' => 'hidden'));
echo $this->Form->input('filesize', array('type' => 'hidden'));

		 ?>
  </div>
 </div>
</div>

 </div>

 <br>
 <h4 class="form-box-header">Stock</h4>
 <div class="form-box-content">


 <div class="form-group">
  <label class="control-label col-md-2">Unidad Métrica</label>
  <div class="col-md-5">
   <div class="input-group">
                   <?php
 		  echo $this->Form->input('umetrica',
 				          array('label' =>false,
 							  'type'=>'text',
 							  'size'=>'50',
 							  'maxlength'=>'6',
 						   //  'placeholder'=>'110010',
 							  'id'=>"example-input-append2",
 							  'class'=>"form-control"
 							  )
 		                                );
 		 ?>
   </div>
  </div>
 </div>


 <div class="form-group">
  <label class="control-label col-md-2">Cantidad</label>
  <div class="col-md-5">
   <div class="input-group">
                   <?php
 		  echo $this->Form->input('ucantidad',
 				          array('label' =>false,
 							  'type'=>'text',
 							  'size'=>'50',
 							  'maxlength'=>'255',
 						   //  'placeholder'=>'Disco Duro 2TB',
 							  'id'=>"example-input-append2",
 							  'class'=>"form-control"
 							  )
 		                                );
 		 ?>
   </div>
  </div>
 </div>


 <div class="form-group">
  <label class="control-label col-md-2">Precio</label>
  <div class="col-md-5">
   <div class="input-group">
                   <?php
 		  echo $this->Form->input('uprecio',
 				          array('label' =>false,
 							  'type'=>'text',
 							  'size'=>'50',
 							  'maxlength'=>'255',
 						    //  'placeholder'=>'Disco Duro 2TB',
 							  'id'=>"example-input-append2",
 							  'class'=>"form-control"
 							  )
 		                                );
 		 ?>
   </div>
  </div>
 </div>




 <div class="form-group form-actions">
  <div class="col-md-10 col-md-offset-2">
   <button class="btn btn-success"><i class="fa fa-save"></i> Guardar Información</button>
  </div>
 </div>
  </div>
<?php  echo $this->Form->end(); ?>

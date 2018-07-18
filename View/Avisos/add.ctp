<?php  
/**
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 *
 */
 $attributes=array('legend'=>false);
 $options = array('negro' => 'Negro', 'verde' => 'Verde', 'rojo' => 'Rojo');
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
<h3 class="page-header page-header-top">Agregar Aviso <small>...</small></h3>
<br><br>
<?php echo $this->Form->create('Aviso',array('action'=>'add',"class"=>"form-horizontal form-box")); 
 echo $this->Form->input('id',array('type'=>'hidden'));
?>
<h4 class="form-box-header">Aviso</h4>
<div class="form-box-content">
 
 <div class="form-group">
<label class="control-label col-md-2" for="example-input-success">Grupos</label>
<?php
	    echo $this->Form->input('role_id', 
		                                        array('type'=>'select',
			 			              'div' => array('class' => 'col-md-4'),
		                                              'label'=> false,
							      'id'=>"example-select-chosen",
							      'class'=>"form-control select-chosen",
		                                              'empty' => 'Todos'//,
							      //'onchange' => 'this.form.submit()'
                                                              )
                                    );
?>
 </div>

 <div class="form-group">

<label class="control-label col-md-2" for="example-input-success">Color</label>
<?php
  echo $this->Form->input('color',array(
		                        'type'=>'select',
			 		'div' => array('class' => 'col-md-4'),
		                        'label'=> false,
				        'options' => array($options),
					'id'=>"example-select-chosen",
			  	        'class'=>"form-control select-chosen",
		                        'empty' => 'Por favor, seleccione...'
                                                              )
                                    );
?>

 </div>

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
<label class="control-label col-md-2" for="example-input-success">Aviso</label>
                  <?php 
		  echo $this->Form->input('aviso',
				          array('label' =>false,
						'type'=>'text',
						'maxlength'=>'90',
				     'div' => array('class' => 'col-md-9'),
				  'rows' => '5', 
		                  'cols' => '5', 
		                  'placeholder'=>'Escriba un aviso',
						'id'=>"example-input-append2",
						'class'=>"form-control"
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

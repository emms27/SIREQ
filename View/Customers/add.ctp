<?php  
/**
 * View alta almacenamiento de Depositos.
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 *
 */

 $opartes=array('Beneficiario'=>' Beneficiario ','Depositante'=>' Depositante');
 $osexo=array('F'=>' Femenino ','M'=>' Masculino');
 $aparte=array('legend'=>false,
 	       'label'=>false,
               'id'=>'enable'
              );
 $asexo=array('legend'=>false,
	      'label'=>false,
              'id'=>'enable'
              //'value'=>''
             );
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
                                array('controller'=>'Involucrados','action'=>'index'),
				array('title'=>'Inicio','escape' => false));
?>
</li>
<li class="active">
<?php
         echo $this->Html->link('Alta', 
                                array('controller'=>'Involucrados','action'=>'alta'),
				array('title'=>'Inicio','escape' => false));
?>
</li>
</ul>
<h3 class="page-header page-header-top">Agregar Parte <small>...</small></h3>
<br><br>
<?php  echo $this->Html->css(array('radio')); ?>

<?php echo $this->Form->create('Involucrado',array("class"=>"form-horizontal form-box")); echo $this->Form->input('id',array('label' => 'id','type'=>'hidden')); ?>
<h4 class="form-box-header">Expediente</h4>
<div class="form-box-content">
 <div class="form-group">
  <label class="control-label col-md-2" >Expediente </label>
  <?php
       echo $this->Form->input('htsjpexpediente_id',
                            array('type'=>'text',
				  'label' => 'Expediente',
				  'div' => array('class' => 'col-md-1'),
				  'size'=>'10',
			          'maxlength'=>'4',
				  'id'=>"example-input-tooltip",
				  'data-toggle'=>"tooltip",
				  'data-placement'=>"right",
				  'class'=>"form-control",
				  'title'=>"Expediente de cuatro dígitos p/e 0001",
                                  'placeholder'=>'0001',
				  'autofocus'));
       echo $this->Form->input('anio',
                            array('type'  => 'text',
				  'label' => 'Año',
				  'div' => array('class' => 'col-md-1'),
				  'size'=>'10',
			          'maxlength'=>'4',
				  'id'=>"example-input-tooltip",
				  'data-toggle'=>"tooltip",
				  'data-placement'=>"right",
				  'class'=>"form-control",
				  'title'=>"Año de cuatro dígitos p/e ".date('Y'),
			          'placeholder'=>date('Y')
			      ));
      echo $this->Form->input('htsjpjuzgado_id', 
                                  array('type'=>'select',
                                        'label'=> 'Juzgados', 
				        'div' => array('class' => 'col-md-4'),
					'id'=>"example-select-chosen",
					'class'=>"form-control select-chosen"
                                       )
                            );
     ?>
 </div>
 <h4 class="form-box-header">Parte</h4>
<div class="form-group">
<label class="control-label col-md-2" for="example-input-popover">Tipo Parte</label>

<div class="col-md-3">
<?php echo $this->Form->radio('tusuario',$opartes,$aparte); ?>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-2" for="example-input-success">Origen</label>
 <?php 
	      echo $this->Form->input('htsjpestado_id', 
                                  array('type'=>'select',
					'label' => array('text' => 'Ciudad'),
					'div' => array('class' => 'col-md-3'),
                                        'empty' => 'Por favor, seleccione...',
					'id'=>"example-select-chosen",
					'class'=>"form-control select-chosen"
              ));
 ?>
</div>

<div class="form-group">
 <label class="control-label col-md-2">Nombre</label>
 <?php
                 echo $this->Form->input('nombre',
				         array('type'=>'text',
					       'label' => 'nombre',						  
	        			       'div' => array('class' => 'col-md-3'),
				               'id'=>"example-input-tooltip",
				               'data-toggle'=>"tooltip",
				               'class'=>"form-control",
				               'title'=>"Nombre de cincuenta caracteres",
				               'placeholder'=>'Emmanuel',
					       'size'=>'30',
					       'maxlength'=>'50'
		 ));

                echo $this->Form->input('apepat',
				            array('label' => 'apellido paterno',
						  'type'=>'text',
						  'size'=>'30',
						  'maxlength'=>'50',
	        			       'div' => array('class' => 'col-md-3'),
				               'id'=>"example-input-tooltip",
				               'data-toggle'=>"tooltip",
				               'class'=>"form-control",
				               'title'=>"Apellido Paterno de cincuenta caracteres",
				                  'placeholder'=>'Sanchez'
						  )
                                        );
                 echo $this->Form->input('apemat',
				            array('label' => 'apellido materno',
						  'type'=>'text',
						  'size'=>'30',
						  'maxlength'=>'50',
	        			       'div' => array('class' => 'col-md-3'),
				               'id'=>"example-input-tooltip",
				               'data-toggle'=>"tooltip",
				               'class'=>"form-control",
				               'title'=>"Apellido Materno de cincuenta caracteres",
				                  'placeholder'=>'Carreon',
						  ));
 ?>
</div>

<div class="form-group">
<label class="control-label col-md-2">Sexo</label>
 <?php  echo $this->Form->radio('sexo',$osexo,$asexo);?>
</div>

<div class="form-group">
 <label class="control-label col-md-2">Email</label>
 <div class="col-md-5">
  <div class="input-group">
                  <?php 
		  echo $this->Form->input('email',
				          array('label' =>false,
							  'type'=>'text',
							  'size'=>'50',
							  'maxlength'=>'255',
						          'placeholder'=>'esanchez@htsjpuebla.gob.mx',
							  'id'=>"example-input-append2",
							  'class'=>"form-control"
							  )
		                                );
		 ?>
   <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
  </div>
 </div>
</div>


<div class="form-group">
<label class="control-label col-md-2">&nbsp;</label>
 <?php 
		  echo $this->Form->input('edad',
					  array('type'=>'text',
					        'label' => 'Edad',
	        			        'div' => array('class' => 'col-md-1'),
				                'id'=>"example-input-tooltip",
				                'data-toggle'=>"tooltip",
	 				        'data-placement'=>"right",
				                'class'=>"form-control",
				                'title'=>"Edad mayor a 17 años",
						'size'=>'4',
						'maxlength'=>'3',
						'placeholder'=>'26',
						));
		 ?>
</div>
<div class="form-group">
 <label class="control-label col-md-2">&nbsp;</label>
 <?php echo $this->EstadoCivil->ComboEstadoCivil('estadocivil','Estado Civil',null,null); ?>
 <?php echo $this->Escolaridad->ComboEscolaridad('escolaridad','Escolaridad',null,null); ?>
 <?php echo $this->Ocupaciones->ComboOcupaciones('ocupacion','Ocupación',null,null); ?>
</div>

<div class="form-group">
 <label class="control-label col-md-2">Identificación</label>
 <?php echo $this->Identificacion->ComboIdentificacion('tidentificacion','Tipo de Identificación',null,null); 
                 echo $this->Form->input('nidentificacion',
				         array('type'=>'text',
						'label' => 'Núm. Identicación',
	        			        'div' => array('class' => 'col-md-3'),
				                'id'=>"example-input-tooltip",
				                'data-toggle'=>"tooltip",
	 				        'data-placement'=>"right",
				                'class'=>"form-control",
				                'title'=>"Edad mayor a 17 años",
						  'size'=>'20',
						  'maxlength'=>'13',
				                  'placeholder'=>'1234567890123',
		  			          'class'=>"form-control"
						  )
                                        );
	      ?>
</div>

<div class="form-group form-actions">
 <div class="col-md-10 col-md-offset-2">
  <button class="btn btn-success"><i class="fa fa-save"></i> Guardar Información</button>
 </div>
</div>


 </div><?php  echo $this->Form->end(); ?>



       <?php //echo $this->Form->error('tusuario'); ?>
           <?php //echo $this->Form->error('sexo'); ?>

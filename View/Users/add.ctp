<?php
/**
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 *
 */

//<i class="fa fa-save"></i>
   $options = array(
    'label' => 'Guardar Información',
    'class'=> 'btn btn-success',
    //'type'=>'button',
    //'escape' => false,
    'div' => array('class' => ''));

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
<h3 class="page-header page-header-top">Agregar Cuenta de Usuario <small>...</small></h3>
<br><br>
<?php
echo $this->Form->create('User',array('action'=>'add',"class"=>"form-horizontal form-box"));
echo $this->Form->input('User.id', array('type'=> 'hidden'));
?>
<h4 class="form-box-header">Cuenta</h4>
<div class="form-box-content">

 <div class="form-group">
<label class="control-label col-md-2" for="example-input-success">Empleado</label>
<?php
	    echo $this->Form->input('User.htsjpemployee_id',
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
<label class="control-label col-md-2" for="example-input-success">Role</label>
<?php
	    echo $this->Form->input('User.role_id',
		                      array(
                            'type'=>'select',
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
 <label class="control-label col-md-2">Password</label>
 <div class="col-md-5">
  <div class="input-group">
                  <?php
		  echo $this->Form->input('User.password',
				          array(
                    'label' =>false,
        						'type'=>'password',
        				                //'title'=>"Introducir también los centavos",
        						'size'=>'19',
        						'maxlength'=>'19',
        		                          	'placeholder'=>'',
        						'id'=>"example-input-append2",
        						'class'=>"form-control"
						));
		 ?>
  </div>
 </div>
</div>



<?php  //echo $this->Form->end(); ?>


<div class="form-group form-actions">
 <div class="col-md-10 col-md-offset-2">
  <button class="btn btn-success"><i class="fa fa-save"></i> Guardar Información</button>
 </div>
</div>
 </div>
<?php  echo $this->Form->end(); ?>

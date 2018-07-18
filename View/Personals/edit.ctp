<?php
/**
 * View alta almacenamiento de Depositos.
 * @version 2.0
 * @author Emmanuel Sanchez Carreon
 * @email carreon.emmanuel@gmail.com
 */
 $osexo=array('Femenino'=>'Femenino','Masculino'=>'Masculino');
 $asexo=array('legend'=>false); //, 'label'=>false //'value'=>'');
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
          echo $this->Html->link('Personal del Poder Judicial',
                                array('controller'=>'Personals','action'=>'index'),
				array('title'=>'Personal del Poder Judicial','escape' => false));
?>
</li>
<li class="active">
<?php
           echo $this->Html->link('Editar',
                                array('controller'=>'Personals','action'=>'index'),
				array('title'=>'Consulta','escape' => false));
?>
</li>
</ul>

<h3 class="page-header page-header-top">Editar Personal<small> Editar el personal te muestran una línea temporal de todas los usuarios realizados en el Sistema desde el principio de los tiempos.</small></h3>
<p class="well">
  <?php echo $this->request->data['Personal']['namefull']; ?>
</p>
<h4>Datos Generales</h4>




<?php
 echo $this->Form->create('Personal', array('action'=>'edit'));
 echo $this->Form->input('Personal.id',array('type'=>'hidden'));
?>
        <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">            
            <div class="box-body">
            		<div class="row">
                  <div class="col-md-12"><br>
             		 	<?php
 		                  echo $this->Form->input('sireqrole_id',
 		                                        array('type'=>'select',
 		                                        	  'class'=>'form-control',
 		                                              'label'=> 'Role',
 		                                              'empty' => 'Por favor, seleccione...'
                                                               )
                                     );
 	                 ?>
             		 </div>
                  <div class="col-md-12"><br>
             		 	<?php
 		                  echo $this->Form->input('htsjpassignment_id',
 		                                        array(
                                               'type'=>'select',
                                               //  => array('class' => 'col-md-4'),
                   		                        // 'label'=> false,
                                               'label'=> 'Adscripción',
                           							      'id'=>"example-select-chosen",
                           							      'class'=>"form-control select-chosen",
                   		                        'empty' => 'Por favor, seleccione...'//,
                                           )
                                     );
 	                 ?>
             		 </div>
                  <div class="col-md-12"><br>
                       <?php
                  echo $this->Form->input('email',
                  array('label' => 'Email',
                  'type'=>'text',
                  'class'=>'form-control',
                  'maxlength'=>'50',
                       'placeholder'=>'esanchez@htsjpuebla.gob.mx'
                  )
                                     );
                  ?>
                  </div>
                  <div class="col-md-12"><br>
             		 	     <?php
           echo $this->Form->input('fecha_nacimiento',array('label' => 'Fecha de Nacimiento',
                     'id' => 'datepicker2',
                     'data-inputmask'=>"'alias': 'dd/mm/yyyy'",
                     //'data-mask',
                     'class'=>'form-control',
                     'type' => 'text',
                     'readonly'=>'readonly'
                     ));
       ?>
             		 </div>
                 <div class="col-md-12"><br>
                   <?php
                   $oparte=array('1'=>'Si','0'=>'No');
                   $aptitud=array('legend'=>false,'class'=>'form-control2');
                echo $this->Form->label('Useer.sex','Activar'); echo "<br>";
                echo $this->Form->radio('sireqrequisicion',  $oparte,$aptitud);
                echo $this->Form->error('sireqrequisicion');
                    ?>
                 </div>

            </div>
          </div>
        </div>

      </div>
  </div>

    <div class="row">
      <br><br><br>
      <div class="col-md-12"><button class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></div>
    </div>
    </section>
<?php echo $this->Form->end(); ?>


   <script type="text/javascript">
      $(function () {
        $('#datepicker2').datepicker({
          calendarWeeks:true,
          format: 'yyyy-mm-dd'
        });
      });
    </script>

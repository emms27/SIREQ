<?php 
/**
 * View alta almacenamiento de Depositos.
 * @version 2.0
 * @author Emmanuel Sanchez Carreon
 * @email carreon.emmanuel@gmail.com
 */
	echo $this->Html->css(array('jgritter/jquery.gritter'));
	echo $this->Html->script(array('jgritter/jquery.gritter','jgritter/jquery.gritter.min'));
?>

<div class="breadcrumb">
       <?php
         echo $this->Html->link('', 
                                array('controller'=>'pages','action'=>'home'),
				array('title'=>'Inicio','escape' => false,'class'=>'icon-home'));
         echo '<span class="divider">/</span>';
         echo $this->Html->link('Contacto', 
                                array('controller'=>'Contactenos','action'=>'mensaje'),
				array('title'=>'Inicio','escape' => false));
         echo '<span class="divider">/</span>';
         echo $this->Html->link('Mensaje', 
                                array('controller'=>'Contactenos','action'=>'mensaje'),
				array('title'=>'Inicio','escape' => false));
       ?>
</div><br><br>



<h3 class="page-header page-header-top"><i class="fa fa-paper-plane"></i> Enviar Mensaje Instantaneo<small> </small></h3>


<?php 
  echo $this->Form->create('Message',array('action'=>'nuevo')); 
       echo $this->Form->input('id',array('type'=>'hidden'));    
       echo $this->Form->input('almacenuser2_id',array('type'=>'hidden','value'=>$userid['id']));                 
?>




<div class="panel panel-default">
  <div class="panel-heading"><i class="fa fa-file-text-o"></i> Información</div>
  <div class="panel-body">

 <?php




	 echo $this->Form->input('mensaje', 
		            array('type'=> 'textarea',
				  'label' => 'Mensaje',
				  'class'=>'ckeditor',
				  'rows'=>"10",
		                  'placeholder'=>'Escriba sus comentarios, sugerencias o peticiones'
		                 )
         );
        ?>

  </div>
</div>
  <button class="btn btn-success"><i class="fa fa-paper-plane"></i> Enviar Mensaje</button>
<?php echo $this->Form->end(); ?>


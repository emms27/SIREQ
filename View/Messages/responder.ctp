<?php
/**
 * View alta almacenamiento de Depositos.
 * @version 2.0
 * @author Emmanuel Sanchez Carreon
 * @email carreon.emmanuel@gmail.com
 */
?>

<ul id="nav-info" class="clearfix">
<li>&nbsp;
<?php
     echo $this->Html->link('',
                                array('controller'=>'pages','action'=>'home'),
				array('title'=>'Inicio','escape' => false,'class'=>'fa fa-home')); ?>
</li>
<li>
<?php
     echo $this->Html->link('Requisicion',
                                array('controller'=>'Requisitions','action'=>'index'),
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
<h3 class="page-header page-header-top"><i class="fa fa-paper-plane"></i> Responder Mensaje Instantaneo<small> </small></h3>


<?php
       echo $this->Form->create('Message',array('action'=>'responder'));
       echo $this->Form->input('id',array('type'=>'hidden'));
       echo $this->Form->input('almacenuser2_id',array('type'=>'hidden','value'=>$message['User']['id']));
       echo $this->Form->input('almacenuser_id',array('type'=>'hidden','value'=>$message['Contacto']['id']));
      //  echo $this->Form->input('almacencontactano_id',array('type'=>'hidden','value'=>$message['Contacto']['id']));
       echo $this->Form->input('asunto',array('type'=>'hidden','value'=>'Re: '.$message['Message']['asunto']));

?>




<div class="panel panel-default">
  <div class="panel-heading"><i class="fa fa-file-text-o"></i> Información</div>
  <div class="panel-body">
 <?php
         echo $this->Form->input('user',
		                 array('type'=>'text',
		                       'label'=> 'De:',
		                       'value' => $message['Contacto']['Personal']['namefull'],
				       'readonly'=>'readonly'));


	 echo $this->Form->input('userasunto',
			    array('label' => 'Asunto:',
		            	  'type'=> 'text',
				  'value'=>$message['Message']['asunto'],
				  'readonly'=>'readonly'
		                 )
         );

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

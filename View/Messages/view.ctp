<?php
/**
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 */
  $fdatealta=explode(' ',$message['Message']['fecha_registro']);
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
<h3 class="page-header page-header-top"><i class="fa fa-envelope"></i> Inbox <small>   La consulta de mensajes te muestran el detalle del mensaje seleccionado.</small></h3>


<div class="panel panel-info">
  <div class="panel-heading">

 <div class="btn-toolbar" role="toolbar">
      <div class="btn-group">
         <?php
          echo $this->Html->link('<i class="fa fa-mail-reply-all"></i> Responder',
	 		  	 array('action' => 'responder',$message['Message']['id']),
		                 array('escape' => false,"class"=>"btn btn-default"));
         ?>
        <!-- <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
        <button type="button" class="btn btn-default"><i class="fa fa-briefcase"></i> Archive</button> -->
      </div>
    </div>
  </div>
  <div class="panel-body">
    <?php
 if (($message['User']['filename']=='') || ($message['User']['filename']==NULL)) $foto2='user.jpg'; else $foto2=$message['User']['filename'];
 echo $this->Html->image("uploads/user/filename/".$foto2,array("border"=>"0","width"=>"60px","height"=>"60px","class"=>"pull-left"));
?>
<a href="javascript:void(0)"><strong>&nbsp;<?php echo $message['User']['Personal']['namefull'];  ?></strong></a>
<span class="label label-info">&nbsp;<?php echo $this->Dates->FormatoCompletoFecha($fdatealta[0]).'&nbsp;&nbsp;'.$fdatealta[1]; ?></span>
<h5>&nbsp;<?php echo h($message['Message']['asunto']);  ?></h5><br>
<?php echo $message['Message']['mensaje']; ?>

  </div>
</div>

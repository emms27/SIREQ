<?php
/**
 * View alta almacenamiento de Depositos.
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
          echo $this->Html->link('Personal del Poder Judicial',
                                array('controller'=>'Personals','action'=>'index'),
				array('title'=>'Personal del Poder Judicial','escape' => false));
?>
</li>
<li class="active">
<?php
           echo $this->Html->link('Consulta',
                                array('controller'=>'Personals','action'=>'index'),
				array('title'=>'Consulta','escape' => false));
?>
</li>
</ul>
<h3 class="page-header page-header-top">Consulta de Personal<small> La consulta de usuarios te muestran una línea temporal de todas los usuarios realizados en el Sistema desde el principio de los tiempos.</small></h3>
<p class="well">» Total de registros encontrados: <strong><?php echo $this->Paginator->counter(array('format' => '%count%')); ?></strong>.</br> » Se mostrar&aacute; un total de <strong>50</strong> registros por p&aacute;gina.</br>
    » Usted se encuentra consultando la p&aacute;gina <strong><?php echo $this->Paginator->counter(array('format' => '%page% de %pages%')); ?></strong>.</p>

    <?php echo $this->Form->create('Personal',array('action'=>'index')); ?>
<div class="form-group">
 <div class="col-md-12">
  <div class="input-group">
   <?php
echo $this->Form->input('suser', array('label'=>'',
	 			              'type'=>'search',
  			   		      'id'=>'sdeposito',
					      'placeholder'=>'Busca un usuario',
					      'class'=>'form-control',
		                              'x-webkit-speech speech required onspeechchange'=>'startSearch();',
                                              'autocapitalize'=>"on", 'autocomplete'=>"on",'autocorrect'=>"on"
            ));
          ?>
   <span class="input-group-btn"><button class="btn btn-success"><i class="fa fa-search"></i>&nbsp;</button></span>
   <span class="input-group-btn">
 <?php
      echo $this->Html->link('<i class="fa fa-repeat"></i>&nbsp;',
                                array('controller'=>'Personals','action'=>'index'),
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


         echo $this->Form->end(); ?></span>
  </div>
 </div>
</div></form><br><br><br>
<h4>Personal</h4>
<table class="table table-hover">
 <?php  $u=1; foreach ($user as $user):
  $fdate=explode(' ',$user['Personal']['fecha_update']);
 ?>
    <tr>
     <td><div align="left"><?php echo $user['Personal']['namefull'];  ?><br><small class="text-muted"><?php  echo $this->Dates->FormatoCompletoFecha($fdate[0]).'&nbsp;&nbsp;'.$fdate[1]; ?></small></div></td>
    <td><?php
    if (isset($user['Role']['id'])) {
      switch ($user['Role']['id']){
	  case 1: $l="danger";  break;
	  case 2: $l="info";     break;
	  case 3:  $l="inverse";   break;
	  case 4:    $l="success";  break;
	  case 5:    $l="warning";  break;
          default:  $l="default";
          }
      ?>
      <span class="label label-<?php echo $l.'">'.$user['Role']['name']; ?></span>
      <?php } ?>
     </td>
     <td>
      <div class="btn-group">
	       <?php
       if ($user['Personal']['sireqrequisicion']==0) $sclass="fa fa-times text-danger";
       else $sclass="fa fa-check text-success";

		echo $this->Html->link(_(''),
		  	array('action' => 'uprequisicion', $user['Personal']['id']),
			array('class'=>'btn btn-xs btn-default '.$sclass,"data-toggle"=>"tooltip","title"=>"Habilitar Usuario")
               );

		echo $this->Html->link(_(''),
		  	array('action' => 'edit', $user['Personal']['id']),
			array('class'=>'btn btn-xs btn-success fa fa-pencil',"data-toggle"=>"tooltip","title"=>"Editar Usuario")
               );
	       ?>
       </div>
     </td>
    </tr>

    <?php $u++; endforeach; ?>
</table>
<div class="paging">
<?php echo $this->Paginator->prev('« Anterior', null, null, array('class' => 'disabled')); ?>
<?php echo $this->Paginator->numbers(array('modulus'=>'9','separator' => ''));  ?>
<?php echo $this->Paginator->next('Siguiente »', null, null, array('class' => 'disabled')); ?>
</div></br></br>

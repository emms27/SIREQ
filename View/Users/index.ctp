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
                                array('controller'=>'Users','action'=>'index'),
				array('title'=>'User del Poder Judicial','escape' => false));
?>
</li>
<li class="active">
<?php
           echo $this->Html->link('Consulta',
                                array('controller'=>'Users','action'=>'index'),
				array('title'=>'Consulta','escape' => false));
?>
</li>
</ul>
<h3 class="page-header page-header-top">Consulta de Usuarios<small> La consulta de usuarios te muestran una línea temporal de todas los usuarios realizados en el Sistema desde el principio de los tiempos.</small></h3>
<p class="well">» Total de registros encontrados: <strong><?php echo $this->Paginator->counter(array('format' => '%count%')); ?></strong>.</br> » Se mostrar&aacute; un total de <strong>50</strong> registros por p&aacute;gina.</br>
    » Usted se encuentra consultando la p&aacute;gina <strong><?php echo $this->Paginator->counter(array('format' => '%page% de %pages%')); ?></strong>.</p>

    <?php echo $this->Form->create('User',array('action'=>'index')); ?>
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
                                array('controller'=>'Users','action'=>'index'),
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
         echo $this->Html->link('<i class="fa fa-plus"></i>&nbsp;',
                                   array('controller'=>'Users','action'=>'add'),
   				array('title'=>'Agregar Producto',
   				      'escape' => false,
   				      'class'=>'btn btn-danger',
   				      'data-title'=>'Agregar Producto',
   				      'rel'=>"tooltip",
   				      'data-placement'=>"top",
   				      'data-trigger'=>"hover"
            ));

         echo $this->Form->end(); ?></span>
  </div>
 </div>
</div></form><br><br><br>
<h4>Usuarios Activos</h4>
<table class="table table-hover">
 <?php  $u=1; foreach ($user as $user):
  $fdate=explode(' ',$user['User']['fecha_update']);
  if (($user['User']['filename']=='') || ($user['User']['filename']==NULL)) $foto='no_picture.png';
  else $foto=$user['User']['filename'];
 ?>
    <tr>
     <td>
<div id="modal-user-settings<?php echo $u; ?>" class="modal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4>Perfil</h4>
</div>
<div class="modal-body">
<ul id="example-user-tabs" class="nav nav-tabs" data-toggle="tabs">
<li class="active"><a href="#example-user-tabs-account<?php echo $u; ?>"><i class="fa fa-cogs"></i> Account</a></li>
<li><a href="#example-user-tabs-profile<?php echo $u; ?>"><i class="fa fa-user"></i> Profile</a></li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="example-user-tabs-account<?php echo $u; ?>">
<h4 class="page-header-sub">Cuenta</h4>
<form class="form-horizontal">
<div class="form-group">
<label class="control-label col-md-3">Username</label>
<div class="col-md-9">
<p class="form-control-static"><?php echo $user['Personal']['id'];  ?></p>
<span class="help-block">El username es la matrícula</span>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" for="example-user-pass">Role</label>
<div class="col-md-9">
<?php echo $user['Role']['name']; ?>
<span class="help-block">Role para los permisos en el sistema</span>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" for="example-user-newpass">Asignación</label>
<div class="col-md-9">
<?php //echo $user['AssignmentPersonal']['Assignment']['descripcion']; ?>
</div>
</div>
</form>
</div>
<div class="tab-pane" id="example-user-tabs-profile<?php echo $u; ?>">
<h4 class="page-header-sub">Image</h4>
<div class="form-horizontal">
<div class="form-group">
<div class="col-md-3">
<?php
 echo $this->Html->image('uploads/user/filename/'.$foto,array("class"=>"img-circle img-responsive push","width"=>"180px","height"=>"180px"));
?>
</div>
</div>
</div>
<form class="form-horizontal">
<h4 class="page-header-sub">Details</h4>
<div class="form-group">
<label class="control-label col-md-3" for="example-user-firstname">Firstname</label>
<div class="col-md-9">
<input type="text" id="example-user-firstname" name="example-user-firstname" class="form-control" value="<?php echo $user['Personal']['nombre']; ?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" for="example-user-lastname">Lastname</label>
<div class="col-md-9">
<input type="text" id="example-user-lastname" name="example-user-lastname" class="form-control" value="<?php echo $user['Personal']['apepat'].' '.$user['Personal']['apemat']; ?>">
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" for="example-user-bio">Bio</label>
<div class="col-md-9">
<textarea id="example-user-bio" name="example-user-bio" class="form-control textarea-elastic" rows="3">Bio Information..</textarea>
</div>
</div>
<h5 class="page-header-sub">Social</h5>
<div class="form-group">
<label class="control-label col-md-3" for="example-user-fb">Facebook</label>
<div class="col-md-9">
<div class="input-group">
<input type="text" id="example-user-fb" name="example-user-fb" class="form-control">
<span class="input-group-addon"><i class="fa fa-facebook fa-fw"></i></span>
</div>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" for="example-user-twitter">Twitter</label>
<div class="col-md-9">
<div class="input-group">
<input type="text" id="example-user-twitter" name="example-user-twitter" class="form-control">
<span class="input-group-addon"><i class="fa fa-twitter fa-fw"></i></span>
</div>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" for="example-user-pinterest">Pinterest</label>
<div class="col-md-9">
<div class="input-group">
<input type="text" id="example-user-pinterest" name="example-user-pinterest" class="form-control">
<span class="input-group-addon"><i class="fa fa-pinterest fa-fw"></i></span>
</div>
</div>
</div>
<div class="form-group">
<label class="control-label col-md-3" for="example-user-github">Github</label>
<div class="col-md-9">
<div class="input-group">
<input type="text" id="example-user-github" name="example-user-github" class="form-control">
<span class="input-group-addon"><i class="fa fa-github fa-fw"></i></span>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
<div class="modal-footer remove-margin">
<button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>
</div>
</div>
</div>
</td>
     <td><?php
		echo $this->Html->link(
$this->Html->image('uploads/user/filename/'.$foto,array("class"=>"img-circle img-responsive push","width"=>"80px","height"=>"80px")),
		  	'#modal-user-settings'.$u,//'action' => 'view', $user['User']['id']),
			array(
			      "role"=>"button","data-toggle"=>"modal",
			      "title"=>"Ver Perfil Usuario","escape"=>false)
               );
      ?>
     </td>
     <td><div align="left"><?php echo $user['Personal']['namefull'];  ?><br><small class="text-muted"><?php  echo $this->Dates->FormatoCompletoFecha($fdate[0]).'&nbsp;&nbsp;'.$fdate[1]; ?></small></div></td>
    <td><?php
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
     </td>
     <td>
      <div class="btn-group">
	       <?php
       if ($user['User']['ver']==0) $sclass="fa fa-times text-danger";
       else $sclass="fa fa-check text-success";

		echo $this->Html->link(_(''),
		  	array('action' => 'status', $user['User']['id']),
			array('class'=>'btn btn-xs btn-default '.$sclass,"data-toggle"=>"tooltip","title"=>"Habilitar Usuario")
               );

		echo $this->Html->link('',
		  	'#modal-user-settings'.$u,//'action' => 'view', $user['User']['id']),
			array('class'=>'btn btn-xs btn-info fa fa-search',//"data-toggle"=>"tooltip",
			      "role"=>"button","data-toggle"=>"modal",
			      "title"=>"Perfil Usuario")
               );

		echo $this->Html->link(_(''),
		  	array('action' => 'permisos', $user['User']['id']),
			array('class'=>'btn btn-xs btn-warning fa fa-lock',"data-toggle"=>"tooltip","title"=>"Permisos Usuario")
               );
		echo $this->Html->link(_(''),
		  	array('action' => 'edit', $user['User']['id']),
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

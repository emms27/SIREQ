<?php
/**
 * View alta almacenamiento de Depositos.
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 *
 */
  $fdate=explode(' ',$personal['User']['fecha_update']);
  if (($personal['User']['filename']=='') || ($personal['User']['filename']==NULL)) $foto='user.jpg';
  else $foto=$personal['User']['filename'];

  echo $this->Html->css(array('radio'));
  $oestado=array('activo'=>'activo','desactivado'=>'desactivado');
  $aestado=array('legend'=>false,
 	         'label'=>false,
                 'id'=>'enable');
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
                                array('controller'=>'Products','action'=>'index'),
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
<h3 class="page-header page-header-top">Editar Perfil<small> ...</small></h3>


<table border="0">
 </tr>
 <tr>
  <td colspan="3" class="arial11gris" align="left" style="padding-top:10px; padding-bottom:10px;">

  </td>
 </tr>
</table>

<table style="border:1px solid #DDD; width:90%"><tr><td>
<?php
echo $this->Form->create('User', array('action' => 'edit'));
echo $this->Form->input('User.id', array('type'=> 'hidden'));
?>
 <table border="0" width="100%" cellpadding="0" cellspacing="0" class="arial12gris">
  <tr><td colspan="2"><strong><?php echo $personal['Personal']['namefull']; ?></strong></td></tr>
                            <tr><td height="5" colspan="2" bgcolor="#E5E5E5"></td></tr>
                            <tr>
                              <td width="271" rowspan="18" align="center" valign="middle">
				<?php echo $this->Html->image('uploads/user/filename/'.$foto,array("width"=>"180px","height"=>"180px","border"=>"0")); ?>
                              <td align="left">&nbsp;</td>
                            </tr>
                            <tr>
                              <td align="left" valign="top" bgcolor="#E5E5E5">&nbsp;</td>
                            </tr>
                            <tr>
                              <td align="left" valign="top">&nbsp;</td>
                            </tr>
                            <tr>
                              <td>

<div class="form-group">
 <label class="control-label col-md-2"></label>
 <div class="col-md-5">
  <div class="input-group">
                  <?php
		  echo $this->Form->input('User.passwordactual',
				          array('label' =>false,
							  'type'=>'password',
							  'size'=>'50',
							  'maxlength'=>'255',
						          'placeholder'=>'password actual',
							  'id'=>"example-input-append2",
							  'class'=>"form-control"
							  )
		                                );
		 ?>
   <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
  </div>
 </div>
</div>

			   </td>
                            </tr>
                            <tr>
                              <td>
<div class="form-group">
 <label class="control-label col-md-2"></label>
 <div class="col-md-5">
  <div class="input-group">
                  <?php
		  echo $this->Form->input('User.passwordnew',
				          array('label' =>false,
							  'type'=>'text',
							  'size'=>'50',
							  'maxlength'=>'255',
						          'placeholder'=>'password nuevo',
							  'id'=>"example-input-append2",
							  'class'=>"form-control"
							  )
		                                );
		 ?>
   <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
  </div>
 </div>
</div>

			   </td>
                            </tr>
                            <tr>
                              <td>
<div class="form-group">
 <label class="control-label col-md-2"></label>
 <div class="col-md-5">
  <div class="input-group">
                  <?php
		  echo $this->Form->input('User.confirmpassword',
				          array('label' =>false,
							  'type'=>'text',
							  'size'=>'50',
							  'maxlength'=>'255',
						          'placeholder'=>'repetir password',
							  'id'=>"example-input-append2",
							  'class'=>"form-control"
							  )
		                                );
		 ?>
   <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
  </div>
 </div>
</div>
			     </td>
                            </tr>
                            <tr><td align="left" valign="top">&nbsp;</td></tr>
                            <tr><td align="left" valign="top" bgcolor="#EEEEEE">&nbsp;</td></tr>
                            <tr><td align="left" valign="top">&nbsp;</td></tr>
                          </table>
<div align="center">
<div class="form-group form-actions">
 <div class="col-md-10 col-md-offset-2">
  <button class="btn btn-success"><i class="fa fa-save"></i> Guardar Información</button>
 </div>
</div>
 </div><?php  echo $this->Form->end(); ?><br><br><br></div>
</td></tr></table>
<p align="center" class="arial11grisclaro" >
 <em><strong>Última Actualización:</strong>
  <?php  echo $this->Dates->FormatoCompletoFecha($fdate[0]).'&nbsp;&nbsp;'.$fdate[1]; ?>
 </em>
</p>

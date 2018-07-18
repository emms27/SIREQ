<?php
/**
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
  $option=array('1'=>'Activado  ','0'=>'Desactivado');
  $attribe=array('legend'=>false,
 	         'label'=>false,
                 'id'=>'enable'//,
		 //'checked'=> ($foo == "desactivado") ? FALSE : TRUE,
		 //'value' =>'activo'
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
<h3 class="page-header page-header-top">Permisos - Usuario<small> La consulta de usuarios te muestran una línea temporal de todas los usuarios realizados en el Sistema desde el principio de los tiempos.</small></h3>

<table style="border:1px solid #DDD; width:90%"><tr><td>
<?php
echo $this->Form->create('User', array('action' => 'permisos','type' => 'file'));
echo $this->Form->input('User.id', array('type'=> 'hidden'));
?>
 <table border="0" width="100%" cellpadding="0" cellspacing="0">
  <tr><td colspan="2"><strong><?php echo $personal['Personal']['namefull']; ?></strong></td></tr>
                            <tr><td height="5" colspan="2"></td></tr>
                            <tr><td height="5" colspan="2" bgcolor="#E5E5E5"></td></tr>
                            <tr>
                              <td width="271" rowspan="18" align="center" valign="middle">
				<?php echo $this->Html->image('uploads/user/filename/'.$foto,array("width"=>"180px","height"=>"180px","border"=>"0")); ?>
                              <td align="left">&nbsp;</td>
                            </tr>
                            <tr>
                              <td align="left" valign="top">&nbsp;</td>
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
<label class="control-label col-md-2" for="example-input-success">Role</label>
<?php
	    echo $this->Form->input('User.role_id',
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
<br><br>
			     </td>
                            </tr>                          
                            <tr>
                              <td>
<div class="form-box-content">
<div class="form-group">
<label class="control-label col-md-2">Status</label>
<div class="col-md-10">
	<?php
 echo $this->Form->radio('ver',$option,$attribe);
 echo $this->Form->error('ver');
?>
</div>
</div>
 </div><br><br><br>
			</td>
                       </tr>
                       <tr>
                        <td>
<div class="form-group">
 <label class="control-label col-md-2">Imágen</label>
 <div class="col-md-5">
  <div class="input-group">
<?php
echo $this->Form->input('User.filename', array('type' => 'file','label'=>false));
echo $this->Form->input('User.dir', array('type' => 'hidden'));
echo $this->Form->input('User.mimetype', array('type' => 'hidden'));
echo $this->Form->input('User.filesize', array('type' => 'hidden'));

		 ?>
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
  <button class="btn btn-success"><i class="fa fa-save"></i> Guardar Información</button>


<?php //echo $this->Form->end('Guardar información'); ?><br><br>
</div>
</td></tr>
<?php  echo $this->Form->end(); ?>
</table>
<p align="center" class="arial11grisclaro" >
 <em><strong>Última Actualización:</strong>
  <?php  echo $this->Dates->FormatoCompletoFecha($fdate[0]).'&nbsp;&nbsp;'.$fdate[1]; ?>
 </em>
</p>

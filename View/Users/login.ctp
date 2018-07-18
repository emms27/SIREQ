<?php ?>
<div class="box-header">
<h1><?php echo $this->Html->image('logos/logo4.png',array("width"=>"170px","border"=>"0")); ?></h1></div>
<div class="box-body clearfix">
<div>
<p>* Por favor, ingrese su matrícula y password</p>
<?php echo $this->Form->create('User', array('action' => 'login'));   ?>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
<?php
		$this->Form->inputDefaults(array('label' => false,));
		echo $this->Form->input('username', array(
			'placeholder' => __('Matrícula'),
			'before' => '<span class="add-on"><i class="icon-user"></i></span>',
			'div' => 'input-prepend text',
			'class' => 'form-control',
			'autocomplete'=>"off",
			'autofocus'
		));
?>
</div>
</div>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-fw fa-lock"></i></span>
	<?php
		echo $this->Form->input('password', array(
 		        'type'=>'password',
			'placeholder' => 'Password',
			'before' => '<span class="add-on"><i class="icon-key"></i></span>',
			'div' => 'input-prepend password',
			'class' => 'form-control',
		));
	?>
</div>
</div>
<div class="input-group pull-left">
<!-- <div class="checkbox">
<input type="checkbox" name="remember-me" id="remember-me" class="remember-me">
<label class="remember-me" for="remember-me">Remember me</label>
</div>
-->
<?php
		echo $this->Html->link(__('Olvidó su password?'), 
				       array(
					     'admin' => false,
					     'controller' => 'users',
					     'action' => 'forgot',
				       ), array('class' => 'forgot'));
?>
</div>
<div class="input-group pull-right">
<button type="submit" class="btn btn-bwtheme btn-primary"><i class="fa fa-sign-in"></i> Iniciar Sesión</button>
</div>
<?php    echo $this->Form->end(); ?>
</div>
</div>
</div>

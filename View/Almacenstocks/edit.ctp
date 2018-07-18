<div class="almacenstocks form">
<?php echo $this->Form->create('Almacenstock'); ?>
	<fieldset>
		<legend><?php echo __('Edit Almacenstock'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('almacenproduct_id');
		echo $this->Form->input('almaceninvoice_id');
		echo $this->Form->input('umetrica');
		echo $this->Form->input('uprecio');
		echo $this->Form->input('notas');
		echo $this->Form->input('ver');
		echo $this->Form->input('fecha_registro');
		echo $this->Form->input('fecha_update');
		echo $this->Form->input('Almacenrequisition');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Almacenstock.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Almacenstock.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Almacenstocks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Almacenproducts'), array('controller' => 'almacenproducts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacenproduct'), array('controller' => 'almacenproducts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almaceninvoices'), array('controller' => 'almaceninvoices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almaceninvoice'), array('controller' => 'almaceninvoices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenrequisitions'), array('controller' => 'almacenrequisitions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacenrequisition'), array('controller' => 'almacenrequisitions', 'action' => 'add')); ?> </li>
	</ul>
</div>

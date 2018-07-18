<div class="almacenstocks index">
	<h2><?php echo __('Almacenstocks'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('almacenproduct_id'); ?></th>
			<th><?php echo $this->Paginator->sort('almaceninvoice_id'); ?></th>
			<th><?php echo $this->Paginator->sort('umetrica'); ?></th>
			<th><?php echo $this->Paginator->sort('uprecio'); ?></th>
			<th><?php echo $this->Paginator->sort('notas'); ?></th>
			<th><?php echo $this->Paginator->sort('ver'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_registro'); ?></th>
			<th><?php echo $this->Paginator->sort('fecha_update'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($almacenstocks as $almacenstock): ?>
	<tr>
		<td><?php echo h($almacenstock['Almacenstock']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($almacenstock['Almacenproduct']['id'], array('controller' => 'almacenproducts', 'action' => 'view', $almacenstock['Almacenproduct']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($almacenstock['Almaceninvoice']['id'], array('controller' => 'almaceninvoices', 'action' => 'view', $almacenstock['Almaceninvoice']['id'])); ?>
		</td>
		<td><?php echo h($almacenstock['Almacenstock']['umetrica']); ?>&nbsp;</td>
		<td><?php echo h($almacenstock['Almacenstock']['uprecio']); ?>&nbsp;</td>
		<td><?php echo h($almacenstock['Almacenstock']['notas']); ?>&nbsp;</td>
		<td><?php echo h($almacenstock['Almacenstock']['ver']); ?>&nbsp;</td>
		<td><?php echo h($almacenstock['Almacenstock']['fecha_registro']); ?>&nbsp;</td>
		<td><?php echo h($almacenstock['Almacenstock']['fecha_update']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $almacenstock['Almacenstock']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $almacenstock['Almacenstock']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $almacenstock['Almacenstock']['id']), array(), __('Are you sure you want to delete # %s?', $almacenstock['Almacenstock']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Almacenstock'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Almacenproducts'), array('controller' => 'almacenproducts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacenproduct'), array('controller' => 'almacenproducts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almaceninvoices'), array('controller' => 'almaceninvoices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almaceninvoice'), array('controller' => 'almaceninvoices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenrequisitions'), array('controller' => 'almacenrequisitions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacenrequisition'), array('controller' => 'almacenrequisitions', 'action' => 'add')); ?> </li>
	</ul>
</div>

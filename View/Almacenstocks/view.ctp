<div class="almacenstocks view">
<h2><?php echo __('Almacenstock'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($almacenstock['Almacenstock']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Almacenproduct'); ?></dt>
		<dd>
			<?php echo $this->Html->link($almacenstock['Almacenproduct']['id'], array('controller' => 'almacenproducts', 'action' => 'view', $almacenstock['Almacenproduct']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Almaceninvoice'); ?></dt>
		<dd>
			<?php echo $this->Html->link($almacenstock['Almaceninvoice']['id'], array('controller' => 'almaceninvoices', 'action' => 'view', $almacenstock['Almaceninvoice']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Umetrica'); ?></dt>
		<dd>
			<?php echo h($almacenstock['Almacenstock']['umetrica']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Uprecio'); ?></dt>
		<dd>
			<?php echo h($almacenstock['Almacenstock']['uprecio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Notas'); ?></dt>
		<dd>
			<?php echo h($almacenstock['Almacenstock']['notas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ver'); ?></dt>
		<dd>
			<?php echo h($almacenstock['Almacenstock']['ver']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Registro'); ?></dt>
		<dd>
			<?php echo h($almacenstock['Almacenstock']['fecha_registro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha Update'); ?></dt>
		<dd>
			<?php echo h($almacenstock['Almacenstock']['fecha_update']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Almacenstock'), array('action' => 'edit', $almacenstock['Almacenstock']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Almacenstock'), array('action' => 'delete', $almacenstock['Almacenstock']['id']), array(), __('Are you sure you want to delete # %s?', $almacenstock['Almacenstock']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenstocks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacenstock'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenproducts'), array('controller' => 'almacenproducts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacenproduct'), array('controller' => 'almacenproducts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almaceninvoices'), array('controller' => 'almaceninvoices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almaceninvoice'), array('controller' => 'almaceninvoices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Almacenrequisitions'), array('controller' => 'almacenrequisitions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Almacenrequisition'), array('controller' => 'almacenrequisitions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Almacenrequisitions'); ?></h3>
	<?php if (!empty($almacenstock['Almacenrequisition'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Htsjpassignmentemployee Id'); ?></th>
		<th><?php echo __('Notas'); ?></th>
		<th><?php echo __('Cprint'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Ver'); ?></th>
		<th><?php echo __('Fecha Registro'); ?></th>
		<th><?php echo __('Fecha Autorizada'); ?></th>
		<th><?php echo __('Fecha Cancelada'); ?></th>
		<th><?php echo __('Fecha Entregada'); ?></th>
		<th><?php echo __('Fecha Update'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($almacenstock['Almacenrequisition'] as $almacenrequisition): ?>
		<tr>
			<td><?php echo $almacenrequisition['id']; ?></td>
			<td><?php echo $almacenrequisition['htsjpassignmentemployee_id']; ?></td>
			<td><?php echo $almacenrequisition['notas']; ?></td>
			<td><?php echo $almacenrequisition['cprint']; ?></td>
			<td><?php echo $almacenrequisition['status']; ?></td>
			<td><?php echo $almacenrequisition['ver']; ?></td>
			<td><?php echo $almacenrequisition['fecha_registro']; ?></td>
			<td><?php echo $almacenrequisition['fecha_autorizada']; ?></td>
			<td><?php echo $almacenrequisition['fecha_cancelada']; ?></td>
			<td><?php echo $almacenrequisition['fecha_entregada']; ?></td>
			<td><?php echo $almacenrequisition['fecha_update']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'almacenrequisitions', 'action' => 'view', $almacenrequisition['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'almacenrequisitions', 'action' => 'edit', $almacenrequisition['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'almacenrequisitions', 'action' => 'delete', $almacenrequisition['id']), array(), __('Are you sure you want to delete # %s?', $almacenrequisition['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Almacenrequisition'), array('controller' => 'almacenrequisitions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

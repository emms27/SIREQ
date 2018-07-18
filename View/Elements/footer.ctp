<?php ?>
<footer>
<span id="year-copy"></span> &copy; <a href="#"><strong><?php echo strval(Configure::read('Empresa.siglas')).' '.strval(Configure::read('Empresa.version')); ?></strong></a> - <?php echo $this->Html->link(strval(Configure::read('Empresa.autor')),'/pages/autor_profile',array('title'=>'Ver más del autor','escape' => false));
?>
<i class="icon-heart"></i> by <strong><a href="#" target="_blank"><?php echo strval(Configure::read('Empresa.namefull')); ?>.</a></strong>
</footer>

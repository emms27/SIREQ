<?php  ?>
<footer class="navbar-inverse">
 <div>
   <br><br>
	<?php
echo 'Copyright © '.date('Y').' '.strval(Configure::read('Empresa.namefull')).' | '.strval(Configure::read('Empresa.siglas')).' '.strval(Configure::read('Empresa.version'));
	?>
 </div>
</footer>

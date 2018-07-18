<!DOCTYPE html>
<html lang="en">
	<head>
  	  <?php echo $this->Html->charset(); ?>
		<meta name="viewport" content="width=device-width">
 <title><?php echo $title_for_layout; ?> | <?php echo strval(Configure::read('Empresa.siglas')).' '.strval(Configure::read('Empresa.version')); ?></title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('../themes/bootstrap/3.3.5/css/bootstrap',
					    '../themes/login/css/style.css',
					    //'../themes/login/style.css',
					    'fuentes.css',
					    '../fonts/awesome/4.4.0/css/font-awesome.css'));
		echo $this->Html->script(array('html5'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body class="admin-login">
<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-fix">
<div class="box-container box-login">
					<?php
						echo $this->Session->flash();
						echo '<br>';
						echo $this->fetch('content');

					?>
</div>
</div>
</div>
</div>

<div valign="bottom" style="margin-top: 1cm;">
<?php 	
 echo $this->Html->image('../themes/login/img/img-footpage.png',array("class"=>"img-circle img-responsive"));
?>
</div>



<section id="footer">
<div class="bg-fblue"></div>

<div class="bg-fblack">
<div class="container">
  <div class="row">
        <div class="col-md-12" align="center">
        	<a href="http://www.htsjpuebla.gob.mx" target="blank"><?php echo $this->Html->image('logos/logo-htsjpuebla-small.png');?></a>        	
        	<ul class="zurb-links">
      		    <li><a href="#">About</a></li>
	            <li><a href="#">Contact</a></li>
          		<li><a href="#">Sitemap</a></li>
          		<li><a href="#"><?php 
				echo '&copy; '.date('Y').' '.strval(Configure::read('Empresa.namefull')); ?>
				</a></li>
				<li><a href="#"><?php 
				echo strval(Configure::read('Empresa.siglas')).' '.strval(Configure::read('Empresa.version')); ?>
				</a></li>
       		</ul> 
        </div>
        

  </div>

  <div class="row">
    <div class="col-md-12">   
       <p class="copyright">	
 
		</p>
    </div>
  </div>
</div>
</div>
</div>
</section>

<?php //echo $this->element('admin/footer'); 
	//echo $this->element('sql_dump'); 
        //echo $this->Js->writeBuffer(); // Write cached scripts  
      ?>
	</body>
</html>

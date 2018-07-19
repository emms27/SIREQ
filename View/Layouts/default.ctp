<?php
/**
 * @version 1.0
 * @author L.I. Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 */
?>
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
 <?php echo $this->Html->charset(); ?>
 <title><?php echo $title_for_layout; ?> | <?php echo strval(Configure::read('Empresa.siglas')).' '.strval(Configure::read('Empresa.version')); ?></title>
 <link rel="apple-touch-icon" href="<?php echo $this->Html->url('/img/apple-touch-SIREQ.png'); ?>"  />
 <link rel="stylesheet" href="https://www.cloudbits.org.mx/themes/cakephp/uadmin/2.1/css/bootstrap.css" >
  <?php
                echo $this->Html->meta('favicon.ico',$this->webroot.'img/icons/favicon.ico',array('type' => 'icon'));

		echo $this->Html->css(array(
					    '../themes/uadmin/2.1/css/bootstrap',
					    '../themes/uadmin/2.1/css/plugins',
					    '../themes/uadmin/2.1/css/main',
					    '../themes/uadmin/2.1/css/themes',
             	'paginacion',
					    '../themes/uadmin/2.1/css/fonts',
					    '../fonts/awesome/4.3.0/css/font-awesome',
              '../themes/uadmin/jgritter/css/jquery.gritter',
			        '../themes/uadmin/alertify/css/alertify.core',
			        '../themes/uadmin/alertify/css/alertify.default'
		));


    // echo $this->Html->script(array('jquery1.11.1'));
    // echo $this->Html->script(array('jquery-1.6.4.min'));
    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>';
    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>';
    // echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>';
    // echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>';
    // echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>';

    echo $this->Html->script(array(
        '../themes/uadmin/alertify/js/alertify'
    ));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                echo $this->Html->scriptBlock('var webroot="'.$this->webroot.'";');
		$layout = $this->Helpers->load('Dates');

?>
</head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo 'Pruebas'; ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                echo $this->Html->scriptBlock('var webroot="'.$this->webroot.'";');
		$layout = $this->Helpers->load('Dates');
	?>
	<link rel="shortcut icon" href="img/favicon.ico">
	<link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">
	<link rel="apple-touch-icon" href="img/icon72.png" sizes="72x72">
	<link rel="apple-touch-icon" href="img/icon76.png" sizes="76x76">
	<link rel="apple-touch-icon" href="img/icon114.png" sizes="114x114">
	<link rel="apple-touch-icon" href="img/icon120.png" sizes="120x120">
	<link rel="apple-touch-icon" href="img/icon144.png" sizes="144x144">
 	<link rel="apple-touch-icon" href="img/icon152.png" sizes="152x152">
</head>
<body>
 <div id="page-container">
  <?php echo $this->element("tools_up");?>
  <div id="inner-container">
   <aside id="page-sidebar" class="collapse navbar-collapse navbar-main-collapse">
    <?php echo $this->Form->create('Requisition',array('action'=>'index','id'=>"sidebar-search")); ?>
     <div class="input-group">
      <?php echo $this->Form->input(
                   'sparte', array('label'=>false,
						       'div' => false,
						       'placeholder'=>'Busca una Requisición',
		 			         'type'=>'text',
						       'id'=>'sidebar-search-term',
		               'x-webkit-speech speech required onspeechchange'=>'startSearch();',
                   'autocapitalize'=>"on", 'autocomplete'=>"on",'autocorrect'=>"on"
            ));
      ?>
      <button><i class="fa fa-search"></i></button>
     </div>
    </form>
    <?php echo $this->element("tools_menu");?>
   </aside>
   <div id="page-content">
   <?php echo $this->Session->flash(); echo $this->Session->flash('auth'); ?>
    <?php echo $this->fetch('content'); ?>
   </div>
   <?php echo $this->element("footer");?>
</div>
</div>
<a href="javascript:void(0)" id="to-top"><i class="fa fa-chevron-up"></i></a>
<?php echo $this->element('admin/avisos'); ?>
<?php
echo $this->Html->script(array(
          '../themes/uadmin/2.1/js/bootstrap3.3.1',
          '../themes/uadmin/1.6/js/plugins.1-6',
          '../themes/uadmin/1.6/js/main.1-6-1',
          '../themes/uadmin/Editores/CKEditor/ckeditor4.3.3standard/ckeditor',
          '../themes/uadmin/jgritter/js/jquery.gritter.min',
          '../themes/uadmin/2.1/js/modernizr-responsive'
));
?>
</body>
</html>

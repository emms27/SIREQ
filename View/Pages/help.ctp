<?php 
/**
 * View alta almacenamiento de Depositos.
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 */

                echo $this->Html->meta('favicon.ico',$this->webroot.'img/icons/favicon.ico',array('type' => 'icon'));
		echo $this->Html->css(array(
					    'BxSlider/jquery.bxslider',
					    //'BxSlider/style',
					    //'BxSlider/github',
                                            )
                                       );
		echo $this->Html->script(array(
					    'BxSlider/plugins/jquery.fitvids',
					    'BxSlider/jquery.bxslider',
                                              )
                                         );
	 $datetoday = $this->Helpers->load('Dates');
?>
<script type="text/javascript">
  $(document).ready(function(){
    
$('.bxslider').bxSlider({
  video: true,
  useCSS: false
});
  });
</script>

<div class="breadcrumb">
       <?php
         echo $this->Html->link('', 
                                array('controller'=>'pages','action'=>'home'),
				array('title'=>'Inicio','escape' => false,'class'=>'icon-home'));
         echo '<span class="divider">/</span>';
         echo $this->Html->link('Ayuda', 
                                array('controller'=>'pages','action'=>'help'),
				array('title'=>'Ayuda','escape' => false));
       ?>
</div><br><br>

<h6 style="float:right;"><?php echo $datetoday->fechaActual(); ?></h6>

<h1>Fichas</h1>
<div class="slider">
<ul class="bxslider">
<!--
  <li>
    <iframe src="http://player.vimeo.com/video/17914974" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
  </li>
-->
  <li>
   <video width="100%" height="380" controls>
    <source src="<?php echo $this->webroot; ?>app/webroot/files/tutoriales/FichaAlta.ogv" type="video/ogg">
     Your browser does not support the video tag.
   </video>
  </li>
  <li>
   <video width="100%" height="380" controls>
    <source src="<?php echo $this->webroot; ?>app/webroot/files/tutoriales/FichaAlta2.ogv" type="video/ogg">
     Your browser does not support the video tag.
   </video>
  </li>
  <li>
   <video width="100%" height="380" controls>
    <source src="<?php echo $this->webroot; ?>app/webroot/files/tutoriales/FechaDeposito.ogv" type="video/ogg">
     Your browser does not support the video tag.
   </video>
  </li>
  <li>
   <video width="100%" height="380" controls>
    <source src="<?php echo $this->webroot; ?>app/webroot/files/tutoriales/FichaBusqueda.ogv" type="video/ogg">
     Your browser does not support the video tag.
   </video>
  </li>
  <li>
   <video width="100%" height="380" controls>
    <source src="<?php echo $this->webroot; ?>app/webroot/files/tutoriales/FichaCancelada.ogv" type="video/ogg">
     Your browser does not support the video tag.
   </video>
  </li>

</ul>
</div>

<h1>Orden de Pago</h1>
<div class="slider">
<ul class="bxslider">
<!--
  <li>
    <iframe src="http://player.vimeo.com/video/17914974" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
  </li>
-->
  <li>
   <video width="100%" height="380" controls>
    <source src="<?php echo $this->webroot; ?>app/webroot/files/tutoriales/OrdenAlta.ogv" type="video/ogg">
     Your browser does not support the video tag.
   </video>
  </li>
  <li>
   <video width="100%" height="380" controls>
    <source src="<?php echo $this->webroot; ?>app/webroot/files/tutoriales/OrdenEditar.ogv" type="video/ogg">
     Your browser does not support the video tag.
   </video>
  </li>
  <li>
   <video width="100%" height="380" controls>
    <source src="<?php echo $this->webroot; ?>app/webroot/files/tutoriales/OrdenImprimir.ogv" type="video/ogg">
     Your browser does not support the video tag.
   </video>
  </li>
</ul>
</div>

<h1>Partes</h1>
<div class="slider">
<ul class="bxslider">
<!--
  <li>
    <iframe src="http://player.vimeo.com/video/17914974" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
  </li>
-->
  <li>
   <video width="100%" height="380" controls>
    <source src="<?php echo $this->webroot; ?>app/webroot/files/tutoriales/ParteAlta.ogv" type="video/ogg">
     Your browser does not support the video tag.
   </video>
  </li>
  <li>
   <video width="100%" height="380" controls>
    <source src="<?php echo $this->webroot; ?>app/webroot/files/tutoriales/ParteEditar.ogv" type="video/ogg">
     Your browser does not support the video tag.
   </video>
  </li>
</ul>
</div>

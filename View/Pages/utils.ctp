<?php 
/**
 * View alta almacenamiento de Depositos.
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 *
 */

 $datetoday = $this->Helpers->load('Dates');
?>
<div class="breadcrumb">
       <?php
         echo $this->Html->link('', 
                                array('controller'=>'pages','action'=>'home'),
				array('title'=>'Inicio','escape' => false,'class'=>'icon-home'));
         echo '<span class="divider">/</span>';
         echo $this->Html->link('Utilidades', 
                                array('controller'=>'pages','action'=>'utils'),
				array('title'=>'Utilidades','escape' => false));
       ?>
</div><br><br>

<h6 style="float:right;"><?php echo $datetoday->fechaActual(); ?></h6>
<table class="cuadrocafe2">
 <tr>
  <td>
   <p align="left" style="padding:7px;">
    <span class="encabezados">Google Chrome</span><br>
    <span class="arial12violeta">&ldquo;El navegador de Google, r&aacute;pido y moderno&rdquo;</span><br>
    <span class="arial10gris">Por Jordi Bonet sobre Google Chrome</span><br>
    <span class="arial10gris"><a href="http://google-chrome.softonic.com/" class="accesodir" target="_blank">Fuente: http://google-chrome.softonic.com/</a></span><br>
   </p>

 </tr>
 <tr>
  <td>
   <div style="float:right; border:none; padding:10px; width:170px; height:170px;">
    <?php
         echo $this->Html->link(
               $this->Html->image("logos/chrome.png",array("width"=>"170px","height"=>"170px","border"=>"0")),
               'http://www.google.com/chrome?hl=es',
   	       array('title'=>'Descargar Chrome','escape' => false,'target'=>"_blank")); 
    ?>
   </div>
   <p align="justify" style="padding:7px;" > 
Google Chrome es el navegador web desarrollado por Google. Un navegador pensado para mejorar tu experiencia mientras navegas por Internet. Una excelente alternativa al Internet Explorer, Mozilla Firefox u Opera. <br>

En Google Chrome se premia la eficiencia y el minimalismo. Su entorno únicamente muestra los controles básicos para navegar por Internet. Pero bajo ese entorno simplista, se esconden tres características muy interesantes: un innovador sistema de pestañas, una barra de direcciones con buscador integrado y una ventana resumen para facilitarte el acceso a tus páginas favoritas.<br>

Sin duda, una de las características que hacen de Google Chrome un navegador diferente al resto es su sistema de pestañas. Al igual que en Internet Explorer o en Mozilla Firefox puedes abrir diferentes pestañas para visitar diferentes páginas en una misma ventana. La novedad es que estas pestañas son procesos totalmente independientes. Si una página genera errores o se cuelga, es posible cerrarla sin que afecte al resto de las pestañas abiertas.<br>

Referente a la barra de direcciones, Google Chrome da un paso más que Mozilla integrando un buscador. Google Chrome agiliza la entrada de las direcciones mostrándote las páginas más vistas, diferentes términos de consulta, páginas en tus favoritas u otras páginas visitadas anteriormente. Todo en un tiempo récord.<br>

Otra de las novedades que Google Chrome incluye es una ventana resumen. En ella se muestran imágenes en miniatura de tus páginas más visitadas, tus marcadores recientes, un historial con las últimas búsquedas y otros elementos que te ayudarán a agilizar el acceso al círculo de páginas por el que te sueles mover.<br>

Además, Google Chrome soporta temas y extensiones, con lo que no sólo podrás personalizar el aspecto de tu navegador, sino también ampliar sus funciones gracias a las miles de extensiones disponibles en el directorio oficial de Google Chrome.<br>

En definitiva, Google Chrome es el navegador web de Google. Un navegador que incluye una serie de novedades que, sin duda, no te dejarán indiferente.<br><br>

<strong>Cambios recientes en Google Chrome: </strong> <br>
&bull; Muchas correcciones<br>
&bull; Actualizado el soporte de HTML5<br>
&bull; Api de archivo<br>
&bull; Subida de archivos desde la etiqueta input<br><br>
<strong>Para utilizar Google Chrome necesitas:</strong><br>
&bull; Sistema operativo: WinXP/Vista/7<br></p>
  </td>
 </tr>
</table>

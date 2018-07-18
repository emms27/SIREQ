<?php

/**
 * Helper para mostrar un select list de todos los paises.
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @link http://www.pedroventura.com/blog_programacion/2009/10/08/cakephp-helper-para-crear-un-listado-de-paises/
 *
 */

class IdentificacionHelper extends AppHelper
{

 public $helpers = array('Form');

 function ComboIdentificacion($camponombre, $label=null, $default=null, $atributos=null)
 {
  $identificacion=array(//'Cédula Profesional'=>'Cédula Profesional',
	                'Credencial de Elector' => 'Credencial de Elector'
		        //'Pasaporte' => 'Pasaporte'
		        //'Licencia para Conducir' => 'Licencia para Conducir',
		        //'Cartilla de Servicio Militar' => 'Cartilla de Servicio Militar',
		        //'otros' => 'otros'
                        );
   
  $list = '';
  $list .= $this->Form->input($camponombre, 
			      array('options' => $identificacion,
				    'label'=>$label,
				    'div' => array('class' => 'col-md-3'),
				    'class'=>"form-control"
				    //'empty' => 'Por favor, seleccione...'
                                   )
  );

  // $list .= $this->Form->input($camponombre , , $default, $atributos,false);
  $list .= '';

  return $this->output($list);
 }
}

?>

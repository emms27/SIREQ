<?php

/**
 * Helper para mostrar un select list de todos los paises.
 * @version 1.0
 * @author L.I. Emmanuel Sanchez Carreon
 * @link http://www.pedroventura.com/blog_programacion/2009/10/08/cakephp-helper-para-crear-un-listado-de-paises/
 *
 */

class EstadoCivilHelper extends AppHelper
{

 public $helpers = array('Form');

 function ComboEstadoCivil($camponombre, $label=null, $default=null, $atributos=null)
 {
  $ecivil=array('Soltero(a)'=>'Soltero(a)',
	        'Casado(a)'=>'Casado(a)',
	        'Divorciado(a)'=>'Divorciado(a)',
	        'Viudo(a)'=>'Viudo(a)',
	        'Unión Libre'=>'Unión Libre',
	        'otro'=>'otro'
               );  
   
 $list = '';
 //if ($label!=null) $list .= $this->Form->label($label);

 $list .= $this->Form->input($camponombre, 
                             array('options' => $ecivil,
 				   'label'=>$label,
				   'div' => array('class' => 'col-md-3'),
				   'class'=>"form-control",
				   'empty' => 'Por favor, seleccione...'
                                  ));

// $list .= $this->Form->input($camponombre , , $default, $atributos,false);
 $list .= '';


 return $this->output($list);
 }


}

?>

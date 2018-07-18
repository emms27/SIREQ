<?php

/**
 * Helper para mostrar un select list de todos los paises.
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 *
 */

class IdentificacionHelper extends AppHelper
{

 public $helpers = array('Form');

 function ComboEstatushsbc($camponombre, $label=null, $default=null, $atributos=null)
 {
  $estatus=array('01'=> 'En tránsito',
	         '03'=> 'Cancelado',
		 '04'=> 'Suspendido',
		 '05'=> 'Reactivo'
                );
   
  $list = '';
  //if ($label!=null) $list .= $this->Form->label($label);

  $list .= $this->Form->input($camponombre, 
			     array('options' =>  $estatus,
				   'label'=> $label,
				   'empty' => 'Por favor, seleccione...'
                                  )
                         );

  // $list .= $this->Form->input($camponombre , , $default, $atributos,false);
  $list .= '';


 return $this->output($list);
 }


}

?>

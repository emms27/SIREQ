<?php
/**
 * Helper para mostrar un select list de todos los paises.
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 *
 */

class BancosHelper extends AppHelper
{

 public $helpers = array('Form');

 function ComboBancos($camponombre, $label=null, $default=null, $atributos=null)
 {

$bancos = array('HSBC - México'     => 'HSBC - México',
                'Banamex'           => 'Banamex',
                'BBVA Bancomer'     => 'BBVA Bancomer',
		'Santander Serfin'  => 'Santander Serfin',
                'Scotiabank Inverlat' => 'Scotiabank Inverlat',
                'Banco Azteca'      => 'Banco Azteca',
                'Bank of America - México' => 'Bank of America - México',
                'Grupo Financiero Banorte' => 'Grupo Financiero Banorte',
                'Banco de México'   => 'Banco de México',
                'Banco del Bajío'   => 'Banco del Bajío',
                'Bansí'    => 'Bansí',
                'BanRegio' => 'BanRegio',
                'Nacional Financiera - Banca de Desarrollo' => 'Nacional Financiera - Banca de Desarrollo',
                'Banco de Comercio Exterior' => 'Banco de Comercio Exterior',
                'Banco Nacional de Crédito Rural S.N.C.' => 'Banco Nacional de Crédito Rural S.N.C.',
                'Asociación de banqueros de México'      => 'Asociación de banqueros de México',
                'Banco Nacional de Obras y Servicios Públicos' => 'Banco Nacional de Obras y Servicios Públicos');
 
 $list = '';
 //if ($label!=null) $list .= $this->Form->label($label);

 $list .= $this->Form->input($camponombre, 
                             array('options' => $bancos,
				   'label'=>$label,
				   'empty' => 'Por favor, seleccione...'
                                  )
                         );

// $list .= $this->Form->input($camponombre , , $default, $atributos,false);
 $list .= '';


 return $this->output($list);
 }

}
?>

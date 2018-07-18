<?php

/**
 * Helper para mostrar un select list de todos los paises.
 * @version 1.0
 * @author Pedro Ventura
 * @link http://www.pedroventura.com/blog_programacion/2009/10/08/cakephp-helper-para-crear-un-listado-de-paises/
 *
 */

class PaisesHelper extends AppHelper
{

 public $helpers = array('Form');

 function crearComboPaises($camponombre, $label=null, $default=null, $atributos=null)
 {
  $paises=array(
	 'AF'=>'Afganistán',
	 'AL'=>'Albania',
	 'DE'=>'Alemania',
	 'AD'=>'Andorra',
	 'AO'=>'Angola',
	 'AI'=>'Anguila',
	 'AQ'=>'Antártica',
	 'AG'=>'Antigua y Barbuda',
	 'AN'=>'Antillas Holandesas',
	 'SA'=>'Arabia Saudá',
	 'DZ'=>'Argelia',
	 'AR'=>'Argentina',
	 'AM'=>'Armenia',
	 'AW'=>'Aruba',
	 'AU'=>'Australia',
	 'AT'=>'Austria',
	 'AZ'=>'Azerbaiján',
	 'BE'=>'Bélgica',
 	 'BS'=>'Bahamas',
	 'BH'=>'Bahrain',
	 'BD'=>'Bangladesh',
	 'BB'=>'Barbados',
	 'BY'=>'Belarus',
	 'BZ'=>'Belice',
	 'BJ'=>'Benin',
	 'BM'=>'Bermuda',
 	 'BO'=>'Bolivia',
	 'BA'=>'Bosnia-Hercegovina',
	 'BW'=>'Botswana',
	 'BR'=>'Brasil',
	 'BN'=>'Brunei Darussalam',
	 'BG'=>'Bulgaria',
 	 'BF'=>'Burkina Faso',
	 'BI'=>'Burundi',
	 'BT'=>'Bután',
	 'CV'=>'Cabo Verde',
	 'KH'=>'Camboya',
	 'CM'=>'Camerún',
	 'CA'=>'Canadá',
	 'TD'=>'Chad',
	 'CL'=>'Chile',
	 'CN'=>'China',
	 'CY'=>'Chipre',
	 'VA'=>'Ciudad del Vaticano',
	 'CO'=>'Colombia',
	 'KM'=>'Comoras',
	 'CG'=>'Congo',
	 'KP'=>'Corea del Norte',
	 'KR'=>'Corea del Sur',
	 'CI'=>'Costa de Marfil',
	 'CR'=>'Costa Rica',
	 'HR'=>'Croacia',
	 'CU'=>'Cuba',
	 'DK'=>'Dinamarca',
	 'DJ'=>'Djibuti',
	 'DM'=>'Dominica',
	 'EC'=>'Ecuador',
	 'EG'=>'Egipto',
	 'SV'=>'El Salvador',
	 'AE'=>'Emiratos Árabes Unidos',
	 'ER'=>'Eritrea',
	 'SK'=>'Eslovaquia',
	 'SI'=>'Eslovenia',
	 'SP'=>'España',
	 'EE'=>'Estonia',
	 'ET'=>'Etiopía',
	 'RU'=>'Federación Rusa',
	 'FJ'=>'Fiji',
	 'PH'=>'Filipinas',
	 'FI'=>'Finlandia',
	 'FR'=>'Francia',
	 'FX'=>'Francia Metropolitana',
	 'GA'=>'Gabón',
	 'GM'=>'Gambia',
	 'GE'=>'Georgia',
	 'GS'=>'Georgia del Sur e Islas Sandwich del Sur',
	 'GH'=>'Ghana',
	 'GI'=>'Gibraltar',
	 'GR'=>'Grecia',
	 'GL'=>'Groenlandia',
	 'GP'=>'Guadalupe',
	 'GU'=>'Guam',
	 'GT'=>'Guatemala',
	 'GF'=>'Guayana Francesa',
	 'GN'=>'Guinea',
	 'GQ'=>'Guinea Ecuatorial',
	 'GW'=>'Guinea-Bissau',
	 'GY'=>'Guyana',
	 'HT'=>'Haití',
	 'HN'=>'Honduras',
	 'HK'=>'Hong Kong',
	 'HU'=>'Hungría',
	 'IN'=>'India',
	 'ID'=>'Indonesia',
	 'IR'=>'Irán',
	 'IQ'=>'Irak',
	 'IE'=>'Irlanda',
	 'BV'=>'Isla Bouvet',
	 'CX'=>'Isla Christmas',
	 'NF'=>'Isla Norfolk',
	 'IS'=>'Islandia',
	 'KY'=>'Islas Caimanes',
	 'CC'=>'Islas Cocos (Keeling)',
	 'CK'=>'Islas Cook',
	 'FO'=>'Islas Faroe',
	 'HM'=>'Islas Heard y Mc Donald',
	 'FK'=>'Islas Malvinas',
	 'MP'=>'Islas Marianas Septentrionales',
	 'MH'=>'Islas Marshall',
	 'SB'=>'Islas Salomón',
	 'SJ'=>'Islas Svalbard y Jan Mayen',
	 'TC'=>'Islas Turks y Caicos',
	 'VG'=>'Islas Vírgenes (Británicas)',
	 'VI'=>'Islas Vírgenes (EEUU)',
	 'WF'=>'Islas Wallis y Futuna',
	 'IL'=>'Israel',
	 'IT'=>'Italia',
	 'JM'=>'Jamaica',
	 'JP'=>'Japón',
	 'JO'=>'Jordania',
	 'QA'=>'Katar',
	 'KZ'=>'Kazajistán',
	 'KE'=>'Kenia',
	 'KG'=>'Kirguizistán',
	 'KI'=>'Kiribati',
	 'KW'=>'Kuwait',
	 'LB'=>'Líbano',
	 'LA'=>'Laos, República Popular',
	 'LS'=>'Lesoto',
	 'LV'=>'Letonia',
	 'LR'=>'Liberia',
	 'LY'=>'Libia',
	 'LI'=>'Liechtenstein',
	 'LT'=>'Lituania',
	 'LU'=>'Luxemburgo',
	 'MX'=>'México',
	 'MC'=>'Mónaco',
	 'MO'=>'Macao',
	 'MK'=>'Macedonia',
	 'MG'=>'Madagascar',
	 'MY'=>'Malasia',
	 'MW'=>'Malaui',
	 'MV'=>'Maldivas',
	 'ML'=>'Mali',
	 'MT'=>'Malta',
	 'MA'=>'Marruecos',
	 'MQ'=>'Martinica',
	 'MU'=>'Mauricio',
	 'MR'=>'Mauritania',
	 'YT'=>'Mayotte',
	 'FM'=>'Micronesia',
	 'MD'=>'Moldova',
	 'MN'=>'Mongolia',
	 'MS'=>'Montserrat',
	 'MZ'=>'Mozambique',
	 'MM'=>'Myanmar',
	 'NE'=>'Níger',
	 'NA'=>'Namibia',
	 'NR'=>'Nauru',
	 'NP'=>'Nepal',
	 'NI'=>'Nicaragua',
	 'NG'=>'Nigeria',
	 'NU'=>'Niue',
	 'NO'=>'Noruega',
	 'NC'=>'Nueva Caledonia',
	 'NZ'=>'Nueva Zelanda',
	 'OM'=>'Omán',
	 'NL'=>'Países Bajos',
	 'PK'=>'Pakistán',
	 'PW'=>'Palau',
	 'PA'=>'Panamá',
	 'PG'=>'Papua Nueva Guinea',
	 'PY'=>'Paraguay',
	 'PE'=>'Perú',
	 'PN'=>'Pitcairn',
	 'PF'=>'Polinesia Francesa',
	 'PL'=>'Polonia',
	 'PT'=>'Portugal',
	 'PR'=>'Puerto Rico',
	 'GB'=>'Reino Unido',
	 'SY'=>'República Árabe de Siria',
	 'CF'=>'República Centroafricana',
	 'CZ'=>'República Checa',
	 'DO'=>'República Dominicana',
	 'RE'=>'Reunión',
	 'RW'=>'Ruanda',
	 'RO'=>'Rumanía',
	 'EH'=>'Sahara Occidental',
	 'WS'=>'Samoa',
	 'AS'=>'Samoa Americana',
	 'KN'=>'San Cristóbal y Nevis',
	 'SM'=>'San Marino',
	 'VC'=>'San Vicente y las Granadinas',
	 'SH'=>'Santa Elena',
	 'LC'=>'Santa Lucía',
	 'ST'=>'Santo Tomé y Príncipe',
	 'SN'=>'Senegal',
	 'yu'=>'Serbia y Montenegro',
	 'SC'=>'Seychelles',
	 'SL'=>'Sierra Leona',
	 'SG'=>'Singapur',
	 'SO'=>'Somalía',
	 'LK'=>'Sri Lanka',
	 'PM'=>'St Pierre y Miquelon',
	 'SZ'=>'Suazilandia',
	 'ZA'=>'Sudáfrica',
	 'SD'=>'Sudán',
	 'SE'=>'Suecia',
	 'CH'=>'Suiza',
	 'SR'=>'Surinam',
	 'TN'=>'Túnez',
	 'TH'=>'Tailandia',
	 'TW'=>'Taiwan',
	 'TZ'=>'Tanzanía',
	 'TJ'=>'Tayiquistán',
	 'TF'=>'Territorios australes y antárticos franceses',
	 'IO'=>'Territorios Británicos del Océano Índico',
	 'TP'=>'Timor Oriental',
	 'TG'=>'Togo',
	 'TK'=>'Tokelau',
	 'TO'=>'Tonga',
	 'TT'=>'Trinidad y Tobago',
	 'TM'=>'Turkmenistán',
	 'TR'=>'Turquía',
	 'TV'=>'Tuvalu',
	 'UA'=>'Ucrania',
	 'UG'=>'Uganda',
	 'UY'=>'Uruguay',
	 'US'=>'USA',
	 'UZ'=>'Uzbekistán',
	 'VU'=>'Vanuatu',
	 'VE'=>'Venezuela',
	 'VN'=>'Vietnam',
	 'YE'=>'Yemen',
	 'ZR'=>'Zaire',
	 'ZM'=>'Zambia',
	 'ZW'=>'Zimbabue',
	 'ZZ'=>'Otros-No indicados'
      );


 $list = '';
 //if ($label!=null) $list .= $this->Form->label($label);

 $list .= $this->Form->input($camponombre, 
                             array('options' => $paises,
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
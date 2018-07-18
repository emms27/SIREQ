<?php

/**
 * Helper para mostrar un select list de todos los paises.
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @link http://www.pedroventura.com/blog_programacion/2009/10/08/cakephp-helper-para-crear-un-listado-de-paises/
 *
 */

class OcupacionesHelper extends AppHelper
{

 public $helpers = array('Form');

 function ComboOcupaciones($camponombre, $label=null, $default=null, $atributos=null)
 {

  $ocupacion = array(
                   'ABOGADO' => 'ABOGADO',
		   'ADMINISTRADOR DE EMPRESAS'=>'ADMINISTRADOR DE EMPRESAS',
		   'ADMINISTRADOR DE TAXIS'=>'ADMINISTRADOR DE TAXIS',
		   'ADMINISTRADOR o GESTOR'=>'ADMINISTRADOR o GESTOR',
		   'AGENTE DE VIAJES'=>'AGENTE DE VIAJES',
		   'AGRICULTOR'=>'AGRICULTOR',
                   'ALBAÑIL' => 'ALBAÑIL',
		   'GANADERO'=>'GANADERO',
		   'CAMPESINO'=>'CAMPESINO',
		   'PESCADOR'=>'PESCADOR',
                   'AMA DE CASA'=>'AMA DE CASA',
                   'ARQUITECTO'=>'ARQUITECTO',
                   'ARRENDADOR DE BIENES RAICES'=>'ARRENDADOR DE BIENES RAICES',
                   'ARTESANO'=>'ARTESANO',
                   'ASESOR'=>'ASESOR',
                   'AUDITOR'=>'AUDITOR', 
		   'BOMBERO'=>'BOMBERO',
                   'CAMPESINO'=>'CAMPESINO',
                   'CARNICERO'=>'CARNICERO',
		   'CARPINTERO'=>'CARPINTERO',
		   'CHEF'=>'CHEF',
		   'CHOFER'=>'CHOFER',
		   'CIRUJANO DENTISTA'=>'CIRUJANO DENTISTA',
		   'COCINERO(A)'=>'COCINERO(A)',
		   'COMERCIANTE O INDUSTRIAL'=>'COMERCIANTE O INDUSTRIAL',
		   'CONSULTOR JURIDO'=>'CONSULTOR JURIDO',
		   'CONTADOR PUBLICO'=>'CONTADOR PUBLICO',
		   'CONTRATISTA'=>'CONTRATISTA',
		   'COSTURERA'=>'COSTURERA',
		   'DENTISTA'=>'DENTISTA',
		   'DESEMPLEADO (A)'=>'DESEMPLEADO (A)',
		   'DOCTOR'=>'DOCTOR',
		   'ELECTRICISTA'=>'ELECTRICISTA',
		   'EMPLEADA DOMESTICA'=>'EMPLEADA DOMESTICA',
		   'EMPLEADO(A)'=>'EMPLEADO (A)',
		   'EMPRESARIO'=>'EMPRESARIO',
		   'ENFERMERA'=>'ENFERMERA',
		   'ESTILISTA'=>'ESTILISTA',
		   'ESTUDIANTE'=>'ESTUDIANTE',
		   'FOTOGRAFO'=>'FOTOGRAFO',
		   'GESTOR'=>'GESTOR',
		   'GINECOLOGO'=>'GINECOLOGO',
		   'GUARDIA DE SEGURIDAD'=>'GUARDIA DE SEGURIDAD',
		   'HERRERO'=>'HERRERO',
		   'HOJALATERO'=>'HOJALATERO',
		   'INGENIERO (A)'=>'INGENIERO (A)',
		   'INGENIERO CIVIL'=>'INGENIERO CIVIL',
		   'INGENIERO EN SISTEMAS'=>'INGENIERO EN SISTEMAS',
		   'INGENIERO INDUSTRIAL'=>'INGENIERO INDUSTRIAL',
		   'INGENIERO MECANICO'=>'INGENIERO MECANICO',
		   'INSTRUCTOR(A) DE AEROBICS'=>'INSTRUCTOR(A) DE AEROBICS',
		   'JARDINERO'=>'JARDINERO',
		   'LAVACOCHES'=>'LAVACOCHES',
		   'MAESTRO(A)'=>'MAESTRO(A)', 
		   'MECANICO AUTOMOTIRZ'=>'MECANICO AUTOMOTIRZ', 
		   'MEDICO'=>'MEDICO',
		   'MESERO'=>'MESERO', 
		   'MILITAR'=>'MILITAR', 
		   'MODISTA'=>'MODISTA', 
		   'OBRERO'=>'OBRERO', 
		   'PANADERO'=>'PANADERO', 
		   'PENSIONADO'=>'PENSIONADO', 
		   'PINTOR'=>'PINTOR', 
		   'PLOMERO'=>'PLOMERO', 
		   'POLICIA'=>'POLICIA', 
		   'POLICIA DE TRANSITO'=>'POLICIA DE TRANSITO',
		   'PROFESION U OFICIO POR SU CUENTA'=>'PROFESION U OFICIO POR SU CUENTA',
		   'PROFESOR INVESTIGADOR'=>'PROFESOR INVESTIGADOR', 
		   'PROFESOR O MAESTRO'=>'PROFESOR O MAESTRO',
		   'PROMOTOR(A) DE VENTAS'=>'PROMOTOR(A) DE VENTAS', 
		   'PSICOLOGA (0)'=>'PSICOLOGA (0)', 
		   'Q.F.B.'=>'Q.F.B.', 
		   'SECRETARIA'=>'SECRETARIA', 
		   'SERIGRAFISTA'=>'SERIGRAFISTA', 
		   'SERVIDIOR PUBLICO'=>'SERVIDIOR PUBLICO', 
		   'TAXISTA'=>'TAXISTA', 
		   'TECNICO'=>'TECNICO', 
		   'TRABAJADOR SOCIAL'=>'TRABAJADOR SOCIAL',
		   'TRANSPORTISTA'=>'TRANSPORTISTA', 
		   'VENDEDOR AMBULANTE'=>'VENDEDOR AMBULANTE',
		   'VETERINARIO'=>'VETERINARIO', 
		   'VIDRIERO'=>'VIDRIERO', 
		   'VIGILANTE'=>'VIGILANTE'
           );    
 
 $list = '';
 //if ($label!=null) $list .= $this->Form->label($label);

 $list .= $this->Form->input($camponombre, 
                             array('options' => $ocupacion,
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

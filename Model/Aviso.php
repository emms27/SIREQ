<?php
class Aviso extends AppModel {
 public $useTable = 'almacenavisos';
 public $name = 'Aviso';
 var $actsAs = array('Logable');


 public $belongsTo = array( 
  	'Role' => array( 
		'className'    => 'Role',
		'foreignKey'   => 'role_id'
	)
  );

 function beforeValidate(){ 
 }

 function beforeSave(){ 
   $modelo='Aviso';
   $campo='id';
   if ($this->data[$modelo][$campo]==NULL || $this->data[$modelo][$campo]==""){
    $this->data[$modelo]['fecha_registro']=date('Y-m-d h:i:s');
    $fecha=explode(' - ',$this->data['Aviso']['daterange']);
    $fecinicial=explode('/',$fecha[0]);
    $fecfinal=explode('/',$fecha[1]);
    $this->data[$modelo]['fecha_inicio']=$fecinicial[2].'-'.$fecinicial[0].'-'.$fecinicial[1];
    $this->data[$modelo]['fecha_fin']=$fecfinal[2].'-'.$fecfinal[0].'-'.$fecfinal[1];
   }
   return true;
 }

 public $validate = array(
	'aviso' => array(
	      'Vacio' => array(
		               'rule' => 'notEmpty',
		               'message' => 'Faltó el aviso'
			      )
	),
	'color' => array(
	      'Vacio' => array(
		               'rule' => 'notEmpty',
		               'message' => 'Faltó el color'
			      )
	),
         'daterange' => array(
		 'Vacio' => array(
                        'rule' => 'notEmpty',
			'message' => 'Faltó la fecha de inicio'
		                     ),
/*
		 'dateformat' => array(            
                       'rule'       => 'date', //date('Y-m-d h:i:s', strtotime('-1 year'));
        	       'message'    => 'Fecha incorrecta. formato YYYY-MM-DD.'
                                          )
            */                     
          )
    );
	
	
}

?>

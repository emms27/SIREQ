<?php
class Versione extends AppModel {
 public $useTable = 'ddfmversiones';
 public $name = 'Version';

 function beforeValidate(){ 
 }

 function beforeSave(){ 
  $modelo='Versione';
  $campo='id';
  $campo2='fecha_registro';
  if (($fcopia[$modelo][$campo]==NULL) || ($fcopia[$modelo][$campo]=="") || ($fcopia[$modelo][$campo]=="0000-00-00")) 
	$this->data[$modelo][$campo2]= date('Y-m-d h:i:s');
 }

 public $validate = array(  
 	'title' => array(
	      'Vacio' => array(
		               'rule' => 'notEmpty',
		               'message' => 'Faltó un título'
			      )
	),   
	'descripcion' => array(
	      'Vacio' => array(
		               'rule' => 'notEmpty',
		               'message' => 'Faltó la descripcion'
			      )
	),
        'version' => array(
		 'Vacio' => array(
                        'rule' => 'notEmpty',
			'message' => 'Faltó la version del sistema'
		 )                                 
        )
    );
	
	
}

?>

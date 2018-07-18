<?php
class Message extends AppModel {
 public $useTable = 'almacenmensajes';
 public $name = 'Correo';
 public $actsAs = array('Logable');

 public $belongsTo = array(
	'User' => array(
		  'className'    => 'User',
		  'foreignKey'   => 'almacenuser_id',
 	),
	'Contacto' => array(
		  'className'    => 'Contacto',
		  'foreignKey'   => 'almacenuser2_id',
 	)
 );

 function beforeSave(){
  $modelo='Message';
  $campo='id';

  if ($this->data[$modelo][$campo]==NULL || $this->data[$modelo][$campo]=="") {
   $this->data[$modelo]['fecha_registro']=date('Y-m-d h:i:s');
  }
 }

 public $validate = array(
           'almacenuser_id' => array(
		  'rule' => 'notEmpty',
  		  'message' => 'Faltó el destinatario'
	    ),
           'asunto' => array(
		  'rule' => 'notEmpty',
  		  'message' => 'Faltó el asunto'
	    ),
           'mensaje' => array(
		  'rule' => 'notEmpty',
  		  'message' => 'Faltó el mensaje'
	    )
 );


}
?>

<?php
class Contacto extends AppModel {
 public $useTable = 'almacenusers';

 public $belongsTo = array(
   	'Personal' => array(
        	'className'    => 'Personal',
		      'foreignKey'    => 'htsjpemployee_id',
          'dependent' => true
        )
 );
 public $hasMany = array(
   	'Message' => array(
		    'className'    => 'Message',
		    'foreignKey'   => 'almacenuser2_id'
	   )
 );



}

?>

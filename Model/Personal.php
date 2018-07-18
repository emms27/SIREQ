<?php
class Personal extends AppModel {
 var $useDbConfig = 'seconddb';
 public $useTable = 'htsjpemployees';
 public $virtualFields = array('namefull' => 'CONCAT(Personal.nombre, " ",Personal.apepat, " ",Personal.apemat)');
 public $displayField = 'namefull';
 var $actsAs = array('Logable');


 public $belongsTo = array(
 	 'Assignment' => array(
		   'className'    => 'Assignment',
		   'foreignKey'   => 'htsjpassignment_id'
    ),
    'Role' => array(
        	'className'    => 'Role',
		      'foreignKey'   => 'sireqrole_id'
    )
 );

 public $hasOne = array(
   	'User' => array(
		'className'    => 'User',
		'foreignKey'   => 'htsjpemployee_id'
	)
 );

 public $hasMany = array(
    'Requisition' => array(
       	'className'     => 'Requisition',
       	'foreignKey'    => 'htsjpemployee_id'
    )
  );

/*
 public $hasMany = array(
 	 'AssignmentPersonal' => array(
		   'className'    => 'AssignmentPersonal',
		   'foreignKey'   => 'htsjpemployee_id'
         )
 );
*/
}

?>

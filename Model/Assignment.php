<?php
class Assignment extends AppModel {
 var $useDbConfig = 'seconddb';
 public $useTable = 'htsjpassignments';
 public $displayField = 'descripcion';

 public $belongsTo = array(
  	'Location' => array(
		'className'    => 'Location',
		'foreignKey'   => 'htsjplocation_id'
         )
  );

 public $hasOne = array(
  	'Personal' => array(
		'className'    => 'Personal',
		'foreignKey'   => 'htsjpassignment_id'
         )
 );

 public $hasMany = array(
 // 	 'AssignmentPersonal' => array(
	// 	   'className'    => 'AssignmentPersonal',
	// 	   'foreignKey'   => 'htsjpassigment_id'
  //        )
  /*,
   	 'User' => array(
        	'className'    => 'User',
		'foreignKey'    => 'htsjpassignment_id'
         )*/
 );




}

?>

<?php
class Estado extends AppModel {

  public $name = 'htsjpestados';

  public $hasMany = array(
  	'Involucrado' => array( 
		'className'    => 'Involucrado',
		'foreignKey'   => 'htsjpestado_id'
	)
  );


}

?>

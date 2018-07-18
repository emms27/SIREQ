<?php
class Log extends AppModel {
  public $useTable = 'almacenlogs';
  var $order = 'created DESC';

  public $belongsTo = array(
  	'User' => array( 
		 'className'    => 'User',
		 'foreignKey'   => 'almacenuser_id'
        )
  );
}
?>

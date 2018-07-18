<?php
class Location extends AppModel {
 var $useDbConfig = 'seconddb'; 
 public $useTable = 'htsjplocations';

 public $hasOne = array(        
  	'Assignment' => array(            
		'className'    => 'Assignment',
		'foreignKey'   => 'htsjplocation_id'
         )
  ); 

}
?>

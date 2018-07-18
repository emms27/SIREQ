<?php
class Categoria extends AppModel {
 public $name = 'almacencategorias';
 public $displayField = 'descripcion';

  public $hasMany = array(
  	'Product' => array( 
        	'className'    => 'Product',      
				  'foreignKey'   => 'almacencategoria_id'
	)
  );

 function beforeSave(){ 
  $modelo='Categoria';
  $campo='id';

  if ($this->data[$modelo][$campo]==NULL || $this->data[$modelo][$campo]=="") {
   $this->data[$modelo]['fecha_registro']=date('Y-m-d h:i:s');
  }
 }
  	
 public $validate = array(		
           'descripcion' => array(
		  'rule' => 'notEmpty',
  		  'message' => 'Faltó la categoría'
	    )        	
 );


}


?>

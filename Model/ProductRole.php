<?php
class ProductRole extends AppModel {
 public $name = 'almacenproducts_roles';

  public $belongsTo = array(
  	'Product' => array(
        	  'className'    => 'Product',
		        'foreignKey'   => 'almacenproduct_id'
	  ),
  	'Role' => array(
        	  'className'    => 'Role',
		        'foreignKey'   => 'role_id'
	  ),
  	// 'AssignmentPersonal' => array(
    //     	'className'    => 'AssignmentPersonal',
		//       'foreignKey'   => 'htsjpassignmentemployee_id'
	  //      )
  );

 function beforeSave(){
  $modelo='ProductRole';
  $campo='id';
  if ($this->data[$modelo][$campo]==NULL || $this->data[$modelo][$campo]=="") {
   $this->data[$modelo]['fecha_registro']=date('Y-m-d h:i:s');
  }
 }



 function Duplicates($data, $limit){
   $aproduct = array_pop(array_values($data));
   $roleid=$this->data['ProductRole']['role_id'];
   $cproductrole = $this->find('count',
                             array('conditions'=> array('role_id'=>$roleid,'almacenproduct_id'=>$aproduct),
                                   'recursive' => -1));
   return $cproductrole == $limit;
  }

 public $validate = array(
        'almacenproduct_id' => array(
 		  'Vacio' => array(
                        'rule' => 'notEmpty',
			'message' => 'Faltó el Producto'
		   ),
	'Match' => array(
        	        'rule' => array('Duplicates',0),
			'message' => 'Ya existe el producto en el role'
		)
        ),
	'role_id' => array(
	      	'Vacio' => array(
          		'rule' => 'notEmpty',
	  		'message' => 'Faltó el Role'
	        )
	)

    );


}
?>

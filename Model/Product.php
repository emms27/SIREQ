<?php
class Product extends AppModel {
 public $name = 'almacenproducts';
 public $displayField = 'descripcion';


 public $actsAs = array(
 	'Logable',
        'MeioUpload' => array('filename'=>array(
            //'dir' => 'files/images',
            //'dir' => 'files{DS}uploads',
            //'create_directory' => false,
   	    //'uploadName' => '{ModelName}', // Can also be the tokens {ModelName} or {fieldName}
            //'allowedMime' => array('application/pdf', 'application/ msword', 'application/vnd.ms-powerpoint', 'application/vnd.ms-excel',
	    //			     'application/rtf', 'application/zip'),
            //'allowedExt' => array('.pdf', '.doc', '.ppt', '.xls','.rtf', '.zip'),
            //'default' => false,
  	    'allowedMime' => array('image/jpeg', 'image/pjpeg'),
	    'allowedExt' => array('.jpg', '.jpeg')))
/*
            'thumbsizes' => array(
                   'small'  => array('width'=>100, 'height'=>100),
                   'medium' => array('width'=>220, 'height'=>220),
                   'large'  => array('width'=>800, 'height'=>600)
            )))
*/
 );

  public $belongsTo = array(
  	'Categoria' => array(
        	'className'    => 'Categoria',
				  'foreignKey'   => 'almacencategoria_id'
	  )
  );

  public $hasMany = array(
    	'ProductRole' => array(
 		     'className'     => 'ProductRole',
 		     'foreignKey'    => 'almacenproduct_id'
 	    ),
      'ProductRequisition' => array(
 		     'className'     => 'ProductRequisition',
 		     'foreignKey'    => 'almacenproduct_id'
 	    )
   );



  // public $hasAndBelongsToMany = array(
  //   'ProductRequisition' => array(
  //     'className' => 'ProductRequisition',
  //     'joinTable' => 'almacenproducts_almacenrequisitions',
  //     'foreignKey' => 'almacenstock_id',
  //     'associationForeignKey' => 'almacenrequisition_id',
  //     'unique' => 'keepExisting',
  //     'conditions' => '',
  //     'fields' => '',
  //     'order' => '',
  //     'limit' => '',
  //     'offset' => '',
  //     'finderQuery' => '',
  //   )
  // );

 public $validate = array(
	'almacencategoria_id' => array(
          'rule' => 'notEmpty',
		      'message' => 'Faltó la categoría'
	),
	'clave' => array(
        'Vacio' => array(
          		'rule' => 'notEmpty',
	  		      'message' => 'Faltó el año.'
	        ),
        'pk_clave' => array(
          	  'rule' => array('DuplicatesClave',0),
              'message' => 'La clave ya existe'
        ),
	      'numerico' => array(
			       'rule' => 'numeric',
			       'message' => 'La clave debe ser numerico'
        ),
	      'minLenght-' => array(
			       'rule'    => array('minLength', 1),
		         'message' => 'La clave debe tener minimo 1 dígito'
		    ),
	      'maxLenght-' => array(
			       'rule'    => array('maxLength', 6),
		         'message' => 'La clave debe tener máximo 6 dígitos'
		)
	),
	'descripcion' => array(
            	'rule' => 'notEmpty',
		'message' => 'Faltó la descripción'
	)
    );

   function DuplicatesClave($data, $limit){
     $action=Router::getParams();
     if ($action['action']=="edit"){
       $existe2=$this->findById($this->data['Product']['id']);
       if ($existe2['Product']['clave']==array_pop(array_values($data))){
         return true;
       }
     }
     $existe = $this->find('count',array('conditions'=> array('Product.clave' => $data['clave']),'recursive' => -1));
     return $limit == $existe;
   }

}
?>

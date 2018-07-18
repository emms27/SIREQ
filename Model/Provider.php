<?php
class Provider extends AppModel {
 public $name = 'almacenproviders';
 public $displayField = 'razon_social';


 public $actsAs = array(
 // 	'Logable',
  //       'MeioUpload' => array('filename'=>array(
  //           //'dir' => 'files/images',
  //           //'dir' => 'files{DS}uploads',
  //           //'create_directory' => false,
  //  	    //'uploadName' => '{ModelName}', // Can also be the tokens {ModelName} or {fieldName}
  //           //'allowedMime' => array('application/pdf', 'application/ msword', 'application/vnd.ms-powerpoint', 'application/vnd.ms-excel',
	//     //			     'application/rtf', 'application/zip'),
  //           //'allowedExt' => array('.pdf', '.doc', '.ppt', '.xls','.rtf', '.zip'),
  //           //'default' => false,
  // 	    'allowedMime' => array('image/jpeg', 'image/pjpeg'),
	//     'allowedExt' => array('.jpg', '.jpeg')))
/*
            'thumbsizes' => array(
                   'small'  => array('width'=>100, 'height'=>100),
                   'medium' => array('width'=>220, 'height'=>220),
                   'large'  => array('width'=>800, 'height'=>600)
            )))
*/
 );

 public $hasMany = array(        
    'Invoice' => array(            
    'className'     => 'Invoice',
    'foreignKey'    => 'almacenprovider_id'     
  )
  ); 

  // public $belongsTo = array(
  // 	'Categoria' => array(
  //       	'className'    => 'Categoria',
	// 			  'foreignKey'   => 'almacencategoria_id'
	// )
  // );

 public $validate = array(
  	'razon_social' => array(
          'rule' => 'notEmpty',
  		    'message' => 'Faltó la razon social'
  	),
    'domicilio' => array(
          'rule' => 'notEmpty',
  		    'message' => 'Faltó la domicilio'
  	),
    'notas' => array(
          'rule' => 'notEmpty',
  		    'message' => 'Faltó la descripción'
  	),
 );


}
?>

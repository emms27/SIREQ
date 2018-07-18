<?php
App::uses('AppModel', 'Model');
/**
 * Almaceninvoice Model
 *
 * @property Products $Products
 * @property Provider $Provider
 */
class Invoice extends AppModel {
	public $useTable = 'almaceninvoices';
	public $actsAs = array('Logable');
	public $displayField = 'folio';

	function beforeSave(){
   $modelo='Invoice';
   $campo='id';
 	if (isset($this->data[$modelo][$campo])){
 	  if ($this->data[$modelo][$campo]==NULL || $this->data[$modelo][$campo]==""){
 	     $this->data[$modelo]['fecha_registro']=date('Y-m-d h:i:s');
 	   }
 	}
  //  	if ((!isset($this->data[$modelo]['cantidad_autorizada'])) || ($this->data[$modelo]['cantidad_autorizada']==NULL))
 	//    $this->data[$modelo]['cantidad_autorizada']=$this->data[$modelo]['cantidad'];
 	return true;
   }


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Provider' => array(
			'className' => 'Provider',
			'foreignKey' => 'almacenprovider_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
	   	'InvoiceProduct' => array(
			'className' => 'InvoiceProduct',
			'foreignKey' => 'almaceninvoice_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
  	);


		function limitFolio($data, $limit){
		 if (isset($this->data['Invoice']['folio'])){
			 $dato = array_pop(array_values($data));
			 $existe = $this->find('count',
					 array('conditions'=> array(
						 					'folio' => $dato,
					 						'almacenprovider_id'=>$this->data['Invoice']['almacenprovider_id']
								 ),
					 			 'recursive' => -1
					));
			 return $limit == $existe;
		 }
		 return true;
		}


	public $validate = array(
		'folio' => array(
		 		'Vacio' => array(
		             	'rule' => 'notEmpty',
		 							'message' => 'Faltó el folio'
		 		),
				'fk_duplicate' => array(
	 		  		'rule' => array('limitFolio',0),
	 		  		'message' => 'Este Folio ya fue agregado'
	      )
    ),

  	'almacenprovider_id' => array(
		 		'Vacio' => array(
		             	'rule' => 'notEmpty',
		 							'message' => 'Faltó el proveedor'
		 		)
    ),
		'notas' => array(
		 		'Vacio' => array(
		             	'rule' => 'notEmpty',
		 							'message' => 'Faltó las notas'
		 		)
    )
  );



}

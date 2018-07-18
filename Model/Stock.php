<?php
App::uses('AppModel', 'Model');
/**
 * Almacenstock Model
 *
 * @property Product $Product
 * @property Invoice $Invoice
 * @property Requisition $Requisition
 */
class Stock extends AppModel {
	public $useTable = 'almacenstocks';
	public $actsAs = array('Logable');
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'almacenproduct_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Invoice' => array(
			'className' => 'Invoice',
			'foreignKey' => 'almaceninvoice_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Requisition' => array(
			'className' => 'Requisition',
			'joinTable' => 'almacenrequisitions_almacenstocks',
			'foreignKey' => 'almacenstock_id',
			'associationForeignKey' => 'almacenrequisition_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);


	public $validate = array(
		'almaceninvoice_id' => array(
		 		'Vacio' => array(
		             	'rule' => 'notEmpty',
		 							'message' => 'Faltó el folio de la factura'
		 		)
    ),

  	'almacenproduct_id' => array(
		 		'Vacio' => array(
		             	'rule' => 'notEmpty',
		 							'message' => 'Faltó el producto'
		 		)
    ),
		'cantidad' => array(
		 		'Vacio' => array(
		             	'rule' => 'notEmpty',
		 							'message' => 'Faltó la cantidad'
		 		)
    ),
		'umetrica' => array(
		 		'Vacio' => array(
		             	'rule' => 'notEmpty',
		 							'message' => 'Faltó la unidad metrica'
		 		)
    )
  );

}

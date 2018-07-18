<?php
class InvoiceProduct extends AppModel {
 public $useTable = 'almaceninvoices_almacenproducts';
 public $actsAs = array('Logable');

 public $belongsTo = array(
 	 'Product' => array(
		   'className'    => 'Product',
		   'foreignKey'   => 'almacenproduct_id'
         ),
	 'Invoice' => array(
		  'className'    => 'Invoice',
		  'foreignKey'   => 'almaceninvoice_id'
          )
 );



 function beforeSave(){
  $modelo='InvoiceProduct';
  $campo='id';
  $campo2='arequisition_id';
	// if (isset($this->data[$modelo][$campo2])){
	//   if ($this->data[$modelo][$campo2]!=NULL || $this->data[$modelo][$campo2]!=""){
	//      $this->data[$modelo]['almacenrequisition_id']=$this->data[$modelo][$campo2];
	//    }
	// }

 //  	if ((!isset($this->data[$modelo]['cantidad_autorizada'])) || ($this->data[$modelo]['cantidad_autorizada']==NULL))
	//    $this->data[$modelo]['cantidad_autorizada']=$this->data[$modelo]['cantidad'];

	$this->data[$modelo]['fecha_registro']=date('Y-m-d h:i:s');
	return true;
  }

 function limitProduct($data, $limit){
  if (isset($this->data['InvoiceProduct']['almaceninvoice_id'])){
   $dato = array_pop(array_values($data));
    // debug($this->data);
    $existe = $this->find('count',
			  array('conditions'=> array(
          'almacenproduct_id' => $dato,
				  'almaceninvoice_id'=>$this->data['InvoiceProduct']['almaceninvoice_id']),
			  	'recursive' => -1));
    return $limit == $existe;
    // return false;
  }
  return true;
 }

 function limitNoRequisition($data, $limit){
   $dato = array_pop(array_values($data));
    $existe = $this->find('count',
			  array('conditions'=> array(
		'almacenrequisition_id'=>$dato),
			  	'recursive' => -1));
    return $limit < $existe;
 }

 function StatusRequisition($data, $limit){
   $dato = array_pop(array_values($data));
   $existe = $this->Requisition->find('first',array('conditions'=> array('id'=>$dato),'recursive' => -1));
   if ($existe['Requisition']['status']!="En proceso") return false;
   else return true;
 }

 public $validate = array(
   'almacenproduct_id' => array(
 		  'Vacio' => array(
               'rule' => 'notEmpty',
			         'message' => 'Faltó el Producto'
		   ),
       'fk_duplicate' => array(
           'rule' => array('limitProduct',0),
           'message' => 'Este Producto ya fue agregado'
       )
    ),
  'almaceninvoice_id' => array(
       'Vacio' => array(
                'rule' => 'notEmpty',
                'message' => 'Faltó el Producto'
        )
  ),
	'fcantidad' => array(
	      	'Vacio' => array(
          		'rule' => 'notEmpty',
	  		'message' => 'Faltó la cantidad'
	        ),
	        'MayorQue' => array(
	        	'rule' => array('comparison','>', -1),
                	'message' => 'La cantidad no puede ser menor a 0',
			      'allowEmpty' => true
	 	),
		'numerico' => array(
			'rule' => 'numeric',
			'message' => 'La cantidad debe ser numerica'
		)
         ),
	 'fmetrica' => array(
		      	'Vacio' => array(
	          		'rule' => 'notEmpty',
		  		      'message' => 'Faltó la unidad metrica'
		         )
   ),
   'fprecio' => array(
  	      	'Vacio' => array(
   	          		'rule' => 'notEmpty',
         		  		'message' => 'Faltó el precio'
   ),
      // k_requisition' => array(
			// 	'rule' => array('limitNoRequisition',0),
			// 	'message' => 'Esta Requisición no existe'
      //            	),
      // autorizada' => array(
			// 	'rule' => array('StatusRequisition',0),
			// 	'message' => 'Esta Requisición ya fue autorizada o entregada'
      //            	)
	 )

    );


}
?>

<?php
class ProductRequisition extends AppModel {
 public $useTable = 'almacenproducts_almacenrequisitions';
 public $actsAs = array('Logable');

 public $belongsTo = array(
 	 'Product' => array(
		   'className'    => 'Product',
		   'foreignKey'   => 'almacenproduct_id'
         ),
	 'Requisition' => array(
		  'className'    => 'Requisition',
		  'foreignKey'   => 'almacenrequisition_id'
          )
 );

 function beforeSave(){
  $modelo='ProductRequisition';
  $campo='id';
  $campo2='arequisition_id';
  if (isset($this->data[$modelo][$campo2])){
   if ($this->data[$modelo][$campo2]!=NULL || $this->data[$modelo][$campo2]!=""){
     $this->data[$modelo]['almacenrequisition_id']=$this->data[$modelo][$campo2];
   }
  }
  if ((!isset($this->data[$modelo]['cantidad_autorizada'])) || ($this->data[$modelo]['cantidad_autorizada']==NULL))
    $action=Router::getParams();
    if ($action['action']!="status")
      $this->data[$modelo]['cantidad_autorizada']=$this->data[$modelo]['cantidad'];
   $this->data[$modelo]['fecha_registro']=date('Y-m-d h:i:s');
  return true;
 }

 function limitProduct($data, $limit){
  if (isset($this->data['ProductRequisition']['arequisition_id'])){
   $dato = array_pop(array_values($data));
    $existe = $this->find('count',
			  array('conditions'=> array('almacenproduct_id' => $dato,
				'almacenrequisition_id'=>$this->data['ProductRequisition']['arequisition_id']),
			  	'recursive' => -1));
    return $limit == $existe;
  }
  return true;
 }

 function MaxCantidad($data, $limit){
    $rproducto_id=$this->data['ProductRequisition']['almacenproduct_id'];
    $rcantidad=$this->data['ProductRequisition']['cantidad'];
    $this->Product->recursive=-1;
    $recovery=$this->Product->findById($rproducto_id);
    return $recovery['Product']['ucantidad']>=$rcantidad;
 }

 function MaxCantidadAutorizada($data, $limit){
    $rproducto_id=$this->data['ProductRequisition']['almacenproduct_id'];
    $rcantidad=$this->data['ProductRequisition']['cantidad'];
    $this->Product->recursive=-1;
    $recovery=$this->Product->findById($rproducto_id);
    return $recovery['Product']['ucantidad']>=$rcantidad;
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
	'cantidad' => array(
	    // 'Vacio' => array(
      //     		'rule' => 'notEmpty',
	  	// 	      'message' => 'Faltó la cantidad'
	    // ),
      // 'numerico' => array(
			//         'rule' => 'numeric',
			//         'message' => 'La cantidad debe ser numerica',
      //
		  // ),
	    'MayorQue' => array(
	        	  'rule' => array('comparison','>', 0),
              'message' => 'La cantidad no puede ser menor a 1',
              'allowEmpty' => true
      ),
      'limit_max' => array(
 			        'rule' => array('MaxCantidad',0),
 			        'message' => 'No tiene Disponible esta cantidad'
       )
   ),
   'cantidad_autorizada' => array(
 	    'Vacio' => array(
           		'rule' => 'notEmpty',
 	  		      'message' => 'Faltó la cantidad'
 	    ),
       'numerico' => array(
 			        'rule' => 'numeric',
 			        'message' => 'La cantidad debe ser numerica'
 		  ),
 	    'MayorQue' => array(
 	        	  'rule' => array('comparison','>', 0),
               'message' => 'La cantidad no puede ser menor a 1',
 			        'allowEmpty' => true
 	 	  ),
       'limit_max' => array(
  			        'rule' => array('MaxCantidadAutorizada',0),
  			        'message' => 'No tiene Disponible esta cantidad'
        )
    ),
	 'arequisition_id' => array(
		      	'Vacio' => array(
	          		'rule' => 'notEmpty',
		  		'message' => 'Faltó la requisición'
		        ),
		 	'fk_requisition' => array(
				'rule' => array('limitNoRequisition',0),
				'message' => 'Esta Requisición no existe'
                 	),
		 	'rautorizada' => array(
				'rule' => array('StatusRequisition',0),
				'message' => 'Esta Requisición ya fue autorizada o entregada'
                 	)
	 )

    );


}
?>

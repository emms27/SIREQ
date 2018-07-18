<?php
class Requisition extends AppModel {
 public $useTable = 'almacenrequisitions';
 public $actsAs = array('Logable');

 public $belongsTo = array(
 'Personal' => array(
 	'className'    => 'Personal',
 	'foreignKey'   => 'htsjpemployee_id'
         )
  );

 public $hasMany = array(
   	'ProductRequisition' => array(
		'className'     => 'ProductRequisition',
		'foreignKey'    => 'almacenrequisition_id'
	  )
  );

  function beforeSave(){
   $modelo='Requisition';
   $campo='id';
   $year=date('Y');
   if ($this->data[$modelo][$campo]==NULL || $this->data[$modelo][$campo]==""){
    $asig=$this->RellenarCeros($this->data[$modelo]['htsjpemployee_id']);
    $year.=$asig;
    $year.=$this->IDNew($modelo,$campo,$year);
    $this->data[$modelo][$campo]=$year;
    $this->data[$modelo]['fecha_registro']=date('Y-m-d h:i:s');
   }
   return true;
  }


 public $validate = array(
	'fecha_emitido' => array(
            'rule'       => 'date',
            'message'    => 'Seleccione una fecha.',
            'allowEmpty' => false
        ),
	'htsjpemployee_id' => array(
		 'Vacio' => array(
             'rule' => 'notEmpty',
			       'message' => 'Seleccione un Cliente'
		 )
	),
  'notas' => array(
		 'Vacio' => array(
        'rule' => 'notEmpty',
		    'message' => 'Faltó escribir una observación'
		 ),
	   'maxLenght-' => array(
		    'rule'    => array('maxLength', 200),
		    'message' => 'La descripcion debe tener máximo 200 dígitos'
		 )
  ),
	'statuss' => array(
	    'allowedChoice' => array(
		  'rule'    => array('inList', array('Cancelada',
        				           'Autorizada',
        				           'Entregada',
        				           'En proceso'
                                                  )
                                  ),
      'message' => 'Seleccione un estado.'
		)
	 ),
  'daterange' => array(
		 'Vacio' => array(
                        'rule' => 'notEmpty',
			'message' => 'Faltó selecionar el rango de fecha'
		 )
         )


    );


}

?>

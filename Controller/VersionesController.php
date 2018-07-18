<?php
 class VersionesController extends AppController {
  public $helpers = array('Html', 'Form','Javascript', 'Ajax');
  public $components = array('Session');


 function beforeFilter() {
  parent::beforeFilter();
  $this->Auth->allow();
 }

 public function edit($id = null) {
  $this->Versione->id = $id;
  $this->Versione->recursive = -1;
  $this->set('title_for_layout', 'Parte - Editar');
  if ($this->request->is('get')) $this->request->data = $this->Versione->read();
  else {
   if ($this->Versione->save($this->request->data)) {
     $this->Session->setFlash('El Versione "'.$id.'", se ha actualizado',"flash_add");
     $this->redirect(array('action' => 'index'));
   } else $this->Session->setFlash("Complete la informaci&oacute;n necesaria para actualizar el Versione", "flash_error");
  }
 }

 public function alta() {    
  if (!empty($this->data)) { 
   if ($this->Versione->save($this->data)) {
    $this->Session->setFlash('La version del sistema se actualizo');
    $this->redirect(array('action' => 'alta'));
   }else $this->Session->setFlash("Complete la informaci&oacute;n necesaria para agregar la version del sistema", "flash_error");
  }
  $this->set(compact('tipos'));
 }

 
 public function index() {
   $this->set('title_for_layout', 'Estado de Cuenta - Consulta');
   $FiltroCheque = array('
			Cheque.id,
		        Cheque.num_cheque,
		        Cheque.ddfmordenpago_id,
			Cheque.estado,
		        OrdenPago.importe,
			Cheque.fecha_registro,
			Cheque.fecha_expiracion,
			Cheque.fecha_entrega');

   $this->Versione->recursive = -1; 
   if ((isset($this->passedArgs['scheque'])) || (isset($this->data['Cheque']['scheque']))){
    if ((isset($this->passedArgs['scheque'])) && ($this->passedArgs['scheque']!=NULL))
     $palabra=$this->passedArgs['scheque'];
    else
     $palabra=$this->data['Cheque']['scheque'];

     $this->paginate = array('limit' => 50,
                             'page' =>1,
		             'order'  => array('Versione.fecha_registro' => 'desc'),
			     'conditions' => array('Versione.id LIKE' => '%'.$palabra.'%')
	                    );
   } else{
     $this->paginate = array('limit' => 50,
                             'page' =>1,
		             'order'  => array('Versione.fecha_registro' => 'desc')
	                    );
  }
  $cheque = $this->paginate('Versione');    
  if ($this->request->is('requested')) {return $cheque;} else { $this->set(compact('cheque')); }
 }






 }
?>

<?php
class ProductRequisitionsController extends AppController {
 public $helpers = array('Html', 'Form','Javascript', 'Ajax','EstadoCivil','Ocupaciones','Escolaridad','Dates');


 public function status($id = null) {
  $this->ProductRequisition->id = $id;
  $existe=$this->ProductRequisition->find('first',
					   array(
						 'recursive'=>0,
				  	         'conditions' => array('ProductRequisition.id'=>$id)
  ));
  if ($existe['Requisition']['status']=="En proceso"){
   if ($existe['ProductRequisition']['ver']==0) $ever=1; else $ever=0;
    if ($this->ProductRequisition->saveField('ver',$ever,array('validate' => 'only')))
     $this->Session->setFlash('Se ha modificado el status del producto "'.$existe['Product']['clave'].'"',"flash_add");
  }else     $this->Session->setFlash('No se puede cambiar el status del producto "'.$existe['Product']['clave'].'", verifique el status de la requisición "'.$existe['Requisition']['id'].'"',"flash_error");
  $this->redirect(array('controller'=>'Requisitions','action' => 'view',$existe['ProductRequisition']['almacenrequisition_id']));
 }

 public function upcantidad($id = null) {
  $this->ProductRequisition->id = $id;
  $this->ProductRequisition->unbindModel(array('belongsTo' => array('Product')));
  $existe=$this->ProductRequisition->find('first',
					   array(
						 'recursive'=>0,
				  	         'conditions' => array('ProductRequisition.id'=>$id)
  ));
  // debug($existe);
  if ($existe['Requisition']['status']=="En proceso"){
   $this->ProductRequisition->saveField('cantidad_autorizada',$this->data['Juzgado']['titular']);
   //  $this->redirect(array('controller'=>'Requisitions','action' => 'view',$existe['Requisition']['id']));
  }
 }


 public function add() {
  $this->set('title_for_layout', 'Producto - Requisición - Alta');
  if (!empty($this->data)):
   if ($this->ProductRequisition->save($this->data)) {
    $this->Session->setFlash('El producto "'.$this->data['ProductRequisition']['almacenproduct_id'].'" fue guardado correctamente en la requisición "'.$this->data['ProductRequisition']['arequisition_id'].'"', "flash_add");
    $this->redirect(array('controller'=>'Requisitions','action' => 'view',$this->data['ProductRequisition']['arequisition_id']));
   } else $this->Session->setFlash("Complete la informaci&oacute;n necesaria para agregar el producto.", "flash_error");
  endif;

  $almacenproducts = $this->ProductRequisition->Product->find('list',array('order' =>'id ASC','recursive' => -1));
  $this->set(compact('almacenproducts'));
 }




}
?>

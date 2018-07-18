<?php
class ProductsController extends AppController {
 public $helpers = array('Html', 'Form','Javascript', 'Ajax','EstadoCivil','Ocupaciones','Escolaridad','Dates');

 public function index() {
  $this->set('title_for_layout', 'Productos - Consulta');
  $this->Product->recursive = 1;
  $user = $this->Auth->user();
  if ((isset($this->passedArgs['sparte'])) || (isset($this->data['Product']['sparte']))){
   if ((isset($this->passedArgs['sparte'])) && ($this->passedArgs['sparte']!=NULL)) $palabra=$this->passedArgs['sparte'];
   else $palabra=$this->data['Product']['sparte'];

   $this->paginate = array('limit' => 50,
                             'page' =>1,
		             'order'  => array('Product.id' => 'asc'),
			     'conditions' => array(
					'OR'=>array('Product.descripcion LIKE '=> '%'.$palabra.'%',
						    'Product.clave LIKE '=> '%'.$palabra.'%')));
  }
   $parte = $this->paginate('Product');
   if ($this->request->is('requested')) {return $parte;} else { $this->set(compact('parte')); }
 }

 public function status($id = null) {
  $this->Product->id = $id;
  $this->Product->recursive=-1;
  $existe=$this->Product->findById($id);
  if ($existe['Product']['ver']==0) $ever=1; else $ever=0;
   $data = array('id' => $id, 'ver' => $ever);
   if ($this->Product->saveField('ver',$ever,array('validate' => 'only')))
    $this->Session->setFlash('Se ha modificado el status',"flash_add");
   $this->redirect(array('action' => 'index'));
 }

 public function add() {
  $this->set('title_for_layout', 'Producto - Alta');
  if (!empty($this->data)):
   if ($this->Product->save($this->data)) {
    $this->Session->setFlash('El producto '.$this->data['Product']['id'].' fue guardada correctamente.', "flash_add");
    $this->redirect(array('action' => 'index'));
   } else $this->Session->setFlash("Complete la informaci&oacute;n necesaria para registrar la parte.", "flash_error");
  endif;

  $almacencategorias = $this->Product->Categoria->find('list',
						  array('order' =>'Categoria.id ASC',
							'recursive' => -1
  ));
  $this->set(compact('almacencategorias'));
 }


 public function edit($id = null) {
  $this->Product->id = $id;
  $this->Product->recursive = -1;
  $product=$this->Product->findById($id);
  $user = $this->Auth->user();
  if ((!$this->Product->exists()) || (!$id)){
     $this->Session->setFlash('No se encontró el producto "'.$id.'" en el Sistema');
     $this->redirect(array('action'=>'index'), null, true);
  }else{
   if ($this->request->is('get')) $this->request->data = $product;
   else {
    if ($this->Product->saveAll($this->request->data, array('validate'=>'first'))) {
     $this->Session->setFlash('El producto "'.$product['Product']['clave'].'", se ha actualizado',"flash_add");
     $this->redirect(array('action' => 'index'));
    }else $this->Session->setFlash("Complete la informaci&oacute;n necesaria para actualizar el producto", "flash_error");
   }
   $almacencategorias = $this->Product->Categoria->find('list',
						  array('order' =>'Categoria.id ASC',
							'recursive' => -1
  ));
  $this->set(compact('almacencategorias'));
 }



 }

 public function upstock($id = null) {
  $this->Product->id = $id;
  // $this->InvoiceProduct->unbindModel(array('belongsTo' => array('Product')));
  // $existe=$this->InvoiceProduct->find('first',
 // 						array(
 // 						'recursive'=>0,
 // 						'conditions' => array('InvoiceProduct.id'=>$id)
  // ));
  // if ($existe['Requisitio']['status']=="En proceso")
 	$this->Product->saveField('ucantidad',$this->data['Emmanuel']['idstock']);
 }




}
?>

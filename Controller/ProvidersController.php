<?php
class ProvidersController extends AppController {
 public $helpers = array('Html', 'Form','Javascript', 'Ajax','EstadoCivil','Ocupaciones','Escolaridad','Dates');

 public function index() {
  $this->set('title_for_layout', 'Proveedores - Consulta');
  $this->Provider->recursive = 1;
  $user = $this->Auth->user();
  if ((isset($this->passedArgs['sparte'])) || (isset($this->data['Provider']['sparte']))){
   if ((isset($this->passedArgs['sparte'])) && ($this->passedArgs['sparte']!=NULL)) $palabra=$this->passedArgs['sparte'];
   else $palabra=$this->data['Provider']['sparte'];

   $this->paginate = array('limit' => 50,
                             'page' =>1,
		             'order'  => array('Provider.id' => 'asc'),
			     'conditions' => array(
					'OR'=>array('Provider.descripcion LIKE '=> '%'.$palabra.'%',
						    'Provider.clave LIKE '=> '%'.$palabra.'%')));
  }
   $parte = $this->paginate('Provider');
   if ($this->request->is('requested')) {return $parte;} else { $this->set(compact('parte')); }
 }

 public function status($id = null) {
  $this->Provider->id = $id;
  $this->Provider->recursive=-1;
  $existe=$this->Provider->findById($id);
  if ($existe['Provider']['ver']==0) $ever=1; else $ever=0;
   $data = array('id' => $id, 'ver' => $ever);
   if ($this->Provider->saveField('ver',$ever,array('validate' => 'only')))
    $this->Session->setFlash('Se ha modificado el status',"flash_add");
   $this->redirect(array('action' => 'index'));
 }

 public function add() {
  $this->set('title_for_layout', 'Providero - Alta');
  if (!empty($this->data)):
   if ($this->Provider->save($this->data)) {
    $this->Session->setFlash('El producto '.$this->data['Provider']['id'].' fue guardada correctamente.', "flash_add");
    $this->redirect(array('action' => 'index'));
  } else $this->Session->setFlash("Complete la informaci&oacute;n necesaria para registrar el proveedor.", "flash_error");
  endif;

  // $almacencategorias = $this->Provider->Categoria->find('list',
	// 					  array('order' =>'Categoria.id ASC',
	// 						'recursive' => -1
  // ));
  // $this->set(compact('almacencategorias'));
 }


 public function edit($id = null) {
  $this->Provider->id = $id;
  $this->Provider->recursive = -1;
  $product=$this->Provider->findById($id);
  $user = $this->Auth->user();
  if ((!$this->Provider->exists()) || (!$id)){
     $this->Session->setFlash('No se encontró el producto "'.$id.'" en el Sistema');
     $this->redirect(array('action'=>'index'), null, true);
  }else{
   if ($this->request->is('get')) $this->request->data = $product;
   else {
    if ($this->Provider->saveAll($this->request->data, array('validate'=>'first'))) {
     $this->Session->setFlash('El proveedor "'.$product['Provider']['razon_social'].'", se ha actualizado',"flash_add");
     $this->redirect(array('action' => 'index'));
   }else $this->Session->setFlash("Complete la informaci&oacute;n necesaria para actualizar el proveedor", "flash_error");
   }

 }



 }




}
?>

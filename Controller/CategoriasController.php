<?php
class CategoriasController extends AppController {
 public $helpers = array('Html', 'Form','Javascript', 'Ajax','EstadoCivil','Ocupaciones','Escolaridad','Dates');

 public function index() {
  $this->set('title_for_layout', 'Categoria - Consulta');
  $this->Categoria->recursive = 1; 
  $user = $this->Auth->user();
  if ((isset($this->passedArgs['sparte'])) || (isset($this->data['Categoria']['sparte']))){
   if ((isset($this->passedArgs['sparte'])) && ($this->passedArgs['sparte']!=NULL)) $palabra=$this->passedArgs['sparte'];
   else $palabra=$this->data['Categoria']['sparte'];

   $this->paginate = array('limit' => 50,
                             'page' =>1,
		             'order'  => array('Categoria.id' => 'asc'),
			     'conditions' => array('Categoria.descripcion LIKE '=> '%'.$palabra.'%'));
  }
   $parte = $this->paginate('Categoria');
   if ($this->request->is('requested')) {return $parte;} else { $this->set(compact('parte')); }
 }

 public function status($id = null) {
  $this->Categoria->id = $id;
  $this->Categoria->recursive=-1;
  $existe=$this->Categoria->findById($id);
  if ($existe['Categoria']['ver']==0) $ever=1; else $ever=0;
   $data = array('id' => $id, 'ver' => $ever);
   if ($this->Categoria->saveField('ver',$ever,array('validate' => 'only')))
    $this->Session->setFlash('Se ha modificadio el status',"flash_add");
   $this->redirect(array('action' => 'index'));
 }

 public function add() {
  $this->set('title_for_layout', 'Partes - Alta');
  if (!empty($this->data)):
   if ($this->Categoria->save($this->data)) {
    $this->Session->setFlash('La categoría '.$this->data['Categoria']['id'].' fue guardada correctamente.', "flash_add");
    $this->redirect(array('action' => 'index'));
   } else $this->Session->setFlash("Complete la informaci&oacute;n necesaria para registrar la categoría.", "flash_error");
  endif;
 }


	
}
?>

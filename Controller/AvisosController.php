<?php
 class AvisosController extends AppController {
  public $helpers = array('Html', 'Form','Javascript', 'Ajax');
  public $components = array('Session');

 public function add() {
   $this->set('title_for_layout', 'Avisos - Agregar');
  if (!empty($this->data)) {
   if ($this->Aviso->save($this->data)) {
    $this->Session->setFlash('El aviso fue guardado correctamente','flash_add');
    $this->redirect(array('action' => 'index'));
   }else $this->Session->setFlash("Complete la informaci&oacute;n necesaria para agregar el aviso.",'flash_error');
  }

  $roles=$this->Aviso->Role->find('list',array('recursive'=>-1,'order' =>'id ASC','fields'=>array('id','name')));


  $this->set(compact('roles'));
 }


 public function index() {
   Configure::write('debug',0);
   $user = $this->Auth->user();
   $this->set('title_for_layout', 'Avisos - Consulta');
   $this->Aviso->recursive = 0;
   if ((isset($this->passedArgs['scheque'])) || (isset($this->data['Aviso']['scheque']))){
    if ((isset($this->passedArgs['scheque'])) && ($this->passedArgs['scheque']!=NULL))
     $palabra=$this->passedArgs['scheque'];
    else $palabra=$this->data['Aviso']['scheque'];
     $this->paginate = array('limit' => 50,
                             'page' =>1,
		             'order'  => array('Aviso.fecha_registro' => 'desc'),
			     'conditions' => array('Aviso.aviso LIKE' => '%'.$palabra.'%'));
   }else{
     $this->paginate = array('limit' => 50,
                             'page' =>1,
		             'order'  => array('Aviso.fecha_registro' => 'desc'));
  }
  $row = $this->paginate('Aviso');
  if ($this->request->is('requested')){
   $row=$this->Aviso->find('all',
				   array('recursive'=>0,
		 	                 'order'  => array('Aviso.fecha_registro' => 'desc'),
		         	   	 'conditions' => array(
						 'Aviso.ver' => 1,
						 'OR' => array(
							array('Aviso.fecha_inicio >='=>date('Y-m-d')),
						        array('Aviso.fecha_fin >='=>date('Y-m-d'))),
					'AND'=> array(
 						array(
						 'OR' => array(
							array('Aviso.role_id' => $user['Role']['id']),
						        array('Aviso.role_id' => NULL)))))));
   return $row;
  }else $this->set(compact('row'));
 }


 public function status($id = null) {
  $this->Aviso->id = $id;
  $this->Aviso->recursive=-1;
  $existe=$this->Aviso->findById($id);
  if ($existe['Aviso']['ver']==0){$ever=1; $status="Activo";}else{ $ever=0; $status="Desactivo";}
   if ($this->Aviso->saveField('ver',$ever,array('validate' => 'only')))
    $this->Session->setFlash('Se ha modificadio el status',"flash_add");
   $this->redirect(array('action' => 'index'));
  }





 }
?>

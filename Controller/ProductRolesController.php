<?php
class ProductRolesController extends AppController {
 public $helpers = array('Html', 'Form','Javascript', 'Ajax','EstadoCivil','Ocupaciones','Escolaridad','Dates');

 public function add() {
  $this->set('title_for_layout', 'Producto - Alta');
  if (!empty($this->data)):
   if ($this->ProductRole->save($this->data)) {
    $this->Session->setFlash('Se agregó el producto "'.$this->data['ProductRole']['almacenproduct_id'].'" al role "'.$this->data['ProductRole']['role_id'].'" correctamente.', "flash_add");
    $this->redirect(array('action' => 'add'));
   } else $this->Session->setFlash("Complete la informaci&oacute;n necesaria para registrar el producto.", "flash_error");
  endif;

  $almacenproducts = $this->ProductRole->Product->find('list',
						  array('order' =>'id ASC',
							'recursive' => -1,
		         				'fields'=>array('id','descripcion','clave')
  ));

  $FiltroOpcion=array('AssignmentPersonal.id','Personal.nombre','Assignment.descripcion');
  $htsjpassignmentemployees= $this->ProductRole->AssignmentPersonal->find('list',
					   array(//'order'=> 'Assignment.Personal.id ASC',
						 'recursive'=>0,
					         'fields'=>$FiltroOpcion,
				  	         'conditions' => array('AssignmentPersonal.ver' => 1)
   ));

  $this->loadModel('Role');
  $roles = $this->Role->find('list',
						  array('order' =>'id ASC',
							'recursive' => -1
  ));
  $this->set(compact('almacenproducts','roles','htsjpassignmentemployees'));
 }

 public function index() {
  $this->set('title_for_layout', 'Productos - Consulta');
  $this->ProductRole->recursive = 1;
  $this->ProductRole->unbindModel(array('belongsTo' => array('AssignmentPersonal')));
  $user = $this->Auth->user();
  if ((isset($this->passedArgs['sparte'])) || (isset($this->data['ProductRole']['sparte']))){
   if ((isset($this->passedArgs['sparte'])) &&
       ($this->passedArgs['sparte']!=NULL)){
         $palabra=$this->passedArgs['sparte'];
         $prole=$this->passedArgs['sroles'];
       }else{
        $palabra=$this->data['ProductRole']['sparte'];
        $prole=$this->data['ProductRole']['sroles'];
       }

      $this->paginate = array('limit' => 50,
                           'page' =>1,
		           'order'  => array('ProductRole.id' => 'asc'),
			   'conditions' => array(
                'ProductRole.role_id'=> $prole,
					      'OR'=>array(
                  'Product.descripcion LIKE '=> '%'.$palabra.'%',
						      'Product.clave LIKE '=> '%'.$palabra.'%',
      )));
  }
   $row = $this->paginate('ProductRole');
  //  debug($row);

  //  $cat=$this->ProductRole->Product->Categoria->find('all',array(
  //    'recursive'=>-1,
  //    'conditions'=>array('ver'=>'1')
  //  ));

  $sroles=$this->ProductRole->Role->find('list',array(
     'recursive'=>-1,
     'order'=>array('name'=>'ASC'),
     'conditions'=>array('ver'=>'1'),
   ));
   if ($this->request->is('requested')) {return $row;} else { $this->set(compact('row','sroles')); }
 }

 public function status($id = null) {
  $this->ProductRole->id = $id;
  $this->ProductRole->recursive=-1;
  $existe=$this->ProductRole->findById($id);
  if ($existe['ProductRole']['ver']==0) $ever=1; else $ever=0;
   if ($this->ProductRole->saveField('ver',$ever,array('validate' => 'only')))
    $this->Session->setFlash('Se ha modificado el status',"flash_add");
   $this->redirect(array('action' => 'index'));
 }




}
?>

<?php
class UsersController extends AppController {
  public $helpers = array('Html', 'Form','Javascript', 'Ajax');

 function beforeFilter() {
  parent::beforeFilter();
  $this->Auth->allow('login','logout');
 }

 function login() {
  //  debug(AuthComponent::password(2795));
    // $user = $this->Auth->user();
    // debug($user);
   $this->layout = 'login';
   $this->set('title_for_layout', 'Iniciar Sesión');
   if ($this->request->is('post')) {
    if ($this->Auth->login()){
       $this->User->id = $this->Auth->user('id');
       $this->registrarActividad('se ha logueado');
       $this->User->saveField('fecha_update', date('Y-m-d H:i:s') );
       $this->Session->setFlash("Bienvenido!","flash_add");
       return $this->redirect($this->Auth->redirect());
    }
    else $this->Session->setFlash("Usuario o password incorrectos","admin/flash_error");
   }
 }

 function logout() {
   $this->registrarActividad('se fue del sistema');
   $this->Session->setFlash('Se terminó la sesión!',"admin/flash_bye");
   //$this->Session->setFlash('No hay espectáculo más terrible que la ignorancia en acción. -Johann W. Goethe');
   $this->redirect($this->Auth->logout());
 }

 public function index() {
  $this->set('title_for_layout', 'User - Consulta');
  if ((isset($this->passedArgs['suser'])) || (isset($this->data['User']['suser']))){
   if ((isset($this->passedArgs['suser'])) && ($this->passedArgs['suser']!=NULL)) $palabra=$this->passedArgs['suser'];
   else $palabra=$this->data['User']['suser'];

     $this->paginate = array('limit' => 50,
                            'page'  => 1,
			    'recursive'=>2,
		            'order' => array('User.id' => 'desc'),
 			    'conditions' => array('Personal.namefull LIKE '=> '%'.$palabra.'%'));

  }else{
    $this->paginate = array('limit' => 50,
                            'page'  => 1,
			    'recursive'=>2,
		            'order' => array('User.id' => 'desc'));

  }

  $this->User->unbindModel(array('hasMany' => array('Log','Message')));
  $this->User->Role->unbindModel(array('hasMany' => array('User')));
  $this->User->Personal->unbindModel(array('belongsTo' => array('Assignment')));
  $this->User->Personal->unbindModel(array('hasOne' => array('User')));
  // $this->User->AssignmentPersonal->unbindModel(array('hasOne' => array('User')));
  // $this->User->AssignmentPersonal->unbindModel(array('hasMany' => array('Requisition','ProductRole')));
  $user= $this->paginate('User');
  if ($this->request->is('requested')) {return $user;} else {$this->set(compact('user'));}
 }

 function view($id=null) {
  $this->User->id=$id;
  $user = $this->Auth->user();
  if ((($user['Role']['id']!=1) && ($id!=$user['id'])) || (!$id)){
   $this->Session->setFlash('No tiene permiso para visualizar al usuario "'.$id.'"');
   $this->redirect(array('action'=>'edit',$user['id']));
  }else{
   $this->set('title_for_layout', 'User - Consulta');
   $this->User->Personal->recursive=1;
   $this->User->Personal->unbindModel(array('hasOne' => array('User')));
   $personal=$this->User->Personal->findById($this->User->field('htsjpemployee_id'));
   $this->User->Personal->Assignment->Location->recursive=-1;
   $this->set(compact('personal'));

  }
 }

 public function add() {
  $this->set('title_for_layout', 'User - add');
  if (!empty($this->data)):
   if ($this->User->save($this->data)) {
    $this->Session->setFlash('La Parte '.$this->data['Parte']['id'].' fue guardado correctamente.', "flash_add");
    $this->redirect(array('action' => 'index'));
   } else $this->Session->setFlash("Complete la informaci&oacute;n necesaria para registrar la parte.", "flash_error");
  endif;
  // $this->User->Personal->unbindModel(array('hasOne' => array('User')));
  $FiltroOpcion=array('Personal.id','Personal.namefull','Assignment.descripcion');
  $htsjpemployees= $this->User->Personal->find('list',
						  array(//'order' =>'Assignment.id ASC',
							'recursive' => 0,
					         'fields'=>$FiltroOpcion,
				  	         'conditions' => array('Personal.ver' => 1)
   ));
  $roles = $this->User->Role->find('list',array('order' =>'Role.id ASC','recursive' =>-1));
  $this->set(compact('personal','htsjpemployees','roles'));
 }


 function permisos($id = null) {
  $this->User->id=$id;
  $user = $this->Auth->user();
  if ((!$id) || (!$this->User->exists())){
   $this->Session->setFlash('El Usuario "'.$id.'", no se encontró en el Sistema');
   $this->redirect(array('action'=>'index'));
  }
  $this->set('title_for_layout', 'User - Permisos');
  $this->User->recursive=0;
  $personal=$this->User->findById($id);
  if ($this->request->is('get')) {
   $this->User->recursive=-1;
   $this->request->data = $this->User->findById($id);
  } else {
   if ($this->User->save($this->request->data)) {
    $this->Session->setFlash('Se actualiz&oacute; el Usuario "'.$id.'"');
    $this->redirect(array('action' => 'index'));
   } else $this->Session->setFlash("Complete la informaci&oacute;n necesaria para actualizar el User", "flash_error");
  }



  $FiltroOpcion=array('Personal.id','Personal.nombre','Assignment.descripcion');
  $this->User->Personal->unbindModel(array('hasOne' => array('User')));
  $htsjpemployees = $this->User->Personal->find('list',
						  array('order' =>'Personal.id ASC',
							'recursive' => 0,
						        'fields'=>$FiltroOpcion,
    //                                                    'conditions'=>array('id'=>$user['htsjpjuzgado_id'])
   ));
  $roles = $this->User->Role->find('list',array('order' =>'Role.id ASC','recursive' =>-1));

  $this->set(compact('personal','htsjpassignmentemployees','roles'));

 }


 function edit($id = null) {
   $this->set('title_for_layout', 'User - Editar');
   $this->User->id = $id;
   $this->User->recursive=0;
   $personal=$this->User->findById($id);
   if ($this->request->is('get')) {
    $this->User->recursive=-1;
    $this->request->data = $this->User->findById($id);
   } else {
    if ($this->User->save($this->request->data)) {
    $this->Session->setFlash('Se actualiz&oacute; el User '.$id);
    $this->redirect(array('action' => 'view',$id));
    } else $this->Session->setFlash("Complete la informaci&oacute;n necesaria para actualizar el User", "flash_error");
   }
   $FiltroRow=array('id','id','descripcion');


   $almacenroles = $this->User->Role->find('list',array('order' =>'Role.id ASC','recursive' => -1));
   $this->set(compact('personal','htsjpjuzgados','almacenroles'));
 }

 function registrarActividad($message){
       if ($usuario = $this->Auth->user()) {
          $message = $usuario['username'].' (id: '.$usuario['id'].') '.$message;
          parent::log($message, 'miLog');
       }
 }

}
?>

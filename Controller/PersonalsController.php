<?php
/**
 * @version 2.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 */
class PersonalsController extends AppController {
 public $helpers = array('Html', 'Form','Javascript', 'Ajax');


 public function uprequisicion($id = null) {
  $this->Personal->id = $id;
  $this->Personal->recursive=-1;
  $existe=$this->Personal->findById($id);
  if ($existe['Personal']['sireqrequisicion']==0) $ever=1; else $ever=0;
   if ($this->Personal->saveField('sireqrequisicion',$ever,array('validate' => 'only')))
    $this->Session->setFlash('Se ha modificado el status',"flash_add");
   $this->redirect(array('action' => 'index'));
 }

 public function index() {
  $this->set('title_for_layout', 'Personal - Consulta');
  if ((isset($this->passedArgs['suser'])) || (isset($this->data['Personal']['suser']))){
   if ((isset($this->passedArgs['suser'])) && ($this->passedArgs['suser']!=NULL)) $palabra=$this->passedArgs['suser'];
   else $palabra=$this->data['Personal']['suser'];

     $this->paginate = array('limit' => 50,
                            'page'  => 1,
			    'recursive'=>0,
		            'order' => array(
                  // 'Personal.id' => 'desc',
                  'Personal.sireqrole_id' => 'desc'
                ),
 			    'conditions' => array('Personal.namefull LIKE '=> '%'.$palabra.'%'));

  }else{
    $this->paginate = array('limit' => 50,
                            'page'  => 1,
			    'recursive'=>0,
          'order' => array(
            // 'Personal.id' => 'desc',
            'Personal.sireqrole_id' => 'desc'
          ));

  }

  $this->Personal->unbindModel(array('hasMany' => array('Log','Message')));
  // $this->Personal->Role->unbindModel(array('hasMany' => array('Personal')));
  $this->Personal->unbindModel(array('belongsTo' => array('Assignment')));
  // $this->Personal->>unbindModel(array('hasOne' => array('Personal')));
  // $this->Personal->AssignmentPersonal->unbindModel(array('hasOne' => array('Personal')));
  // $this->Personal->AssignmentPersonal->unbindModel(array('hasMany' => array('Requisition','Personal')));
  $user= $this->paginate('Personal');
  // debug($user);
  if ($this->request->is('requested')) {return $user;} else {$this->set(compact('user'));}
 }

 public function edit($id = null) {
 $this->Personal->id = $id;
 $this->Personal->recursive = -1;
 $product=$this->Personal->findById($id);
 $user = $this->Auth->user();
 if ((!$this->Personal->exists()) || (!$id)){
    $this->Session->setFlash('No se encontró el producto "'.$id.'" en el Sistema');
    $this->redirect(array('action'=>'index'), null, true);
 }else{
  if ($this->request->is('get')) $this->request->data = $product;
  else {
   if ($this->Personal->saveAll($this->request->data, array('validate'=>'first'))) {
    $this->Session->setFlash('El personal se ha actualizado',"flash_add");
    $this->redirect(array('action' => 'index'));
   }else $this->Session->setFlash("Complete la informaci&oacute;n necesaria para actualizar el producto", "flash_error");
  }
 $sireqroles = $this->Personal->Role->find('list',
             array('order' =>'Role.id ASC',
             'recursive' => -1
 ));
 $htsjpassignments = $this->Personal->Assignment->find('list',
             array('order' =>'id ASC',
             'recursive' => -1
 ));
 $this->set(compact('sireqroles','htsjpassignments'));
}
}




}
?>

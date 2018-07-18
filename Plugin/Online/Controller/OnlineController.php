<?php 
/**
 * View alta almacenamiento de Depositos.
 * @version 1.0
 * @author Emmanuel Sanchez Carreon
 * @email  esanchez@htsjpuebla.gob.mx
 * @email2 carreon.emmanuel@gmail.com
 */
class OnlineController extends OnlineAppController{

 //public $components = array('RequestHandler');
 function beforeFilter() {
  parent::beforeFilter();
  $this->Auth->allow('index','geodata');
 }


 function index(){
  $onlines = $this->Online->find('all');
  //debug($onlines);
  if(isset($this->params['requested'])) return $onlines;
  $this->set(compact('onlines'));
 }

 function geodata() {
  $this->Online->recursive = 1; 
  $this->Online->User->unbindModel(array('belongsTo' => array('Group','Juzgado','Expediente')));
  //$this->Online->User->unbindModel(array('hasMany' => array('Log')));
  $conditions = array('limit' => 30,
		          'order' => array('Online.dt' => 'desc'),
  			  'conditions' => array('Online.app' => 'DDFM'));
  $onlineusers = $this->Online->find('all',array('conditions' => array('Online.app' => 'DDFM')));
  //debug($onlineusers);
  // Para el funcionamiento del llamado asíncrono
  if ($this->request->is('requested')) {return $onlineusers;} else {$this->set('online',$onlineusers);}  
 }
}
?>

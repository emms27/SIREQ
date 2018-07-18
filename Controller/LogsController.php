<?php
class LogsController extends AppController {
	                                     //se agregaron en el Helper
  public $helpers = array('Html', 'Form','Javascript', 'Ajax', 'Dates');
  public $components = array('Session');

  public function index() {
   $this->set('title_for_layout', 'Actividad del Sistema');
   $this->paginate = array('limit' => 50,
                           'page'  => 1,
                           'recursive'  => 2);
   $this->Log->User->unbindModel(array('belongsTo' => array('Role','AssignmentPersonal')));
   $this->Log->User->unbindModel(array('hasMany' => array('Log','Message')));
   $log = $this->paginate('Log');
   $this->set(compact('log'));
  }	

}
?>

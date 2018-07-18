<?php
class Role extends AppModel {
  var $name = 'roles';
  public $actsAs = array('Acl' => array('type' => 'requester'));
  var $hasMany = array('User','Aviso');


  public function parentNode() {   return null;  }


}

?>

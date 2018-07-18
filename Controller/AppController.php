<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('Controller', 'Controller');

class AppController extends Controller {
 public $components = array(
        'Acl',
        'Auth' => array(
	         'authenticate' => array(
           'Form' => array('scope' => array('User.ver' => '1'))),
           'authError' => 'No tiene permiso para esta acción',
           'authorize' => array('Actions' => array('actionPath' => 'controllers'))
        ),
        'Session'
    );


 public function beforeFilter() {
  $this->Auth->allow('display');
  $this->Auth->loginAction = array('plugin'=>false,'controller' => 'Users', 'action' => 'login');
  $this->Auth->logoutRedirect = array('plugin'=>false,'controller' => 'Users', 'action' => 'login');
  $this->Auth->loginRedirect = array('plugin'=>false,'controller' => 'pages', 'action' => 'home');

  if (sizeof($this->uses) && $this->{$this->modelClass}->Behaviors->attached('Logable')) {
    $this->{$this->modelClass}->setUserData($this->activeUser);
  }

  $user = $this->Auth->user();
  if ($user!=NULL) {
    $this->set('isAuthed', true);
    $this->_userId = (int) $user['id'];
    $this->set('userid', $user);
  } else $this->set('isAuthed', false);

 }


 public function correo($mensaje){
  $body="<font face=Verdana>
<table border='0' width='100%'>
 <tr>
 <td width='30%'><img src='http://htsjpuebla.gob.mx/acuerdos/assets/images/logotsj01.png' width='410px' height='150px' /></td>
 <td width='40%'></td>
 <td width='30%'><img src='http://htsjpuebla.gob.mx/acuerdos/assets/images/SIREQ.png' width='210px' height='70px' /></td>
 </tr>
 <tr>
  <td colspan='3'><hr></td>
 </tr>
</table>
<br>A quien corresponda:  <br><div align=justify>".$mensaje."</div><br><br><br><br>
<img src='http://www.htsjpuebla.gob.mx/filesec/page/img/img-footpage.png' width='100%' height='200px' /><br>
<hr><p><small><div align=justify><em><font color=gray>"."La informaci&oacute;n transmitida en el presente mensaje tiene la intenci&oacute;n de estar dirigida &uacute;nicamente a la persona o entidad que se refiere y puede contener informaci&oacute;n privilegiada y/o confidencial. Cualquier revisi&oacute;n, retransmisi&oacute;n, diseminaci&oacute;n o cualquier uso impropio o relacionado con dicha informaci&oacute;n por persona alguna distinta a la que fue dirigido este mensaje queda estrictamente prohibida. Si Usted ha recibido este mensaje o sus anexos por error, favor de contactar al remitente y elimine el material de cualquier computadora."."</font></em></div></small></p> <p> <div align=center><small>Copyright © 2015 Sistema de Gestión de Requisiciones.</div></p></small></FIELDSET>";
  return $body;
 }


}

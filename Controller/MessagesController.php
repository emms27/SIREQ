<?php
class MessagesController extends AppController {

 public $helpers = array('Html','Form','Javascript','Ajax','Dates');
 public $components = array('Session');

 function beforeFilter() {
  parent::beforeFilter();
  $this->Auth->allow('index2');
 }

 public function view($id=null) {
  $user = $this->Auth->user();
  $this->Message->id = $id;
  $this->Message->recursive=2;
  $this->Message->User->unbindModel(array('belongsTo' => array('Role','AssignmentPersonal')));
  $this->Message->User->unbindModel(array('hasMany' => array('Log','Message')));
  $this->Message->unbindModel(array('belongsTo' => array('Contacto')));
  $message=$this->Message->read(null, $id);  
  if ((!$this->Message->exists()) || (!$id)){
     $this->Session->setFlash('No se encontró el mensaje "'.$id.'" en el Sistema',"flash_error");
     $this->redirect(array('action'=>'inbox'), null, true);
  }else{
   $this->set('title_for_layout', 'Contacto - Detalle');
   if ($message['Message']['almacenuser2_id']==$user['id']) {
    $this->Message->saveField('estado','Leído');
   }
   $this->set(compact('message'));
  }
 }


 public function nuevo() {
  if (!empty($this->data)){
   if ($this->Message->save($this->data)) {
    $this->Session->setFlash('Se envió su comentario, sugerencia o petición correctamente',"flash_add");
    $this->redirect(array('action' => 'nuevo'));
   }else $this->Session->setFlash("Complete la informaci&oacute;n necesaria para su comentario, sugerencia o petición", "flash_error");
  }
//   $almacenuser2s=$this->Message->User->Personal->find('all',array('recursive'=>0
//,'fields'=>array('Role.id')
  // ));
   $user = $this->Auth->user();
//   $this->Message->User->unbindModel(array('belongsTo' => array('Role','AssignmentPersonal')));
   $conditions=array('Contacto.id !='=>$user['id'],'Contacto.ver'=>'1');
  // $conditions=array('User.role_id !='=>$user['Role']['id'],'User.ver'=>'1');
   $almacenuser2s=$this->Message->Contacto->find('list',
				   array('recursive'=>0,
					    'conditions'=>$conditions,
					 //'order' =>'Personal.namefull ASC'
					  // 'fields'=>array('Personal.id')
            'fields'=>array('Contacto.id','Contacto.htsjpemployee_id')
   ));

  //  debug($almacenuser2s);
   $this->set(compact('almacenuser2s'));
 }

 public function responder($id = null) {
  if (!empty($this->data)){
   if ($this->Message->save($this->data)){
    $this->Session->setFlash('Se envió su comentario, sugerencia o petición correctamente',"flash_add");
    $this->redirect(array('action' => 'inbox'));
   } else $this->Session->setFlash("Complete la informaci&oacute;n necesaria para su comentario, sugerencia o petición","flash_error");
  }
  $this->Message->User->unbindModel(array('belongsTo' => array('Role','Assignment')));
  $this->Message->User->unbindModel(array('hasMany' => array('Log','Message')));
  $this->Message->Contacto->unbindModel(array('hasMany' => array('Message')));
  $this->Message->recursive=2;
  $message=$this->Message->findById($id);
  // debug($message);
   $this->set(compact('message'));
 }

 public function notify() {
  $user = $this->Auth->user();
  $fmensaje = array('Message.id',
		    'Message.fecha_registro',
		    'Message.estado',
		    'Message.almacenuser_id',
		    'Message.almacenuser2_id',
		    'Message.asunto'
  );
  $this->Message->User->unbindModel(array('belongsTo' => array('Role','Assignment')));
  $this->Message->User->unbindModel(array('hasMany' => array('Log','Message')));
  $this->Message->Contacto->unbindModel(array('hasMany' => array('Message')));
  $this->paginate = array('limit'=>50,
			        'recursive'=>2,
              'fields'=>$fmensaje,
		          'order' => array('Message.fecha_registro' => 'desc'),
			  'conditions' =>array(
                 'Message.estado' => 'Enviado',
					       'Message.almacenuser2_id' =>  $user['id']));
  $mensajes = $this->paginate('Message');
  if ($this->request->is('requested')) {return $mensajes;} else { $this->set(compact('mensajes'));}

  $this->redirect(array('controller'=>'pages','action' => 'home'));
 }

 public function inbox() {
  $user = $this->Auth->user();
  $fmensaje = array('Message.id',
		    'Message.fecha_registro',
		    'Message.estado',
		    'Message.almacenuser_id',
		    'Message.almacenuser2_id',
		    'Message.asunto'
  );
  $this->Message->User->unbindModel(array('belongsTo' => array('Role','Assignment')));
  $this->Message->User->unbindModel(array('hasMany' => array('Log','Message')));
  $this->Message->Contacto->unbindModel(array('hasMany' => array('Message')));
  $this->paginate = array('limit'=>50,
			  'recursive'=>2,
                          'fields'=>$fmensaje,
		          'order' => array('Message.fecha_registro' => 'desc'),
			  'conditions' =>array('Message.almacenuser2_id' =>  $user['id']));
  $mensajes = $this->paginate('Message');
  if ($this->request->is('requested')) {return $mensajes;} else { $this->set(compact('mensajes'));}
 }

 public function send() {
  $user = $this->Auth->user();
  $fmensaje = array('Message.id',
		    'Message.fecha_registro',
		    'Message.estado',
		    'Message.almacenuser_id',
		    'Message.almacenuser2_id',
		    'Message.asunto'
  );
  $this->Message->User->unbindModel(array('belongsTo' => array('Role','Assignment')));
  $this->Message->User->unbindModel(array('hasMany' => array('Log','Message')));
  $this->Message->Contacto->unbindModel(array('hasMany' => array('Message')));
  $this->paginate = array('limit'=>50,
			  'recursive'=>2,
                          'fields'=>$fmensaje,
		          'order' => array('Message.fecha_registro' => 'desc'),
			  'conditions' =>array('Message.almacenuser_id' =>  $user['id']));
  $mensajes = $this->paginate('Message');
  if ($this->request->is('requested')) {return $mensajes;} else { $this->set(compact('mensajes'));}
 }

  public function index2(){
	$nombre='Emmanuel';
	$email='carreon@gmail.com';
	//$asunto=$this->data['Contacteno']['asunto'];
	$mensaje=nl2br('Ejemplo');
	$ip = $_SERVER['REMOTE_ADDR'];
	$body="<font face=Verdana><div align=left>
<img src='http://htsjpuebla.gob.mx/acuerdos/assets/images/logotsj01.png' width='410px' height='150px' /><br>A quien corresponda: </div> <br><div align=justify>"."   Se le notifica que su requisición fue recibida correctamente. <br><br><a href='https://172.16.6.15/' style='color:white; background:#638cb5; border:0px; width:80px; height:19px; padding:9px;'>Ir al sistema</a></div><br><br><br><br>
<img src='http://www.htsjpuebla.gob.mx/filesec/page/img/img-footpage.png' width='100%' height='200px' /><br>
<hr><p><small><div align=justify><em><font color=gray>"."La informaci&oacute;n transmitida en el presente mensaje tiene la intenci&oacute;n de estar dirigida &uacute;nicamente a la persona o entidad que se refiere y puede contener informaci&oacute;n privilegiada y/o confidencial. Cualquier revisi&oacute;n, retransmisi&oacute;n, diseminaci&oacute;n o cualquier uso impropio o relacionado con dicha informaci&oacute;n por persona alguna distinta a la que fue dirigido este mensaje queda estrictamente prohibida. Si Usted ha recibido este mensaje o sus anexos por error, favor de contactar al remitente y elimine el material de cualquier computadora."."</font></em></div></small></p> <p> <div align=center><small>Copyright © 2015 Sistema de Gestión de Requisiciones.</div></p></small></FIELDSET>";

	App::uses('CakeEmail', 'Network/Email');
	$email = new CakeEmail();
  	$email->config('sireq');
	$email->from(array('sireq@htsjpuebla.gob.mx' => 'Sistema de Gestión de Requisiciones'));
	$email->to(array(
			 'carreon.emmanuel@gmail.com'
	));
	$email->emailFormat('html');
	$email->subject('Contacto SIREQ');
	$email->send($body);
      	$this->Session->setFlash('Se envió su comentario, sugerencia o petición correctamente',"flash_add");
  }

}
?>

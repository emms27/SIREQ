<?php
class RequisitionsController extends AppController{
 public $helpers = array('Html','Form','GChart.GChart');
 public $components = array('RequestHandler');

 function beforeFilter() {
  parent::beforeFilter();
  $this->Auth->allow('add');
 }


 public function index(){
  $this->set('title_for_layout', 'Requisicion - Consulta');
  $this->Requisition->recursive = 2;
  // $this->Requisition->AssignmentPersonal->unbindModel(array('hasOne' => array('User')));
  // $this->Requisition->AssignmentPersonal->unbindModel(array('hasMany' => array('Requisition','ProductRole')));
  $this->Requisition->unbindModel(array('hasMany' => array('ProductRequisition')));
  $user = $this->Auth->user();
  if ((isset($this->passedArgs['sparte'])) || (isset($this->data['Requisition']['sparte']))){
   if ((isset($this->passedArgs['sparte'])) && ($this->passedArgs['sparte']!=NULL)) $palabra=$this->passedArgs['sparte'];
   else $palabra=$this->data['Requisition']['sparte'];
   if ($user['Role']['id']==1){
    $this->paginate = array('limit' => 50,
                    'page'  => 1,
		    'order' => array('Requisition.fecha_registro' => 'desc'),
 		    'conditions' => array('Requisition.ver' => '1','Requisition.id LIKE '=> $palabra.'%'));
   }else{
    $this->paginate = array('limit' => 50,
                            'page'  => 1,
		            'order' => array('Requisition.fecha_registro' => 'desc'),
 			    'conditions' => array('Requisition.ver' => '1',
				 'Requisition.id LIKE '=> $palabra.'%',
		                 'Requisition.htsjpemployee_id'=> $user['htsjpemployee_id']
    ));
   }
  }else{
   if ($user['Role']['id']==1){
    $this->paginate = array('limit' => 50,
                    'page'  => 1,
		    'order' => array('Requisition.fecha_registro' => 'desc'),
 		    'conditions' => array('Requisition.ver' => '1'));
   }else{
    $this->paginate = array('limit' => 50,
                            'page'  => 1,
		            'order' => array('Requisition.fecha_registro' => 'desc'),
 			    'conditions' => array('Requisition.ver' => '1',
		                 'Requisition.htsjpemployee_id'=> $user['htsjpemployee_id']
    ));
   }
  }
  $parte = $this->paginate('Requisition');
  if ($this->request->is('requested')) {return $parte;} else { $this->set(compact('parte')); }
 }


 public function notify() {
  $user = $this->Auth->user();
  $this->Requisition->recursive = 2;
  $this->Requisition->unbindModel(array('hasMany' => array('ProductRequisition')));
  // $this->Requisition->AssignmentPersonal->unbindModel(array('hasMany' => array('Requisition')));
  if ($user['Role']['id']==1){
    $this->paginate = array('limit' => 50,
                            'page'  => 1,
		            'order' => array('Requisition.fecha_registro' => 'desc'),
 			    'conditions' => array('Requisition.ver' => '1',
		                            'Requisition.status'=> 'En proceso'
    ));
  }else{
    $this->paginate = array('limit' => 50,
                            'page'  => 1,
		            'order' => array('Requisition.fecha_registro' => 'desc'),
 			    'conditions' => array('Requisition.ver' => '1',
		                      'Requisition.status'=> 'Autorizada con Modificación',
		                      // 'Requisition.htsjpassignmentemployee_id'=> $user['htsjpassignmentemployee_id']
    ));
  }
  $mensajes = $this->paginate('Requisition');
  if ($this->request->is('requested')) {return $mensajes;} else { $this->set(compact('mensajes'));}
 }

 public function add(){
  // $this->layout = 'ajax';
  $user = $this->Auth->user();
  $d=date('d');
  //debug($d);
  if ($d>=1){
    /*
   if ($user['Role']['id']==1){
   }else{
    $crequisitions= $this->Requisition->find('count',
					   array(
						 'recursive'=>-1,
				  	         'conditions' => array(
						 	'Requisition.ver' => 1,
						 	'Requisition.status !=' => "Cancelada",
			'Requisition.htsjpassignmentemployee_id'=>$user['htsjpassignmentemployee_id']
						  )
    ));
    if ($crequisitions>=1){
     $this->Session->setFlash('No puede registrar su requisición. <br><I>Recuerde que solo puede enviar una por mes.</I>',"flash_error");
     $this->redirect(array('action' => 'index'));
    }
   }*/
  }else{
   $this->Session->setFlash('No puede registrar su requisición. <br><I>Recuerde que es apartir de la segunda quincena de cada mes.</I>',"flash_error");
   $this->redirect(array('action' => 'index'));
  }
  $this->set('title_for_layout', 'Requisicion - Alta');
     if (!empty($this->data)){
       if ($this->Requisition->saveAll($this->data, array('validate'=>'first'))) {
	 $id=$this->Requisition->find('first',array(
	 	     'recursive'=>-1,
		     'conditions'=>array('htsjpemployee_id'=>$this->data['Requisition']['htsjpemployee_id']),
		     'order'=> array('id' => 'desc')));
     $this->Session->setFlash('Se envió y recibió la requisición '.$id['Requisition']['id'].' <br><br>hoy: '.date("Y-m-d h:i:s"),"flash_gadd");

    $mensaje="   Se le notifica que su requisición <b>". $id['Requisition']['id']."</b>, fue Recibida. <br><br><a href='http://187.190.62.102:8118/systems/SIREQ/Requisitions/view/".$id['Requisition']['id']."' style='color:white; background:#638cb5; border:0px; width:80px; height:19px; padding:9px;'>Ir al sistema</a>";

    $body=$this->correo($mensaje);
    App::uses('CakeEmail', 'Network/Email');
    $email = new CakeEmail();
    $email->config('sireq');
    $email->from(array('sireq@htsjpuebla.gob.mx' => 'Sistema de Gestión de Requisiciones'));
    $email->to(array('carreon.emmanuel@gmail.com','esanchez@htsjpuebla.gob.mx'));
    $email->emailFormat('html');
    $email->subject('Contacto SIREQ');
    $email->send($body);



         $this->redirect(array('action' => 'index'));
       } else {$this->Session->setFlash('Complete la informaci&oacute;n necesaria para dar de alta la requisición',"flash_error");}
     }

  $FiltroOpcion=array('Personal.id','Personal.namefull','Assignment.descripcion');
  if ($user['Role']['id']==1){
   $htsjpemployees= $this->Requisition->Personal->find('list',
					   array(//'order'=> 'htsjpassignment_id ASC',
						 'recursive'=>0,
					         'fields'=>$FiltroOpcion,
				  	         'conditions' => array(
                       'Personal.ver' => 1,
                       'Personal.sireqrequisicion' => 1
                   )
   ));
  }else{
   $htsjpemployees= $this->Requisition->Personal->find('list',
					   array(
						     'recursive'=>0,
					       'fields'=>$FiltroOpcion,
				  	     'conditions' => array(
                       'Personal.ver' => 1,
						           'Personal.id'=>$user['htsjpemployee_id']
                 )
   ));
  }

  if(isset($this->data['Requisition']['htsjpemployee_id'])){

   if ($user['Role']['id']==1){
    // $this->loadModel('AssignmentPersonal');
    $apersonal = $this->Requisition->Personal->find('first',
					   array('recursive'=>-1,
 						 'conditions' => array('Personal.id' => $this->data['Requisition']['htsjpemployee_id']
    )));
    // debug($apersonal);
    $this->Requisition->ProductRequisition->Product->ProductRole->unbindModel(array('belongsTo' => array('Role')));
    $almacenproducts= $this->Requisition->ProductRequisition->Product->ProductRole->find('all',
				   array('order'=> array('Product.almacencategoria_id' => 'desc'),
					 'recursive'=>2,
					 'conditions' => array(
		 			 'ProductRole.ver'=>1,
          //  'limit' => 50,
		       'ProductRole.role_id'=>$apersonal['Personal']['sireqrole_id']
    )));
   }else{
    $this->Requisition->ProductRequisition->Product->ProductRole->unbindModel(array('belongsTo' => array('Role')));
    $almacenproducts= $this->Requisition->AssignmentPersonal->ProductRole->find('all',
				   array('order'=> array('Product.almacencategoria_id' => 'desc'),
					 'recursive'=>2,
					 'conditions' => array(
        		  'ProductRole.ver'=>1,
        		  'ProductRole.role_id'=>$user['role_id']
    )));
   }
  }else $almacenproducts=array();

  // debug($almacenproducts);

  $cat= $this->Requisition->ProductRequisition->Product->Categoria->find('all',array(
    "conditions"=>array('ver'=>1),
    "recursive"=>-1
  ));

  $this->set(compact('htsjpemployees','almacenproducts','cat'));
 }

 public function add_product(){
  $user = $this->Auth->user();
  $d=date('d');
  if ($d>=15){
   if ($user['Role']['id']==1){
   }else{
    $crequisitions= $this->Requisition->find('count',
					   array(
						 'recursive'=>-1,
				  	         'conditions' => array(
						 	'Requisition.ver' => 1,
						 	'Requisition.status !=' => "Cancelada",
			'Requisition.htsjpassignmentemployee_id'=>$user['htsjpassignmentemployee_id']
						  )
    ));
    if ($crequisitions>=1){
     $this->Session->setFlash('No puede registrar su requisición. <br><I>Recuerde que solo puede enviar una por mes.</I>',"flash_error");
     $this->redirect(array('action' => 'index'));
    }
   }
  }else{
   $this->Session->setFlash('No puede registrar su requisición. <br><I>Recuerde que es apartir de la segunda quincena de cada mes.</I>',"flash_error");
   $this->redirect(array('action' => 'index'));
  }



  $this->set('title_for_layout', 'Requisicion - Alta');
     if (!empty($this->data)){
       if ($this->Requisition->saveAll($this->data, array('validate'=>'first'))) {
         $this->Session->setFlash('Se agregó la nueva requisición',"flash_add");
         $this->redirect(array('action' => 'index'));
       } else {$this->Session->setFlash('Complete la informaci&oacute;n necesaria para dar de alta la requisición',"flash_error");}
     }

  $FiltroOpcion=array('AssignmentPersonal.id','Personal.nombre','Assignment.descripcion');
  if ($user['Role']['id']==1){
   $htsjpassignmentemployees= $this->Requisition->AssignmentPersonal->find('list',
					   array(
						 'recursive'=>0,
					         'fields'=>$FiltroOpcion,
				  	         'conditions' => array('AssignmentPersonal.ver' => 1)
   ));
  }else{
   $htsjpassignmentemployees= $this->Requisition->AssignmentPersonal->find('list',
					   array(
						 'recursive'=>0,
					         'fields'=>$FiltroOpcion,
				  	         'conditions' => array('AssignmentPersonal.ver' => 1,
						 'AssignmentPersonal.id'=>$user['htsjpassignmentemployee_id'])
   ));
  }

  if(isset($this->data['Requisition']['htsjpassignmentemployee_id'])){

   if ($user['Role']['id']==1){
    $this->loadModel('AssignmentPersonal');
    $apersonal = $this->AssignmentPersonal->find('first',
					   array('recursive'=>-1,
 						 'conditions' => array('id' => $this->data['Requisition']['htsjpassignmentemployee_id']
    )));
  $this->Requisition->AssignmentPersonal->ProductRole->unbindModel(array('belongsTo' => array('AssignmentPersonal')));
    $almacenproducts= $this->Requisition->AssignmentPersonal->ProductRole->find('all',
				   array(
					 'recursive'=>0,
					 'conditions' => array(
		 			 'ProductRole.ver'=>1,
		 'ProductRole.role_id'=>$apersonal['AssignmentPersonal']['role_id']
    )));
   }else{
  $this->Requisition->AssignmentPersonal->ProductRole->unbindModel(array('belongsTo' => array('AssignmentPersonal')));
    $almacenproducts= $this->Requisition->AssignmentPersonal->ProductRole->find('all',
				   array(
					 'recursive'=>0,
					 'conditions' => array(
		  'ProductRole.ver'=>1,
		  'ProductRole.role_id'=>$user['role_id']
    )));
   }
  }else $almacenproducts=array();
  $this->set(compact('htsjpassignmentemployees','almacenproducts'));
 }

 public function status($id = null) {
  $this->Requisition->id = $id;
  $this->Requisition->recursive=-1;
  $existe=$this->Requisition->findById($id);
  if ($existe['Requisition']['ver']==0) $ever=1; else $ever=0;
   $data = array('id' => $id, 'ver' => $ever);
   if ($this->Requisition->saveField('ver',$ever,array('validate' => 'only')))
    $this->Session->setFlash('Se ha modificado el status',"flash_add");
   $this->redirect(array('action' => 'index'));
 }

 // public function upcantidad($id = null) {
 //  $this->ProductRequisition->id = $id;
 //  $this->ProductRequisition->unbindModel(array('belongsTo' => array('Product')));
 //  $existe=$this->ProductRequisition->find('first',
 // 				   array(
 // 					 'recursive'=>0,
 // 			  	         'conditions' => array('ProductRequisition.id'=>$id)
 //  ));
 //  // debug($existe);
 //  if ($existe['Requisition']['status']=="En proceso"){
 //   $this->ProductRequisition->saveField('cantidad_autorizada',$this->data['Juzgado']['titular']);
 //   //  $this->redirect(array('controller'=>'Requisitions','action' => 'view',$existe['Requisition']['id']));
 //  }
 // }

 public function autorizar($id = null) {
  $this->Requisition->id = $id;
  $this->Requisition->recursive=-1;
  $existe=$this->Requisition->findById($id);
  // debug($existe);
  if ($existe['Requisition']['status']=="En proceso"){
   $data = array('id' => $id, 'status' => 'Autorizada con Modificación','fecha_autorizada' => date('Y-m-d h:i:s'));
   $this->Requisition->save($data);
   $this->Session->setFlash('Se autorizó la requisición '.$id.' <br><br>hoy: '.date("Y-m-d h:i:s"),"flash_gadd");

   $mensaje="Se le notifica que su requisición <b>". $id."</b>, fue Autorizada con Modificación.<br> Ya puede pasar por su requisición. <br> Tiene 15 días para recogerla en caso contrario se cancelara en automático.<br><br><a href='http://187.190.62.102:8118/SIREQ/Requisitions/view/".$id."' style='color:white; background:#638cb5; border:0px; width:80px; height:19px; padding:9px;'>Ir al sistema</a>";
   $body=$this->correo($mensaje);
	 App::uses('CakeEmail', 'Network/Email');
	 $email = new CakeEmail();
   $email->config('sireq');
	 $email->from(array('sireq@htsjpuebla.gob.mx' => 'Sistema de Gestión de Requisiciones'));
	 $email->to(array('carreon.emmanuel@gmail.com','esanchez@htsjpuebla.gob.mx'));
	 $email->emailFormat('html');
	 $email->subject('Contacto SIREQ');
	 $email->send($body);
  }else echo $this->Session->setFlash('No se puede autorizar, verifique el proceso en el que se encuentra',"flash_error");
   $this->redirect(array('controller'=>'Requisitions','action' => 'view',$id));


 }

 public function cancelar($id = null) {
  $this->Requisition->id = $id;
  $this->Requisition->recursive=-1;
  $existe=$this->Requisition->findById($id);

  if (($existe['Requisition']['status']=="Autorizada con Modificación") || ($existe['Requisition']['status']=="En proceso")){
   $data = array('id' => $id, 'status' => 'Cancelada','fecha_cancelada' => date('Y-m-d h:i:s'));
   $this->Requisition->save($data);
   $this->Session->setFlash('Se canceló la requisición '.$id.' <br><br>hoy: '.date("Y-m-d h:i:s"),"flash_gerror");
   $mensaje="   Se le notifica que su requisición <b>". $id."</b>, fue Cancelada. <br><br><a href='http://187.190.62.102:8118/SIREQ/Requisitions/view/".$id."' style='color:white; background:#638cb5; border:0px; width:80px; height:19px; padding:9px;'>Ir al sistema</a>";
   $body=$this->correo($mensaje);
	App::uses('CakeEmail', 'Network/Email');
	$email = new CakeEmail();
  	$email->config('sireq');
	$email->from(array('sireq@htsjpuebla.gob.mx' => 'Sistema de Gestión de Requisiciones'));
	$email->to(array('carreon.emmanuel@gmail.com','esanchez@htsjpuebla.gob.mx'));
	$email->emailFormat('html');
	$email->subject('Contacto SIREQ');
	$email->send($body);
  }else echo $this->Session->setFlash('No se puede cancelar por que ya fue cancelada o entregada',"flash_error");
  $this->redirect(array('controller'=>'Requisitions','action' => 'view',$id));

 }


 public function entregar($id = null) {
  $this->Requisition->id = $id;
  $this->Requisition->recursive=-1;
  $existe=$this->Requisition->findById($id);

  if (($existe['Requisition']['status']=="Autorizada con Modificación")){
   $data = array('id' => $id, 'status' => 'Entregada','fecha_entregada' => date('Y-m-d h:i:s'));
   $this->Requisition->save($data);
   $this->Session->setFlash('Se entregó la requisición '.$id.' <br><br>hoy: '.date("Y-m-d h:i:s"),"flash_gadd");
   $mensaje="   Se le notifica que su requisición <b>". $id."</b>, fue Entregada. <br><br><a href='http://187.190.62.102:8118/SIREQ/Requisitions/view/".$id."' style='color:white; background:#638cb5; border:0px; width:80px; height:19px; padding:9px;'>Ir al sistema</a>";
   $body=$this->correo($mensaje);
	App::uses('CakeEmail', 'Network/Email');
	$email = new CakeEmail();
  	$email->config('sireq');
	$email->from(array('sireq@htsjpuebla.gob.mx' => 'Sistema de Gestión de Requisiciones'));
	$email->to(array('carreon.emmanuel@gmail.com','esanchez@htsjpuebla.gob.mx'));
	$email->emailFormat('html');
	$email->subject('Contacto SIREQ');
	$email->send($body);
  }else echo $this->Session->setFlash('No se puede entregar, verifique el status',"flash_error");
  $this->redirect(array('controller'=>'Requisitions','action' => 'view',$id));
 }

 public function view($id=null){
  $this->set('title_for_layout', 'Requisición - Consulta');
  $user = $this->Auth->user();
  $this->Requisition->id = $id;
  $this->Requisition->recursive = 2;
  // $this->Requisition->AssignmentPersonal->unbindModel(array('hasOne' => array('User')));
  // $this->Requisition->AssignmentPersonal->unbindModel(array('hasMany' => array('Requisition','ProductRole')));
  $this->Requisition->ProductRequisition->unbindModel(array('belongsTo' => array('Requisition')));
  $this->Requisition->unbindModel(array('hasMany' => array('ProductRequisition')));
  $row=$this->Requisition->read();
  $this->Requisition->ProductRequisition->unbindModel(array('belongsTo' => array('Requisition')));
  $almacenproducts= $this->Requisition->ProductRequisition->find('all',
				   array('order'=> array('Product.almacencategoria_id' => 'desc'),
					 'recursive'=>2,
					 'conditions' => array(
		 			  	'ProductRequisition.almacenrequisition_id'=>$id
    )));
  if ((!$this->Requisition->exists()) || (!$id)){
    $this->Session->setFlash('La Requisición "'.$id.'" no existe en el Sistema','flash_error');
    $this->redirect(array('action'=>'index'), null, true);
  }else if (($user['Role']['id']==2) && ($user['htsjpassignmentemployee_id']!=$row['Requisition']['htsjpassignmentemployee_id'])){
    $this->Session->setFlash('No tiene permiso para visualizar la requisición "'.$id.'"','flash_error');
    $this->redirect(array('action'=>'index'), null, true);
  }
  $user=$user['Role'];
  $this->set(compact('row','user','almacenproducts'));
 }

 public function pdf($id = null) {
  $user = $this->Auth->user();
  $this->Requisition->id = $id;
  $this->Requisition->recursive = 2;
  $this->Requisition->AssignmentPersonal->unbindModel(array('hasOne' => array('User')));
  $this->Requisition->AssignmentPersonal->unbindModel(array('hasMany' => array('Requisition','ProductRole')));
  $this->Requisition->ProductRequisition->unbindModel(array('belongsTo' => array('Requisition')));
  $this->Requisition->unbindModel(array('hasMany' => array('ProductRequisition')));
  $row=$this->Requisition->read();
  $this->Requisition->ProductRequisition->unbindModel(array('belongsTo' => array('Requisition')));
  $almacenproducts= $this->Requisition->ProductRequisition->find('all',
				   array('order'=> array('Product.almacencategoria_id' => 'desc'),
					 'recursive'=>2,
					 'conditions' => array(
		 			  	'ProductRequisition.almacenrequisition_id'=>$id,
		 				'ProductRequisition.ver'=>1
    )));
  if ($user['Role']['id']==1){
   if ($row['Requisition']['cprint']==0) $this->Requisition->saveField('cprint','1');
   if (($row['Requisition']['status']!="Cancelada") || ($row['Requisition']['status']!="Entregada")){
    Configure::write('debug',2);
    $this->layout = 'pdf';
    $this->set(compact('row','user','almacenproducts'));
    $this->render();
   }else{
     $this->Session->setFlash('No se puede imprimir, verifique el status "'.$id.'"');
     $this->redirect(array('controller'=>'Requisitions','action' => 'view',$id));

   }
  }else{
     echo $this->Session->setFlash('No puede imprimir ninguna requisición',"flash_error");
     $this->redirect(array('controller'=>'Requisitions','action' => 'view',$id));
  }
 }

 public function consulta_fechas() {
$data = array(
  'labels' => array(
    array('string' => 'Sample'),
    array('number' => 'Aut'),
    array('number' => 'Can'),
    array('number' => 'Pro'),
    array('number' => 'Ent')
  ),
  'data' => array(
    array('Ene', 74.01, 7.03, 70.50,2.6),
    array('Feb', 54.05, 4.04, 90.50,5.6),
    array('Mar', 34.03, 14.01, 70.50,26.6),
    array('Abr', 24.00, 41.02, 80.50,2.6),
    array('May', 14.12, 55.05, 60.50,21.6),
    array('Jun', 4.04, 10.04, 50.50,10.6),
    array('Jul', 34.05, 52.06, 20.50,7.6),
    array('Ago', 64.03, 20.02, 30.50,1.6),
    array('Sep', 84.01, 80.03, 10.50,0.6),
    array('Oct', 94.04, 5.01, 0.50,2.6),
  ),
  'title' => 'Requisiciones Solicitadas',
  'type' => 'area'
);
 $this->set(compact('data'));
  $this->set('title_for_layout', 'Requisición - Reporte');
  $user = $this->Auth->user();
  if ($user['Role']['id']==1){
     $htsjpassignmentemployees= $this->Requisition->AssignmentPersonal->find('list',
					   array(
						 'recursive'=>0,
		         'fields'=>array('AssignmentPersonal.id','Assignment.descripcion','Personal.nombre'),
				  	         'conditions' => array('AssignmentPersonal.ver' => 1)
     ));
  }else{
     $hassignmentemployee=$user['htsjpassignmentemployee_id'];
     $htsjpassignmentemployees= $this->Requisition->AssignmentPersonal->find('list',
					   array(
						 'recursive'=>0,
		         'fields'=>array('AssignmentPersonal.id','Assignment.descripcion','Personal.nombre'),
				  	         'conditions' => array('AssignmentPersonal.ver' => 1,
						'AssignmentPersonal.id'=>$hassignmentemployee)
     ));
  }

  if (((isset($this->passedArgs['daterange'])) &&
	(isset($this->passedArgs['htsjpassignmentemployee_id'])) &&
	(isset($this->passedArgs['status']))) ||
       ((isset($this->data['Requisition']['daterange'])) &&
        (isset($this->data['Requisition']['htsjpassignmentemployee_id'])) &&
        (isset($this->data['Requisition']['status'])))){
   if ((isset($this->passedArgs['daterange'])) && ($this->passedArgs['daterange']!=NULL)){
    $fecini=$this->passedArgs[''].' 00:00:00';
    $fecfin=$this->passedArgs['to'].' 23:59:59';
    $status=$this->passedArgs['status'];
    $assignment=$this->passedArgs['htsjpassignmentemployee_id'];
    $concepto=$this->passedArgs['htsjpconcepto_id'];
   }else{
    $fecha=explode(' - ',$this->data['Requisition']['daterange']);
    $fecinicial=explode('/',$fecha[0]);
    $fecfinal=explode('/',$fecha[1]);
    $fecini=$fecinicial[2].'-'.$fecinicial[0].'-'.$fecinicial[1].' 00:00:00';
    $fecfin=$fecfinal[2].'-'.$fecfinal[0].'-'.$fecfinal[1].' 23:59:59';
    $status=$this->data['Requisition']['status'];
    $assignment=$this->data['Requisition']['htsjpassignmentemployee_id'];
   }

  if ($user['Role']['id']==1) $hassignmentemployee=$assignment;
   $this->Requisition->recursive = 2;
   $this->Requisition->AssignmentPersonal->unbindModel(array('hasOne' => array('User')));
   $this->Requisition->AssignmentPersonal->unbindModel(array('hasMany' => array('Requisition','ProductRole')));
   $this->Requisition->unbindModel(array('hasMany' => array('ProductRequisition')));

   if ($status=="Autorizada con Modificación"){
     $this->paginate = array('limit' => 50,
                            'page'  => 1,
 	                    'order' => array('Requisition.fecha_autorizada' => 'desc'),
  			    'conditions' => array('Requisition.fecha_autorizada >=' => $fecini,
				             'Requisition.fecha_autorizada <=' => $fecfin,
				     'Requisition.htsjpassignmentemployee_id LIKE' => $hassignmentemployee."%",
					     'Requisition.status LIKE' => "%".$status."%"));
   }else if ($status=="Cancelada"){
     $this->paginate = array('limit' => 50,
                            'page'  => 1,
 	                    'order' => array('Requisition.fecha_cancelada' => 'desc'),
  			    'conditions' => array('Requisition.fecha_cancelada >=' => $fecini,
				             'Requisition.fecha_cancelada <=' => $fecfin,
				     'Requisition.htsjpassignmentemployee_id LIKE' => $hassignmentemployee."%",
					     'Requisition.status LIKE' => "%".$status."%"));
   }else{
     $this->paginate = array('limit' => 50,
                            'page'  => 1,
 	                    'order' => array('Requisition.fecha_registro' => 'desc'),
  			    'conditions' => array('Requisition.fecha_registro >=' => $fecini,
				             'Requisition.fecha_registro <=' => $fecfin,
				     'Requisition.htsjpassignmentemployee_id LIKE' => $hassignmentemployee."%",
					     'Requisition.status LIKE' => "%".$status."%"));
   }
   $deposito = $this->paginate('Requisition');
  }
  if ($this->request->is('requested')) {return $deposito;} else { $this->set(compact('deposito')); }
  $this->set(compact('htsjpassignmentemployees'));
 }


 public function reporte_fechas_pdf() {
  $this->set('title_for_layout', 'Requisición - Reporte');
  $rfecha=$this->params['url'];
  $fecini=$this->params['url']['from'].' 00:00:00';
  $fecfin=$this->params['url']['to'].' 23:59:59';
  $status=$this->params['url']['status'];
  $assignment=$this->params['url']['htsjpassignmentemployee_id'];
  Configure::write('debug',2);
  $this->layout = 'pdf';
  $user = $this->Auth->user();

   $this->Requisition->recursive = 2;
   $this->Requisition->AssignmentPersonal->unbindModel(array('hasOne' => array('User')));
   $this->Requisition->AssignmentPersonal->unbindModel(array('hasMany' => array('Requisition','ProductRole')));
   $this->Requisition->unbindModel(array('hasMany' => array('ProductRequisition')));


   if ($user['Role']['id']==1) $hassignmentemployee=$assignment;
   else if ($user['Role']['id']==2) $hassignmentemployee=$user['htsjpassignmentemployee_id'];

   if ($status=="Autorizada con Modificación"){
     $deposito=$this->Requisition->find('all',array(
 	                    'order' => array('Requisition.fecha_autorizada' => 'desc'),
  			    'conditions' => array('Requisition.fecha_autorizada >=' => $fecini,
				             'Requisition.fecha_autorizada <=' => $fecfin,
				     'Requisition.htsjpassignmentemployee_id LIKE' => $hassignmentemployee."%",
					     'Requisition.status LIKE' => "%".$status."%")));
   }else if ($status=="Rechazada"){
     $deposito=$this->Requisition->find('all',array(
 	                    'order' => array('Requisition.fecha_rechazada' => 'desc'),
  			    'conditions' => array('Requisition.fecha_rechazada >=' => $fecini,
				             'Requisition.fecha_rechazada <=' => $fecfin,
				     'Requisition.htsjpassignmentemployee_id LIKE' => $hassignmentemployee."%",
					     'Requisition.status LIKE' => "%".$status."%")));
   }else{
     $deposito=$this->Requisition->find('all',array(
 	                    'order' => array('Requisition.fecha_registro' => 'desc'),
  			    'conditions' => array('Requisition.fecha_registro >=' => $fecini,
				             'Requisition.fecha_registro <=' => $fecfin,
				     'Requisition.htsjpassignmentemployee_id LIKE' => $hassignmentemployee."%",
					     'Requisition.status LIKE' => "%".$status."%")));
   }
  $this->set(compact('deposito','rfecha','user'));
 }


}
?>

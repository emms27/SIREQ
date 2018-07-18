<?php
App::uses('AppController', 'Controller');
/**
 * Invoices Controller
 *
 * @property Invoice $Invoice
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class InvoicesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');


	public function autorizar($id = null) {
   $this->Invoice->id = $id;
   $this->Invoice->recursive=-1;
   $existe=$this->Invoice->findById($id);
   // debug($existe);
   if ($existe['Invoice']['status']=="En proceso"){
    $data = array('id' => $id, 'status' => 'Autorizada','fecha_autorizada' => date('Y-m-d h:i:s'));
    $this->Invoice->save($data);
		$this->Invoice->query("CALL stockFull($id)");
    $this->Session->setFlash('Se autorizó la factura '.$existe['Invoice']['folio'].' <br><br>hoy: '.date("Y-m-d h:i:s"),"flash_gadd");

  //   $mensaje="Se le notifica que la factura <b>". $id."</b>, fue Autorizada con Modificación.<br> Ya puede pasar por su requisición. <br> Tiene 15 días para recogerla en caso contrario se cancelara en automático.<br><br><a href='https://172.16.6.15/SIREQ/Invoices/view/".$id."' style='color:white; background:#638cb5; border:0px; width:80px; height:19px; padding:9px;'>Ir al sistema</a>";
  //   $body=$this->correo($mensaje);
 // 	 App::uses('CakeEmail', 'Network/Email');
 // 	 $email = new CakeEmail();
  //   $email->config('sireq');
 // 	 $email->from(array('sireq@htsjpuebla.gob.mx' => 'Sistema de Gestión de Requisiciones'));
 // 	 $email->to(array('carreon.emmanuel@gmail.com','esanchez@htsjpuebla.gob.mx'));
 // 	 $email->emailFormat('html');
 // 	 $email->subject('Contacto SIREQ');
 // 	 $email->send($body);
   }else echo $this->Session->setFlash('No se puede autorizar, verifique el proceso en el que se encuentra',"flash_error");
    $this->redirect(array('controller'=>'Invoices','action' => 'view',$id));
  }

	function autoCompletado() {
			$this->set('courses', $this->Invoice->find('all', array(
				  'recursive'=>-1,
					'conditions' => array(
						'folio LIKE '=> '%'.$this->request->query['term'].'%'
					),
					'fields' => array('id','folio')
					)));
			$this->layout = 'ajax';
		}

	function getData($id = null) {
		$this->Invoice->id = $id;
		if(!$this->Invoice->exists()):
			throw new NotFoundException(__('No existe el curso'));
		endif;
		$this->set('course', $this->Invoice->read(null, $id));
		$this->layout = 'ajax';
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Invoice->recursive = 0;
		// debug($this->Paginator->paginate());
		$this->paginate = array('limit' => 50,
           'page'  => 1,
           'order' => array('Invoice.fecha_registro' => 'desc'),
          // 'conditions' => array(
          //         'Invoice.id LIKE '=> '%'.$palabra.'%',
          //         'Invoice.folio LIKE '=> $user['htsjpjuzgado_id'].'%')
      );
		$this->set('almaceninvoices', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

 public function view($id = null) {
	 $user = $this->Auth->user();
	 if (!$this->Invoice->exists($id)) {
		 throw new NotFoundException(__('Invalid almacenInvoiceProduct'));
	 }
	 $options = array(
		 'conditions' => array('Invoice.' . $this->Invoice->primaryKey => $id),
		 'recursive'=>2
	 );

	 $this->Invoice->Provider->unbindModel(array('hasMany' => array('Invoice')));
	 $this->Invoice->InvoiceProduct->unbindModel(array('belongsTo' => array('Invoice')));
  //  $this->Invoice->unbindModel(array('hasOne' => array('Cheque','Dap','Plastico','Traspaso')));
	 $row=$this->Invoice->find('first', $options);
	//  debug($row);

	 $this->set(compact('row','user'));
 }


/**
 * add method
 *
 * @return void
 */
	public function add() {

		if ($this->request->is('post')) {
			$this->Invoice->create();
			if ($this->Invoice->saveAll($this->data, array('validate'=>'first'))) {
			// if ($this->Invoice->saveAll($this->request->data)) {
				$this->Session->setFlash(__('The almaceninvoice has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('La factura no se puede guardar. Por favor, intenta nuevamente','flash_error');
			}
		}
		$almacenproducts = $this->Invoice->InvoiceProduct->Product->find('list');
		$almacenproviders = $this->Invoice->Provider->find('list');
		$this->set(compact('almacenproducts', 'almacenproviders'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Invoice->exists($id)) {
			throw new NotFoundException(__('Invalid almaceninvoice'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Invoice->save($this->request->data)) {
				$this->Session->setFlash(__('The almaceninvoice has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The almaceninvoice could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Invoice.' . $this->Invoice->primaryKey => $id));
			$this->request->data = $this->Invoice->find('first', $options);
		}
		$almacenproducts = $this->Invoice->Product->find('list');
		$almacenproviders = $this->Invoice->Provider->find('list');
		$this->set(compact('almacenproducts', 'almacenproviders'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Invoice->id = $id;
		if (!$this->Invoice->exists()) {
			throw new NotFoundException(__('Invalid almaceninvoice'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Invoice->delete()) {
			$this->Session->setFlash(__('The almaceninvoice has been deleted.'));
		} else {
			$this->Session->setFlash(__('The almaceninvoice could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}

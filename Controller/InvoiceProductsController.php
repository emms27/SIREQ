<?php
App::uses('AppController', 'Controller');
/**
 * InvoiceProducts Controller
 *
 * @property InvoiceProduct $InvoiceProduct
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class InvoiceProductsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->InvoiceProduct->exists($id)) {
			throw new NotFoundException(__('Invalid almacenInvoiceProduct'));
		}
		$options = array(
			'conditions' => array('InvoiceProduct.' . $this->InvoiceProduct->primaryKey => $id),
			'recursive'=>2
		);
		$row=$this->InvoiceProduct->find('first', $options);
		debug($row);

		$this->set(compact('row'));
	}


	public function status($id = null) {
   $this->InvoiceProduct->id = $id;
   $this->InvoiceProduct->recursive=-1;
   $existe=$this->InvoiceProduct->findById($id);
   if ($existe['InvoiceProduct']['ver']==0) $ever=1; else $ever=0;
    $data = array('id' => $id, 'ver' => $ever);
    if ($this->InvoiceProduct->saveField('ver',$ever,array('validate' => 'only')))
     $this->Session->setFlash('Se ha modificado el status',"flash_add");
    $this->redirect(array('controller'=>'Invoices','action' => 'index'));
  }

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->InvoiceProduct->create();
			if ($this->InvoiceProduct->saveAll($this->data, array('validate'=>'first'))) {
			// if ($this->InvoiceProduct->saveAll($this->request->data)) {
				$this->Session->setFlash('Se agregó el producto a la factura','flash_add');
				return $this->redirect(array('controller'=>'Invoices','action' => 'view',$this->data['InvoiceProduct']['almaceninvoice_id']));
			} else {
				$this->Session->setFlash('El producto no se puede guardar a la factura. Por favor, intente nuevamente.','flash_error');
			}
		}
		$almacenproducts = $this->InvoiceProduct->Product->find('list');
		$almaceninvoices = $this->InvoiceProduct->Invoice->find('list');
		$this->set(compact('almacenproducts', 'almaceninvoices'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->InvoiceProduct->exists($id)) {
			throw new NotFoundException(__('Invalid almacenInvoiceProduct'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->InvoiceProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The almacenInvoiceProduct has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The almacenInvoiceProduct could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('InvoiceProduct.' . $this->InvoiceProduct->primaryKey => $id));
			$this->request->data = $this->InvoiceProduct->find('first', $options);
		}
		$almacenproducts = $this->InvoiceProduct->Product->find('list');
		$almacenproviders = $this->InvoiceProduct->Provider->find('list');
		$this->set(compact('almacenproducts', 'almacenproviders'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

 public function upmetrica($id = null) {
  $this->InvoiceProduct->id = $id;
  // $this->InvoiceProduct->unbindModel(array('belongsTo' => array('Product')));
  // $existe=$this->InvoiceProduct->find('first',
 // 						array(
 // 						'recursive'=>0,
 // 						'conditions' => array('InvoiceProduct.id'=>$id)
  // ));
  // if ($existe['Requisitio']['status']=="En proceso")
 	$this->InvoiceProduct->saveField('fmetrica',$this->data['Emmanuel']['titular']);
 }

 public function upcantidad($id = null) {
  $this->InvoiceProduct->id = $id;
  // $this->InvoiceProduct->unbindModel(array('belongsTo' => array('Product')));
  // $existe=$this->InvoiceProduct->find('first',
 // 						array(
 // 						'recursive'=>0,
 // 						'conditions' => array('InvoiceProduct.id'=>$id)
  // ));
  // if ($existe['Requisitio']['status']=="En proceso")
 	$this->InvoiceProduct->saveField('fcantidad',$this->data['Emmanuel']['cantidad']);
 }

 public function upprecio($id = null) {
  $this->InvoiceProduct->id = $id;
  // $this->InvoiceProduct->unbindModel(array('belongsTo' => array('Product')));
  // $existe=$this->InvoiceProduct->find('first',
 // 						array(
 // 						'recursive'=>0,
 // 						'conditions' => array('InvoiceProduct.id'=>$id)
  // ));
  // if ($existe['Requisitio']['status']=="En proceso")
 	$this->InvoiceProduct->saveField('fprecio',$this->data['Emmanuel']['precio']);
 }




}

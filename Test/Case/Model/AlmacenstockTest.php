<?php
App::uses('Almacenstock', 'Model');

/**
 * Almacenstock Test Case
 *
 */
class AlmacenstockTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.almacenstock',
		'app.almacenproduct',
		'app.almaceninvoice',
		'app.almacenrequisition',
		'app.almacenrequisitions_almacenstock'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Almacenstock = ClassRegistry::init('Almacenstock');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Almacenstock);

		parent::tearDown();
	}

}

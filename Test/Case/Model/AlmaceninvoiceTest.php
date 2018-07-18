<?php
App::uses('Almaceninvoice', 'Model');

/**
 * Almaceninvoice Test Case
 *
 */
class AlmaceninvoiceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.almaceninvoice',
		'app.almacenproducts',
		'app.almacenprovider'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Almaceninvoice = ClassRegistry::init('Almaceninvoice');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Almaceninvoice);

		parent::tearDown();
	}

}

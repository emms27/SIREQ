<?php
/**
 * AlmacenstockFixture
 *
 */
class AlmacenstockFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'almacenproduct_id' => array('type' => 'biginteger', 'null' => true, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'almaceninvoice_id' => array('type' => 'biginteger', 'null' => true, 'default' => null, 'unsigned' => true, 'key' => 'index'),
		'umetrica' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'uprecio' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '12,2', 'unsigned' => false, 'comment' => 'Precio unitario'),
		'notas' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ver' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 4, 'unsigned' => true),
		'fecha_registro' => array('type' => 'timestamp', 'null' => true, 'default' => null),
		'fecha_update' => array('type' => 'timestamp', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'almacenproduct_id' => array('column' => 'almacenproduct_id', 'unique' => 0),
			'almacenfactura_id' => array('column' => 'almaceninvoice_id', 'unique' => 0),
			'almacenproduct_id_2' => array('column' => 'almacenproduct_id', 'unique' => 0),
			'almacenfactura_id_2' => array('column' => 'almaceninvoice_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '',
			'almacenproduct_id' => '',
			'almaceninvoice_id' => '',
			'umetrica' => 'Lorem ipsum dolor sit amet',
			'uprecio' => '',
			'notas' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'ver' => 1,
			'fecha_registro' => 1521147181,
			'fecha_update' => 1521147181
		),
	);

}

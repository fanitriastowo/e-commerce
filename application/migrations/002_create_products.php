<?php 

class Migration_Create_products extends CI_Migration {

	public function up() {
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'category_id' => array(
				'type' => 'INT',
				'constraint' => '11'
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100'
			),
			'price' => array(
				'type' => 'DOUBLE'
			),
			'description' => array(
				'type' => 'TEXT'
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('PRODUCTS');
	}

	public function down() {
		$this->dbforge->drop_table('PRODUCTS');
	}
}
<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_categories extends CI_Migration {

	public function up() {
		/*$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100'
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('CATEGORIES');*/
		
		// code dibawah 100% sama dengan code diatas
		$query = "CREATE TABLE CATEGORIES (
				id INT(11) NOT NULL AUTO_INCREMENT,
				name VARCHAR(100) NOT NULL,
				PRIMARY KEY (id))";
		
		$this->db->query($query);
	}

	public function down() {
		$this->dbforge->drop_table('CATEGORIES');
	}
}
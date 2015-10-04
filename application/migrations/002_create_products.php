<?php 

class Migration_Create_products extends CI_Migration {

	public function up() {
		/*$this->dbforge->add_field(array(
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
		$this->dbforge->create_table('PRODUCTS');*/

		$query = "CREATE TABLE PRODUCTS (
				id INT(11) NOT NULL AUTO_INCREMENT,
				category_id INT(11),
				name VARCHAR(100) NOT NULL,
				price DOUBLE NOT NULL,
				description TEXT,
				PRIMARY KEY (id),
				KEY category_id (category_id),
				CONSTRAINT category_id_fk FOREIGN KEY (category_id)
				REFERENCES CATEGORIES (id))";
		$this->db->query($query);
	}

	public function down() {
		$this->dbforge->drop_table('PRODUCTS');
	}
}
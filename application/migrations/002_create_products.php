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
		$this->dbforge->create_table('products');*/

		$query = "CREATE TABLE `products` (
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				`category_id` INT(11),
				`name` VARCHAR(255) NOT NULL,
				`price` DOUBLE NOT NULL,
				`description` TEXT,
				`created` DATETIME,
				`filename` VARCHAR(100),
				PRIMARY KEY (id),
				KEY category_id (category_id),
				CONSTRAINT category_id_fk FOREIGN KEY (category_id)
				REFERENCES categories (id)
				ON DELETE CASCADE ON UPDATE NO ACTION
				)";

		$this->db->query($query);
	}

	public function down() {
		$this->dbforge->drop_table('products');
	}
}
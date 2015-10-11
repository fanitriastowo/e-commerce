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
				PRIMARY KEY (id),
				KEY category_id (category_id),
				CONSTRAINT category_id_fk FOREIGN KEY (category_id)
				REFERENCES categories (id)
				ON DELETE CASCADE ON UPDATE NO ACTION
				)";

		$insert_meja1 = "INSERT INTO `products` SET category_id=1, name='Meja Makan', price=800000, description='Meja makan merek Sunda.', created=NOW()";
		$insert_meja2 = "INSERT INTO `products` SET category_id=1, name='Meja Komputer', price=300000, description='Meja untuk komputer. ergonomic', created=NOW() - INTERVAL 1 DAY";

		$insert_kursi1 = "INSERT INTO `products` SET category_id=2, name='Kursi Ruang Tamu', price=450000, description='Kursi nyaman untuk ruang tamu', created=NOW() - INTERVAL 2 DAY";
		$insert_kursi2 = "INSERT INTO `products` SET category_id=2, name='Sofa Besar', price=1300000, description='Sofa nyaman cocok untuk ruang keluarga', created=NOW() - INTERVAL 3 DAY";

		$insert_lemari1 = "INSERT INTO `products` SET category_id=3, name='Lemari Buffet', price=2300000, description='Buffet tempat menyimpan accessories rumah', created=NOW() - INTERVAL 1 DAY";
		$insert_lemari2 = "INSERT INTO `products` SET category_id=3, name='Lemari Kaca', price=4000000, description='Lemari kaca cocok untuk tempat pakaian', created=NOW() - INTERVAL 2 DAY";

		$insert_kasur1 = "INSERT INTO `products` SET category_id=4, name='Kasur Anak', price=1200000, description='Kasur ukuran anak beragam motif', created=NOW() - INTERVAL 1 DAY";
		$insert_kasur2 = "INSERT INTO `products` SET category_id=4, name='Kasur Besar', price=2500000, description='Kasur ukuran besar untuk tidur 2 orang', created=NOW() - INTERVAL 3 DAY";

		$insert_set1 = "INSERT INTO `products` SET category_id=5, name='Kitchen Set', price=4500000, description='Kitchen Set lengkap', created=NOW() - INTERVAL 2 DAY";
		$insert_set2 = "INSERT INTO `products` SET category_id=5, name='Dinner Set', price=4500000, description='Meja Kursi lengkap untuk dinner. 1 Meja makan, 4 Kursi', created=NOW() - INTERVAL 3 DAY";

		$this->db->query($query);
		$this->db->query($insert_meja1);
		$this->db->query($insert_meja2);
		$this->db->query($insert_kursi1);
		$this->db->query($insert_kursi2);
		$this->db->query($insert_lemari1);
		$this->db->query($insert_lemari2);
		$this->db->query($insert_kasur1);
		$this->db->query($insert_kasur2);
		$this->db->query($insert_set1);
		$this->db->query($insert_set2);
	}

	public function down() {
		$this->dbforge->drop_table('products');
	}
}
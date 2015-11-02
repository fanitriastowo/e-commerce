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
		$this->dbforge->create_table('categories');*/
		
		// code dibawah 100% sama dengan code diatas
		$query = "
					
			CREATE TABLE `categories` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `name` varchar(100) NOT NULL,
			  `filename` varchar(100) DEFAULT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
			
		";

		$insert = "

			INSERT INTO `categories` VALUES (4,'Meja','1446084432Meja.jpg'),(5,'Kursi','1446126030Kursi.jpg'),(6,'Lemari','1446126588Lemari.jpg'),(7,'Special Set','1446126826Special_Set.jpg'),(8,'Tempat Tidur','1446127036Tempat_Tidur.jpg');
	
		";

		$this->db->query($query);
		$this->db->query($insert);
	}

	public function down() {
		$this->dbforge->drop_table('categories');
	}
}
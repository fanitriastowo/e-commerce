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
		$query = "CREATE TABLE `categories` (
				`id` INT(11) NOT NULL AUTO_INCREMENT,
				`name` VARCHAR(100) NOT NULL,
				`filename` VARCHAR(100),
				PRIMARY KEY (id))";

		$insert_meja = "INSERT INTO `categories` SET name='Kasur', filename='kasur.jpg'";
		$insert_kursi = "INSERT INTO `categories` SET name='Kursi', filename='kursi.jpg'";
		$insert_lemari = "INSERT INTO `categories` SET name='Lemari', filename='lemari.jpg'";
		$insert_kasur = "INSERT INTO `categories` SET name='Meja', filename='meja.jpg'";
		$insert_set = "INSERT INTO `categories` SET name='Special Set', filename='specialset.jpg'";
		
		$this->db->query($query);
		$this->db->query($insert_meja);
		$this->db->query($insert_kursi);
		$this->db->query($insert_lemari);
		$this->db->query($insert_kasur);
		$this->db->query($insert_set);
	}

	public function down() {
		$this->dbforge->drop_table('categories');
	}
}
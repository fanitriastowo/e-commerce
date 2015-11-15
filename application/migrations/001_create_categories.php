<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_categories extends CI_Migration {

	public function up() {
		
		$query = "
					
			CREATE TABLE categories(
			   id serial NOT NULL, 
			   name text NOT NULL, 
			   filename text,
			   CONSTRAINT categories_primary_key PRIMARY KEY (id)
			) WITH (
			  OIDS = FALSE
			);
			
		";

		$insert = "

			INSERT INTO categories (name, filename) VALUES 
				('Meja','Meja.jpg'),
				('Kursi','Kursi.jpg'),
				('Lemari','Lemari.jpg'),
				('Special Set','Special_Set.jpg'),
				('Tempat Tidur','Tempat_Tidur.jpg');
	
		";

		$this->db->query($query);
		$this->db->query($insert);
	}

	public function down() {
		$this->dbforge->drop_table('categories');
	}
}
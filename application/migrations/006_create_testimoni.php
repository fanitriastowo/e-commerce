<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_testimoni extends CI_Migration {
		
	public function up() {
		$query = "
			
			CREATE TABLE testimoni (
			  id serial NOT NULL,
			  name text NOT NULL,
			  email text NOT NULL,
			  pesan text NOT NULL,
			  kota varchar(100) NOT NULL,
			  created timestamp with time zone NOT NULL default (now() at time zone 'utc'),
			  CONSTRAINT testimoni_primary_key PRIMARY KEY (id)
			) WITH (
			  OIDS=FALSE
			);
		
		";

		$insert_query = "
			INSERT INTO testimoni (name, email, pesan, kota) VALUES
				('Fidzik', 'fidzik.fatiah@gmail.com', 'Terima kasih, barang yang saya pesan sudah diterima dan saya puas dengan pelayanan-nya', 'Purwokerto');
		
		";
		
		$this->db->query($query);
		$this->db->query($insert_query);
	}
	
	public function down() {
		$this->dbforge->drop_table('testimoni');
	}
}
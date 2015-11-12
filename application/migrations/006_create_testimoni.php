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
			  created time with time zone NOT NULL,
			  CONSTRAINT testimoni_primary_key PRIMARY KEY (id)
			) WITH (
			  OIDS=FALSE
			);
		
		";
		
		$this->db->query($query);
	}
	
	public function down() {
		$this->dbforge->drop_table('testimoni');
	}
}
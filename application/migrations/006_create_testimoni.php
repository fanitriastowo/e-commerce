<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_testimoni extends CI_Migration {
		
	public function up() {
		$query = "
			
			CREATE TABLE `testimoni` (
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `name` varchar(100) NOT NULL,
			  `email` varchar(100) NOT NULL,
			  `pesan` TEXT NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
		
		";
		
		$this->db->query($query);
	}
	
	public function down() {
		$this->dbforge->drop_table('testimoni');
	}
}
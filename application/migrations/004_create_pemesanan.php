<?php 

class Migration_Create_Pemesanan extends CI_Migration {

	public function up() {
		$query = "CREATE TABLE `pemesanan` (
				  `id` INT(11) NOT NULL AUTO_INCREMENT,
				  `unique_pemesanan` VARCHAR(45) NOT NULL,
				  `user_id` INT(11) UNSIGNED NOT NULL,
				  `created` DATETIME NOT NULL,
				  `status` VARCHAR(50) NOT NULL,
				  PRIMARY KEY (`id`),
				  KEY `fk_user_id_idx` (`user_id`),
				  	CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`)
				    REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION)";
		$this->db->query($query);
	}
	public function down() {
		$this->dbforge->drop_table('pemesanan');
	}
}
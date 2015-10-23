<?php 

class Migration_Create_Pemesanan extends CI_Migration {

	public function up() {
		$query = "CREATE TABLE `pemesanan` (
				  `id` INT(11) NOT NULL,
				  `pemesanan_id` VARCHAR(45) NOT NULL,
				  `user_id` INT(11) UNSIGNED NOT NULL,
				  `product_id` INT(11) NOT NULL,
				  `name` VARCHAR(100) NOT NULL,
				  `qty` INT(11) NOT NULL,
				  `price` BIGINT(15) NOT NULL,
				  `subtotal` BIGINT(15) NOT NULL,
				  PRIMARY KEY (`id`),
				  KEY `fk_user_id_idx` (`user_id`),
				  KEY `fk_product_id_idx` (`product_id`),
				  	CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`)
				    REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
				    CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`)
				    REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION)";
		$this->db->query($query);
	}
	public function down() {
		$this->dbforge->drop_table('pemesanan');
	}
}
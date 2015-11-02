<?php 

class Migration_Create_Pemesanan_Detail extends CI_Migration {

	public function up() {
		$query = "
			CREATE TABLE `pemesanan_detail` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`pemesanan_id` int(11) NOT NULL,
			`product_id` int(11) NOT NULL,
			`name` varchar(100) NOT NULL,
			`qty` int(11) NOT NULL,
			`price` bigint(15) NOT NULL,
			`subtotal` bigint(15) NOT NULL,
			PRIMARY KEY (`id`),
			KEY `fk_pemesanan_idx` (`pemesanan_id`),
			KEY `fk_product_id_idx` (`product_id`),
			CONSTRAINT `fk_pemesanan_id` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
			CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;
	";

		$this->db->query($query);
	}

	public function down() {
		$this->dbforge->drop_table('pemesanan_detail');
	}
}
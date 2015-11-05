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

		$query = "
			CREATE TABLE `products` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`category_id` int(11) DEFAULT NULL,
			`name` varchar(255) NOT NULL,
			`price` double NOT NULL,
			`description` text,
			`created` datetime DEFAULT NULL,
			`filename` varchar(100) DEFAULT NULL,
			PRIMARY KEY (`id`),
			KEY `category_id` (`category_id`),
			CONSTRAINT `category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
			) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
		";

		$insert = "
			INSERT INTO `products` VALUES (7,4,'Meja Komputer',700000,'','2015-10-29 08:37:21','1446088627Meja_Komputer.jpg'),(8,4,'Meja Komputer small',600000,'','2015-10-29 08:38:36','1446125916Meja_Komputer_small.jpg'),(9,4,'Meja Tulis Standart',450000,'','2015-10-29 08:39:29','1446125969Meja_Tulis_Standart.jpg'),(10,4,'Sofa Hello Kitty',3900000,'','2015-10-29 08:41:30','1446126090Sofa_Hello_Kitty.jpg'),(11,5,'Kursi Monaco Ganesha',8500000,'Spesial edition \r\nKursi MONACO GANESHA SUPER 3211+3\r\nKain oscar super .timbul.motif.','2015-10-29 08:46:43','1446126168Kursi_Monaco_Ganesha.jpg'),(12,5,'Sofa santai wenen',2500000,'','2015-10-29 08:46:24','1446126235Sofa_santai_wenen.jpg'),(13,5,'Sofa selonjoran baringan model recleaning',3000000,'1 set sofa multi fungsi.\r\nReady stock warna merah dan cokelat.\r\nGaransi 3tahun\r\nNb: tanpa meja.','2015-10-29 08:45:56','1446126356Sofa_selonjoran+baringan_model_recleaning.jpg'),(14,5,'Sofabed',2850000,'','2015-10-29 08:48:02','1446126482Sofabed.jpg'),(15,6,'Lemari almunium kombinasi kaca 4pintu',3700000,'Kanan kiri sap..tengah gantungan.','2015-10-29 08:50:16','1446126616Lemari_almunium_kombinasi_kaca_4pintu.jpg'),(16,6,'Buffet Pendek Alumunium',3000000,'','2015-10-29 08:52:04','1446126724Buffet_Pendek_Alumunium.jpg'),(17,7,'Sofa model L meja ',3250000,'Garansi 3 tahun.','2015-10-29 08:55:36','1446126936Sofa_model_L_+_meja_.jpg'),(18,7,'Sofa 221 merah meja kaca',4000000,'','2015-10-29 08:56:38','1446126998Sofa_221_merah_+_meja_kaca.jpg'),(19,8,'Matras elite plus top 160x200',2000000,'','2015-10-29 08:58:06','1446127086Matras_elite_plush_top_160x200.jpg'),(20,8,'Set Sorong anak Frozen',2450000,'Atas+bawah+sandaran. Ukuran 120x200.','2015-10-29 08:58:51','1446127131Set_Sorong_anak_Frozen.jpg');
		";

		$this->db->query($query);
		$this->db->query($insert);
	}

	public function down() {
		$this->dbforge->drop_table('products');
	}
}
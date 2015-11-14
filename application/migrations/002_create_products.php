<?php 

class Migration_Create_products extends CI_Migration {

	public function up() {

		$query = "
			CREATE TABLE products(
			  id serial NOT NULL,
			  category_id integer NOT NULL,
			  name text NOT NULL,
			  price bigint NOT NULL DEFAULT 0,
			  description text,
			  created time with time zone NOT NULL,
			  filename text,
			  stok integer NOT NULL DEFAULT 0,
			  CONSTRAINT products_primary_key PRIMARY KEY (id),
			  CONSTRAINT products_category_foreign_key FOREIGN KEY (category_id)
			  	REFERENCES categories (id) MATCH SIMPLE ON UPDATE NO ACTION ON DELETE CASCADE
			) WITH (
			  OIDS=FALSE
			);
		";

		$insert = "
			INSERT INTO products (category_id, name, price, description, created, filename, stok) VALUES 
				(1,'Meja Komputer',700000,'','2015-10-29 08:37:21','1446088627Meja_Komputer.jpg',5),
				(1,'Meja Komputer small',600000,'','2015-10-29 08:38:36','1446125916Meja_Komputer_small.jpg',5),
				(1,'Meja Tulis Standart',450000,'','2015-10-29 08:39:29','1446125969Meja_Tulis_Standart.jpg',5),
				(1,'Sofa Hello Kitty',3900000,'','2015-10-29 08:41:30','1446126090Sofa_Hello_Kitty.jpg',5),
				(2,'Kursi Monaco Ganesha',8500000,'Spesial edition \r\nKursi MONACO GANESHA SUPER 3211+3\r\nKain oscar super .timbul.motif.','2015-10-29 08:46:43','1446126168Kursi_Monaco_Ganesha.jpg',5),
				(2,'Sofa santai wenen',2500000,'','2015-10-29 08:46:24','1446126235Sofa_santai_wenen.jpg',5),
				(2,'Sofa selonjoran baringan model recleaning',3000000,'1 set sofa multi fungsi.\r\nReady stock warna merah dan cokelat.\r\nGaransi 3tahun\r\nNb: tanpa meja.','2015-10-29 08:45:56','1446126356Sofa_selonjoran+baringan_model_recleaning.jpg',5),
				(2,'Sofabed',2850000,'','2015-10-29 08:48:02','1446126482Sofabed.jpg',5),
				(3,'Lemari almunium kombinasi kaca 4pintu',3700000,'Kanan kiri sap..tengah gantungan.','2015-10-29 08:50:16','1446126616Lemari_almunium_kombinasi_kaca_4pintu.jpg',5),
				(3,'Buffet Pendek Alumunium',3000000,'','2015-10-29 08:52:04','1446126724Buffet_Pendek_Alumunium.jpg',5),
				(4,'Sofa model L meja ',3250000,'Garansi 3 tahun.','2015-10-29 08:55:36','1446126936Sofa_model_L_+_meja_.jpg',5),
				(4,'Sofa 221 merah meja kaca',4000000,'','2015-10-29 08:56:38','1446126998Sofa_221_merah_+_meja_kaca.jpg',5),
				(5,'Matras elite plus top 160x200',2000000,'','2015-10-29 08:58:06','1446127086Matras_elite_plush_top_160x200.jpg',5),
				(5,'Set Sorong anak Frozen',2450000,'Atas+bawah+sandaran. Ukuran 120x200.','2015-10-29 08:58:51','1446127131Set_Sorong_anak_Frozen.jpg',5);
		";

		$this->db->query($query);
		$this->db->query($insert);
	}

	public function down() {
		$this->dbforge->drop_table('products');
	}
}
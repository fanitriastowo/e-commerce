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
			  created timestamp with time zone NOT NULL,
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
				(1,'Meja Komputer',700000,'','2015-10-29 08:37:21','Meja_Komputer.jpg',5),
				(1,'Meja Komputer small',600000,'','2015-10-29 08:38:36','Meja_Komputer_small.jpg',5),
				(2,'Sofa santai',2500000,'','2015-10-29 08:46:24','Sofa_santai.jpg',5),
				(2,'Sofabed',2850000,'','2015-10-29 08:48:02','Sofabed.jpg',5),
				(3,'Lemari almunium kombinasi kaca 4pintu',3700000,'Kanan kiri sap..tengah gantungan.','2015-10-29 08:50:16','Lemari_almunium_kombinasi_kaca_4pintu.jpg',5),
				(3,'Buffet Pendek Alumunium',3000000,'','2015-10-29 08:52:04','Buffet_Pendek_Alumunium.jpg',5),
				(4,'Sofa model L meja ',3250000,'Garansi 3 tahun.','2015-10-29 08:55:36','Sofa_model_L_meja.jpg',5),
				(4,'Sofa 221 merah meja kaca',4000000,'','2015-10-29 08:56:38','Sofa_221_merah_meja_kaca.jpg',5),
				(5,'Matras elite plus top 160x200',2000000,'','2015-10-29 08:58:06','Matras_elite_plush_top.jpg',5),
				(5,'Set Sorong anak Hello Kitty',2450000,'Atas+bawah+sandaran. Ukuran 120x200.','2015-10-29 08:58:51','Set_Sorong_anak_Hello_Kitty.jpg',5);
		";

		$this->db->query($query);
		$this->db->query($insert);
	}

	public function down() {
		$this->dbforge->drop_table('products');
	}
}
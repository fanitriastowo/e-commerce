<?php 

class Migration_Create_Pemesanan_Detail extends CI_Migration {

	public function up() {
		$query = "
			CREATE TABLE pemesanan_detail (
				id serial NOT NULL,
				pemesanan_id integer NOT NULL,
				product_id integer NOT NULL,
				name text NOT NULL,
				qty integer NOT NULL,
				price bigint NOT NULL,
				subtotal bigint NOT NULL,

				CONSTRAINT pemesanan_detail_primary_key PRIMARY KEY (id),
				CONSTRAINT fk_pemesanan_id FOREIGN KEY (pemesanan_id) REFERENCES pemesanan (id) MATCH SIMPLE ON DELETE CASCADE ON UPDATE NO ACTION,
				CONSTRAINT fk_product_id FOREIGN KEY (product_id) REFERENCES products (id) MATCH SIMPLE ON DELETE CASCADE ON UPDATE NO ACTION
		) WITH (
			OIDS=FALSE
		);
	";

		$this->db->query($query);
	}

	public function down() {
		$this->dbforge->drop_table('pemesanan_detail');
	}
}
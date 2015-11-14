<?php 

class Migration_Create_Pemesanan extends CI_Migration {

	public function up() {
		$query = "
				CREATE TABLE pemesanan (
				id serial NOT NULL,
				unique_pemesanan varchar(45) NOT NULL,
				user_id integer NOT NULL,
				created timestamp with time zone NOT NULL,
				status varchar(50) NOT NULL,
				CONSTRAINT pemesanan_primary_key PRIMARY KEY (id),
				CONSTRAINT fk_pemesanan_users FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE ON UPDATE NO ACTION
			) WITH (
				OIDS=FALSE
			);
		";
		$this->db->query($query);
	}
	public function down() {
		$this->dbforge->drop_table('pemesanan');
	}
}
<?php 

class Migration_Create_users extends CI_Migration {

	public function up(){

		/*Create Table*/
		$group = "
			CREATE TABLE groups (
			  	id serial NOT NULL,
			  	name text NOT NULL,
			  	description text NOT NULL,
			  	CONSTRAINT groups_primary_key PRIMARY KEY (id)
			) WITH (
				OIDS=FALSE
			);
		";

		$user = "
			CREATE TABLE users (
		  		id serial NOT NULL,
				ip_address inet NOT NULL,
				username text NOT NULL,
				password text NOT NULL,
				salt varchar(40) DEFAULT NULL,
				email varchar(100) NOT NULL,
				activation_code varchar(40) DEFAULT NULL,
				forgotten_password_code varchar(40),
				forgotten_password_time integer,
				remember_code varchar(40),
				created_on integer NOT NULL,
				last_login integer,
				active int4,
				first_name text,
				last_name text,
				company text,
				phone varchar(20),
				address text,
				domisili varchar(100),
				photo varchar(100),
				CONSTRAINT users_primary_key PRIMARY KEY (id)
			) WITH (
				OIDS=FALSE
			);
		";
		
		$user_group = "
			CREATE TABLE users_groups (
				id serial NOT NULL,
				user_id integer NOT NULL,
				group_id integer NOT NULL,
				CONSTRAINT users_groups_primary_key PRIMARY KEY (id),
				CONSTRAINT fk_users_groups_groups FOREIGN KEY (group_id) REFERENCES groups (id) MATCH SIMPLE ON DELETE CASCADE ON UPDATE NO ACTION,
				CONSTRAINT fk_users_groups_users FOREIGN KEY (user_id) REFERENCES users (id) MATCH SIMPLE ON DELETE CASCADE ON UPDATE NO ACTION
			) WITH (
				OIDS=FALSE
			);
		";
		
		$login_attempts = "
			CREATE TABLE login_attempts (
				id serial NOT NULL,
				ip_address inet NOT NULL,
				login text NOT NULL,
				time integer,
				CONSTRAINT logins_attempts_primary_key PRIMARY KEY (id)
			) WITH (
				OIDS=FALSE
			);
		";

		/*Insert data*/
		$insert_group = "
			INSERT INTO groups VALUES (1,'admin','Administrator'),(2,'members','General User');
		";

		$insert_user = "
			INSERT INTO users 
				(ip_address, username, password, salt, email, activation_code, forgotten_password_code, forgotten_password_time, remember_code, created_on, last_login, active, first_name, last_name, company, phone, address, domisili, photo) 
				VALUES 
				('127.0.0.1','administrator','59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4','9462e8eee0','admin@admin.com','',NULL,NULL,NULL,1268889823,1446125747,1,'Admin','istrator','ADMIN','081542666676','Jalan Bhayangkara RT 02 RW 04 Desa Karangmangu Kroya',NULL, NULL);
		";
					
		$insert_user_group = "
			INSERT INTO users_groups (user_id, group_id) VALUES (1,1);
		";

		$this->db->query($group);
		$this->db->query($user);
		$this->db->query($user_group);
		$this->db->query($login_attempts);

		$this->db->query($insert_group);
		$this->db->query($insert_user);
		$this->db->query($insert_user_group);
	}
	public function down(){
		$this->dbforge->drop_table('groups');
		$this->dbforge->drop_table('users');
		$this->dbforge->drop_table('users_groups');
		$this->dbforge->drop_table('login_attempts');
	}
}
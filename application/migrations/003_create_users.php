<?php 

class Migration_Create_users extends CI_Migration {

	public function up(){

		/*Create Table*/
		$group = "
			CREATE TABLE `groups` (
		  	`id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
		  	`name` varchar(20) NOT NULL,
		  	`description` varchar(100) NOT NULL,
		  	PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
		";

		$user = "
				CREATE TABLE `users` (
		  		`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				`ip_address` varbinary(16) NOT NULL,
				`username` varchar(100) NOT NULL,
				`password` varchar(80) NOT NULL,
				`salt` varchar(40) DEFAULT NULL,
				`email` varchar(100) NOT NULL,
				`activation_code` varchar(40) DEFAULT NULL,
				`forgotten_password_code` varchar(40) DEFAULT NULL,
				`forgotten_password_time` int(11) unsigned DEFAULT NULL,
				`remember_code` varchar(40) DEFAULT NULL,
				`created_on` int(11) unsigned NOT NULL,
				`last_login` int(11) unsigned DEFAULT NULL,
				`active` tinyint(1) unsigned DEFAULT NULL,
				`first_name` varchar(50) DEFAULT NULL,
				`last_name` varchar(50) DEFAULT NULL,
				`company` varchar(100) DEFAULT NULL,
				`phone` varchar(20) DEFAULT NULL,
				`address` text,
				`photo` varchar(100) DEFAULT NULL,
				PRIMARY KEY (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
		";
		
		$user_group = "
			CREATE TABLE `users_groups` (
			`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			`user_id` int(11) unsigned NOT NULL,
			`group_id` mediumint(8) unsigned NOT NULL,
			PRIMARY KEY (`id`),
			UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
			KEY `fk_users_groups_users1_idx` (`user_id`),
			KEY `fk_users_groups_groups1_idx` (`group_id`),
			CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
			CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
			) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
		";
		
		$login_attempts = "
			CREATE TABLE `login_attempts` (
			`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			`ip_address` varbinary(16) NOT NULL,
			`login` varchar(100) NOT NULL,
			`time` int(11) unsigned DEFAULT NULL,
			PRIMARY KEY (`id`))
		";

		/*Insert data*/
		$insert_group = "
			INSERT INTO `groups` VALUES (1,'admin','Administrator'),(2,'members','General User');
		";

		$insert_user = "
			INSERT INTO `users` VALUES (1,'\0\0','administrator','59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4','9462e8eee0','admin@admin.com','',NULL,NULL,NULL,1268889823,1446125747,1,'Admin','istrator','ADMIN','081542666676','Jalan Bhayangkara RT 02 RW 04 Desa Karangmangu Kroya',NULL),(2,'\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0','Fani','d9ff9405655368d9d1218af99bb6e5e63be93682',NULL,'fani.triastowo@gmail.com',NULL,NULL,NULL,NULL,1446083221,1446083226,1,'Fani','Triastowo',NULL,'085747505359','Patikraja','1446779923.gif');
		";
					
		$insert_user_group = "INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES (1,1,1)";

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
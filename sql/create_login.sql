CREATE TABLE `login` (
	`id_user` INT(11) NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`password` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`nome` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id_user`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;

CREATE TABLE `cd` (
	`id_cd` INT(11) NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`artista` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`ano_lancamento` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`genero` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	`duracao` VARCHAR(45) NOT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id_cd`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=6
;

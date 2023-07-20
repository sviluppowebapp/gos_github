CREATE TABLE `magazzino` (
`id` INT( 50 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`prodotto` VARCHAR( 100 ) NOT NULL ,
`categoria` VARCHAR( 100 ) NOT NULL ,
`descrizione` VARCHAR( 100 ) NOT NULL ,
`prezzo` DECIMAL( 10, 2 ) NOT NULL ,
`quantita` INT( 50 ) NOT NULL ,
`marca` CHAR( 50 ) NOT NULL ,
`produttore` VARCHAR( 100 ) NOT NULL
) ENGINE = MYISAM ;

CREATE TABLE `produttori` (
`id` INT( 50 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`produttore` VARCHAR( 100 ) NOT NULL ,
`telefono` MEDIUMINT( 100 ) NOT NULL ,
`email` VARCHAR( 100 ) NOT NULL
) ENGINE = MYISAM ;
CREATE DATABASE inmobiliaria_malibu;
USE inmobiliaria_malibu;

CREATE TABLE inmobiliaria_malibu.Users(
	`id` INT AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `document` VARCHAR(15) NOT NULL,
    `cellphone` VARCHAR(15) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `username`VARCHAR(50) NOT NULL,
    `password` VARCHAR(500) NOT NULL,
    PRIMARY KEY (`id`)
)ENGINE = InnoDB;

CREATE TABLE inmobiliaria_malibu.Countries(
	`id` INT AUTO_INCREMENT NOT NULL,
    `country` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`)
)ENGINE = InnoDB;

CREATE TABLE inmobiliaria_malibu.Type_properties(
	`id`INT AUTO_INCREMENT NOT NULL,
    `type` VARCHAR(11) NOT NULL,
    PRIMARY KEY (`id`)
)ENGINE = InnoDB;

CREATE TABLE inmobiliaria_malibu.Cities(
	`id` INT AUTO_INCREMENT NOT NULL,
    `id_countries` INT NOT NULL,
    `city` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_countries`) REFERENCES `Countries`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE = InnoDB;

CREATE TABLE inmobiliaria_malibu.Architects(
	`id` INT AUTO_INCREMENT NOT NULL,
    `id_countries` INT NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_countries`) REFERENCES `Countries`(`id`) ON DELETE NO ACTION ON UPDATE CASCADE
)ENGINE = InnoDB;

CREATE TABLE inmobiliaria_malibu.Neighborhood(
	`id` INT AUTO_INCREMENT NOT NULL,
    `id_cities` INT NOT NULL,
    `neighborhood`VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_cities`) REFERENCES `Cities`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE = InnoDB;

CREATE TABLE inmobiliaria_malibu.Properties(
	`id` INT NOT NULL AUTO_INCREMENT,
    `id_type_properties` INT,
    `id_users` INT,
    `id_architects` INT,
    `id_neighborhood` INT,
    `measures`VARCHAR(13) NOT NULL,
    `designe` VARCHAR(200),
    `price` DOUBLE(11,2) NOT NULL,
    `image_1`VARCHAR(500) NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_type_properties`) REFERENCES `type_properties`(`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (`id_users`) REFERENCES `users`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`id_architects`) REFERENCES `architects`(`id`) ON DELETE SET NULL ON UPDATE CASCADE,
    FOREIGN KEY (`id_neighborhood`) REFERENCES `neighborhood`(`id`) ON DELETE SET NULL ON UPDATE CASCADE
)ENGINE = InnoDB;

CREATE TABLE inmobiliaria_malibu.Invoice(
	`id` INT NOT NULL AUTO_INCREMENT,
    `id_users` INT NOT NULL,
    `id_properties`INT NOT NULL,
    `date` DATE NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`id_users`) REFERENCES `users`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`id_properties`) REFERENCES `properties`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE = InnoDB;

SELECT * FROM properties;
-- ALTER TABLE type_properties  MODIFY `type` VARCHAR(11) NOT NULL;
-- ALTER TABLE properties  MODIFY `designe` VARCHAR(200);
-- DROP DATABASE inmobiliaria_malibu;

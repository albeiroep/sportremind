CREATE TABLE usuario (
	id               	INT UNSIGNED NOT NULL AUTO_INCREMENT,
	nombre           	VARCHAR(30)  NOT NULL,
	apellidos        	VARCHAR(40)  NOT NULL,
	deporte          	VARCHAR(30)  NOT NULL,
	ciudad           	VARCHAR(50)  NOT NULL,
	correo           	VARCHAR(50)  NOT NULL,
	nombre_usuario   	VARCHAR(50)  NOT NULL,
	contraseña       	VARCHAR(50)  NOT NULL,
	PRIMARY KEY (id)

) ENGINE = InnoDB;

CREATE TABLE deporte (
	nombre           	VARCHAR(30)  NOT NULL,
	tipo_deporte        VARCHAR(40)  NOT NULL,
	PRIMARY KEY (nombre)

) ENGINE = InnoDB;


INSERT INTO deporte VALUES ('Ciclismo', 'Individual');
INSERT INTO deporte VALUES ('Atletismo', 'Individual');
INSERT INTO deporte VALUES ('Natación', 'Acuático');
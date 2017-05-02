CREATE TABLE usuario (
	id               	INT UNSIGNED NOT NULL AUTO_INCREMENT,
	nombre           	VARCHAR(30)  NOT NULL,
	apellidos        	VARCHAR(40)  NOT NULL,
	deporte          	VARCHAR(30)  NOT NULL,
	ciudad           	VARCHAR(50)  NOT NULL,
	correo           	VARCHAR(50)  NOT NULL,
	nombre_usuario   	VARCHAR(50)  NOT NULL,
	contraseña       	VARCHAR(50)  NOT NULL,
	olvidoContrasenia	INT(11),
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

CREATE TABLE entrenamiento (
	id               	INT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_usuario 		 	INT(2) 		NOT NULL,
	nombre           	VARCHAR(20) NOT NULL,
	duracion     		INT(10)  	NOT NULL,
	calorias_perdidas   INT(5)  	NOT NULL,
	lugar				INT(5) 		NOT NULL,
	imagen 				VARCHAR(20),
	PRIMARY KEY (id),
	CONSTRAINT id_usuario FOREIGN KEY (id_usuario) REFERENCES usuario (id)
	ON DELETE CASCADE ON UPDATE CASCADE,
) ENGINE = InnoDB;
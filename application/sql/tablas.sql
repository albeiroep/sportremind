CREATE TABLE usuario (

	nombre           	VARCHAR(30)  NOT NULL,
	apellidos        	VARCHAR(40)  NOT NULL,
	deporte          	VARCHAR(15)  NOT NULL,
	ciudad           	VARCHAR(50)  NOT NULL,
	correo           	VARCHAR(50)  NOT NULL,
	nombre_usuario   	VARCHAR(50)  NOT NULL,
	contraseña       	VARCHAR(50)  NOT NULL,
	repetir_contraseña  VARCHAR(50)  NOT NULL,
	PRIMARY KEY (nombre_usuario),

) ENGINE = InnoDB;

CREATE TABLE deporte (

	nombre           	VARCHAR(30)  NOT NULL,
	tipo_deporte        VARCHAR(40)  NOT NULL,
	PRIMARY KEY (nombre_usuario),

) ENGINE = InnoDB;
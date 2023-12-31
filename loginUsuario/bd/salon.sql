CREATE TABLE `local_wondersv`.`salones` (
  `id` INT(15) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(50) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `nombre` VARCHAR(50) NOT NULL,
  `eslogan` VARCHAR(50) NOT NULL,
  `correo` VARCHAR(50) NOT NULL,
  `descripcion` VARCHAR(100) NOT NULL,
  `departamento` VARCHAR(50) NOT NULL,
  `municipio` VARCHAR(50) NOT NULL,
  `telefono` VARCHAR(9) NOT NULL,
  `direccion` LONGTEXT NOT NULL,
  `logos` LONGTEXT NOT NULL,
  `imagenes` LONGTEXT NOT NULL,
  `servicios` LONGTEXT NOT NULL,
  PRIMARY KEY (`id`));
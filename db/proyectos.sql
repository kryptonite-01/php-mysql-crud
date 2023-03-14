CREATE DATABASE `proyectos`;

USE `proyectos`;

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DESCRIBE `proyectos`;
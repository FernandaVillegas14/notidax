-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.36 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para notidax
CREATE DATABASE IF NOT EXISTS `notidax` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;
USE `notidax`;

-- Volcando estructura para tabla notidax.carrusel_images
CREATE TABLE IF NOT EXISTS `carrusel_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla notidax.carrusel_images: 4 rows
/*!40000 ALTER TABLE `carrusel_images` DISABLE KEYS */;
INSERT INTO `carrusel_images` (`id`, `image_path`, `caption`) VALUES
	(1, 'beautiful-701678_1280.jpg', 'si1'),
	(2, 'sliderVILLA.jpg', 'si2'),
	(3, 'REGLAMENTO DE ESTUDIANTES.jpeg', 'si3'),
	(4, '1.jpg', 'si4');
/*!40000 ALTER TABLE `carrusel_images` ENABLE KEYS */;

-- Volcando estructura para tabla notidax.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Volcando datos para la tabla notidax.roles: ~2 rows (aproximadamente)
INSERT INTO `roles` (`id`, `rol`) VALUES
	(0, 'Normal'),
	(1, 'Admin');

-- Volcando estructura para tabla notidax.tblcategory
CREATE TABLE IF NOT EXISTS `tblcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(200) DEFAULT NULL,
  `Description` mediumtext,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla notidax.tblcategory: ~7 rows (aproximadamente)
INSERT INTO `tblcategory` (`id`, `CategoryName`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
	(7, 'Ventas', 'Noticias de Ventas', '2018-06-22 15:46:22', '2022-11-16 18:43:44', 1),
	(14, 'Juegosmvfjshv', 'Aqui va de jueguitossisis', '2022-11-13 22:03:40', '2022-11-16 18:43:44', 1),
	(15, 'Noticias ITVH', 'Lo mÃ¡s relevante del instituto', '2023-04-10 21:02:32', NULL, 1),
	(16, 'Informacion academica', 'EntÃ©rate de lo que pasa en el Tecnologico ', '2023-04-10 21:04:25', NULL, 1),
	(17, 'Vida estudiantil', 'relacionado con los mismos alumnos del ITVH', '2023-04-10 21:05:17', NULL, 1),
	(18, 'Comunidad ITVH', 'noticias de los estudiantes', '2023-04-10 21:06:24', NULL, 1),
	(19, 'Opiniones ', 'puedes dar tu punto de vista de cosas del instituto', '2023-04-10 21:06:58', NULL, 1);

-- Volcando estructura para tabla notidax.tblcomments
CREATE TABLE IF NOT EXISTS `tblcomments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postId` char(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comment` mediumtext,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla notidax.tblcomments: ~11 rows (aproximadamente)
INSERT INTO `tblcomments` (`id`, `postId`, `name`, `email`, `comment`, `postingDate`, `status`) VALUES
	(1, '12', 'Anuj', 'anuj@gmail.com', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.', '2018-11-21 11:06:22', 0),
	(2, '12', 'Test user', 'test@gmail.com', 'This is sample text for testing.', '2018-11-21 11:25:56', 1),
	(3, '7', 'ABC', 'abc@test.com', 'This is sample text for testing.', '2018-11-21 11:27:06', 1),
	(5, '10', 'jose', 'dgufsdhfgsjgfshsfd@gmail.com', 'fgfksjhglsdglskdfblsdjfkjsf', '2022-11-15 16:19:08', 1),
	(6, '22', 'Dax', 'dax@gmail.com', 'descabellado el partido', '2022-11-16 15:34:58', 1),
	(7, '22', 'Ludo', 'ludi@gmail.com', 'Aaaaa el equipo contrario se paso', '2022-11-16 15:37:09', 1),
	(8, '22', 'Simon', 'simn@gmai.com', 'Pasasdo', '2022-11-16 15:38:15', 0),
	(9, '31', 'Jose Mario', 'joshpero@gmail.com', 'Muy interesante la platica!!!', '2023-04-10 22:59:34', 1),
	(10, '31', 'Gerardo', 'gerrararara@gmail.com', 'Genial muy informativo!!', '2023-04-10 23:00:29', 1),
	(11, '31', 'HAte', 'sasasasasasmalo@gmail.com', 'PÃ©simo como hacia calor', '2023-04-10 23:01:05', 0),
	(12, '31', 'jesus', 'jesus@gmail.com', 'estuvo padre', '2023-05-18 20:36:41', 0);

-- Volcando estructura para tabla notidax.tblpages
CREATE TABLE IF NOT EXISTS `tblpages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `PageName` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext,
  `Description` longtext,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla notidax.tblpages: ~2 rows (aproximadamente)
INSERT INTO `tblpages` (`id`, `PageName`, `PageTitle`, `Description`, `PostingDate`, `UpdationDate`) VALUES
	(1, 'aboutus', 'Aqui va titulo', '<font color="#7b8898" face="Mercury SSm A, Mercury SSm B, Georgia, Times, Times New Roman, Microsoft YaHei New, Microsoft Yahei, å¾®è½¯é›…é»‘, å®‹ä½“, SimSun, STXihei, åŽæ–‡ç»†é»‘, serif"><span style="font-size: 26px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></font><br>', '2018-06-30 18:01:03', '2023-05-19 13:58:46'),
	(2, 'contactus', 'Contact Details', '<p><br></p><p><b>Address :&nbsp; </b>New Delhi India</p><p><b>Phone Number : </b>+91 -01234567890</p><p><b>Email -id : </b>phpgurukulofficial@gmail.com</p>', '2018-06-30 18:01:36', '2018-06-30 19:23:25');

-- Volcando estructura para tabla notidax.tblposts
CREATE TABLE IF NOT EXISTS `tblposts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `PostTitle` longtext,
  `CategoryId` int(11) DEFAULT NULL,
  `SubCategoryId` int(11) DEFAULT NULL,
  `PostDetails` longtext CHARACTER SET utf8,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Is_Active` int(1) DEFAULT NULL,
  `PostUrl` mediumtext,
  `PostImage` varchar(255) DEFAULT NULL,
  `fkUser` int(11) DEFAULT NULL,
  `nombreUser` varchar(255) DEFAULT NULL,
  `userImagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fkUser` (`fkUser`),
  CONSTRAINT `FK_tblposts_usuarios` FOREIGN KEY (`fkUser`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla notidax.tblposts: ~9 rows (aproximadamente)
INSERT INTO `tblposts` (`id`, `PostTitle`, `CategoryId`, `SubCategoryId`, `PostDetails`, `PostingDate`, `UpdationDate`, `Is_Active`, `PostUrl`, `PostImage`, `fkUser`, `nombreUser`, `userImagen`) VALUES
	(22, 'Partido ', 18, 15, '<h1 style="text-align:center"><span style="font-size:72px"><span style="color:#f1c40f"><strong><span style="font-family:Comic Sans MS,cursive">Partido</span></strong></span><span style="font-size:48px"> </span><span style="font-family:Courier New,Courier,monospace"><em><strong><span style="color:#c0392b">roto</span></strong></em></span></span></h1>\r\n\r\n<p style="text-align:center"><span style="font-size:72px"><span style="font-family:Courier New,Courier,monospace"><em><strong><span style="color:#c0392b"><input alt="" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1e/Altardediademuertos.jpg/250px-Altardediademuertos.jpg" type="image" /></span></strong></em></span></span></p>\r\n\r\n<figure class="easyimage easyimage-full"><img alt="" src="blob:http://localhost/admin/postimages/ejemplo.png" width="1250" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p><span style="font-family:Courier New,Courier,monospace"><span style="font-size:26px">Si, en el partido de hoy un wey casi se muere por romperse la pierna, el quizo seguir pero el dolor no le dejo.&nbsp;</span></span></p>\r\n\r\n<p><span style="font-family:Courier New,Courier,monospace"><span style="font-size:26px">Dijo es mi camino ninja, y pos nel no pudo. luego recordo a Asta de black clover y vio que se esforzo en nunca rendirse aunque no tuviera magia.</span></span></p>\r\n\r\n<p><span style="font-family:Courier New,Courier,monospace"><span style="font-size:26px">Al final esto es la vida real y no paso nada.</span></span></p>\r\n', '2022-11-16 15:31:06', '2023-04-19 04:20:04', 1, 'Partido-', 'f4d5b97cb969b4741b84b56f1ba498e6.jpg', 2, 'Dax', 'rodrigo.jpeg'),
	(24, 'La Escolta del Instituto TecnolÃ³gico de Villahermosa fue reconocida en el 2Â° Concurso de bandas de guerras y escolta de bandera "Frontera 2023"', 18, 20, '<p>#TecNMCampusVillahermosaInforma</p>\r\n\r\n<h2><span style="font-size:22px"><strong>La Escolta del Instituto Tecnol&oacute;gico de Villahermosa fue reconocida por su destacada participaci&oacute;n en el 2&deg; Concurso de bandas de guerras y escolta de bandera &quot;Frontera 2023&quot;</strong></span></h2>\r\n\r\n<p><span style="font-size:18px">El evento tuvo lugar el s&aacute;bado 8 de abril en el parque central Quint&iacute;n Ar&aacute;uz del puerto de Frontera, Centla, Tabasco.</span></p>\r\n\r\n<p style="text-align:center"><span style="font-size:18px"><input alt="" src="https://i.imgur.com/zGFBbqN.jpeg" style="height:321px; width:480px" type="image" /></span></p>\r\n\r\n<p><span style="font-size:18px">El concurso cont&oacute; con la participaci&oacute;n de diversas instituciones p&uacute;blicas, privadas y libres de los estados de Veracruz, Tabasco, Campeche, Chiapas, Yucat&aacute;n, Quintana Roo, Oaxaca y estado de M&eacute;xico. El objetivo del evento fue fomentar en las nuevas generaciones el amor, el respeto y la admiraci&oacute;n hacia los s&iacute;mbolos patrios.</span></p>\r\n\r\n<p style="text-align:center"><span style="font-size:18px"><input alt="" src="https://i.imgur.com/vTZb88p.jpeg" style="height: 321px; width: 480px;" type="image" /></span></p>\r\n\r\n<p><span style="font-size:18px">La Escolta del Instituto Tecnol&oacute;gico de Villahermosa demostr&oacute; un alto nivel de disciplina y profesionalismo durante su presentaci&oacute;n. Los miembros de la escolta recibieron elogios por parte del jurado y del p&uacute;blico presente.</span></p>\r\n\r\n<p><span style="font-size:18px"><input alt="" src="https://i.imgur.com/yXcmGJG.jpeg" style="height:241px; width:360px" type="image" /></span></p>\r\n\r\n<h3><span style="color:#ecf0f1"><span style="background-color:#3498db">#TodosSomosTecNM</span></span></h3>\r\n', '2023-04-10 22:19:05', '2023-04-17 23:04:32', 1, 'La-Escolta-del-Instituto-TecnolÃ³gico-de-Villahermosa-fue-reconocida-en-el-2Â°-Concurso-de-bandas-de-guerras-y-escolta-de-bandera-"Frontera-2023"', '149429a892e0871d681c93314fef0d69.jpg', 1, 'operador', 'javier.jpg'),
	(25, 'Caudillo del Sur', 18, 19, '<p>&nbsp;</p>\r\n\r\n<h1><strong><span style="font-size:28px">Emiliano Zapata: El Caudillo del Sur</span></strong></h1>\r\n\r\n<p><span style="font-size:18px">Hablar del Caudillo del Sur es evocar un momento trascendental en la historia de M&eacute;xico, un momento en el que la lucha por la justicia y la igualdad se hizo presente con fuerza. Emiliano Zapata, el Caudillo del Sur, se levant&oacute; en armas en contra de la injusticia y la opresi&oacute;n que azotaban a su pa&iacute;s. Luch&oacute; por los derechos de los campesinos, quienes eran explotados y marginados por el sistema pol&iacute;tico y econ&oacute;mico de la &eacute;poca.</span></p>\r\n\r\n<p style="text-align:center"><span style="font-size:18px"><input alt="" src="https://i.imgur.com/MBThLCQ.jpeg" style="width: 480px; height: 573px;" type="image" /></span></p>\r\n\r\n<p><span style="font-size:18px">Zapata encabez&oacute; el movimiento agrario m&aacute;s importante de la Revoluci&oacute;n Mexicana, conocido como el Zapatismo, cuyo objetivo era la restituci&oacute;n de las tierras que hab&iacute;an sido arrebatadas a los campesinos. Su lucha no solo era por la propiedad de la tierra, sino tambi&eacute;n por la dignidad y la libertad de los campesinos, quienes eran tratados como siervos y no ten&iacute;an voz ni voto en el gobierno.</span></p>\r\n\r\n<p style="text-align:center"><span style="font-size:18px"><input alt="" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Emiliano_Zapata4.jpg/220px-Emiliano_Zapata4.jpg" style="width: 220px; height: 301px;" type="image" /></span></p>\r\n\r\n<p><span style="font-size:18px">El Caudillo del Sur tambi&eacute;n fue un defensor de los derechos de los obreros de las ciudades, quienes sufr&iacute;an las mismas condiciones de explotaci&oacute;n que los campesinos. Zapata luch&oacute; por mejorar las condiciones laborales de los trabajadores, quienes eran sometidos a largas jornadas de trabajo sin una remuneraci&oacute;n justa.</span></p>\r\n\r\n<p><span style="font-size:18px">El legado de Emiliano Zapata sigue vivo en M&eacute;xico y en todo el mundo, como un s&iacute;mbolo de la lucha por la justicia social y la libertad. Su ejemplo ha inspirado a generaciones de luchadores sociales y pol&iacute;ticos, y su nombre se sigue mencionando en las batallas m&aacute;s profundas del pueblo mexicano. La memoria del Caudillo del Sur es un recordatorio constante de que la lucha por la justicia y la igualdad es una tarea inacabada, y que a&uacute;n queda mucho por hacer para alcanzar una sociedad m&aacute;s justa y equitativa.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n', '2023-04-10 22:31:33', '2023-04-17 23:04:56', 1, 'Caudillo-del-Sur', 'ce5744fffa1c8932c0a17e2fd0eea43e.jpg', 2, 'Dax', 'rodrigo.jpeg'),
	(26, 'El Repositorio Institucional del #TecNM', 18, 20, '<p>#OrgulloTecNM<br />\r\n<span style="font-size:26px"><strong>El Repositorio Institucional del #TecNM</strong></span></p>\r\n\r\n<p><span style="font-size:20px">es la plataforma digital de acceso abierto a recursos de informaci&oacute;n acad&eacute;mica, cient&iacute;fica y tecnol&oacute;gica para almacenar, preservar y divulgar nuestra producci&oacute;n cient&iacute;fico-acad&eacute;mica, interoperable con el Repositorio Nacional del Consejo Nacional de Ciencia y Tecnolog&iacute;a (CONACYT).&nbsp;</span></p>\r\n\r\n<p style="text-align:center"><span style="font-size:20px"><input alt="" src="https://i.imgur.com/4c5fWWP.jpeg" style="width: 720px; height: 405px;" type="image" /></span></p>\r\n\r\n<p><span style="font-size:20px">Con una media de 1,585 usuarios diarios, destacan las visitas de pa&iacute;ses como Estados Unidos, Pa&iacute;ses Bajos, Alemania, Espa&ntilde;a, China y Suiza, confirmando que, en el escenario internacional, el RI-TecNM se va posicionando exitosamente .&nbsp;</span></p>\r\n\r\n<p><span style="font-size:20px">&iexcl;Conoce aqu&iacute; su material! ðŸ‘‰ bit.ly/4300ISF</span></p>\r\n\r\n<p><span style="font-size:20px">#OrgulloTecNM</span></p>\r\n', '2023-04-10 22:33:53', '2023-04-17 23:04:39', 1, 'El-Repositorio-Institucional-del-#TecNM', '49498721c41b2e07ee78ae0ab4d5bfa6.jpg', 1, 'operador', 'javier.jpg'),
	(27, 'Primer Simulacro Nacional 2023', 15, 12, '<p><span style="font-size:24px">#TecNMCampusVillahermosaInforma I El pr&oacute;ximo 19 de abril, a las 11:00 horas, se llevar&aacute; a cabo el Primer Simulacro Nacional 2023 ðŸ”Š, el cual contribuir&aacute; a mejorar nuestra capacidad de respuesta ante una emergencia.<br />\r\n&iexcl;Participa!<br />\r\n#LaPrevenci&oacute;nEsNuestraFuerza</span></p>\r\n', '2023-04-10 22:35:00', '2023-04-17 23:04:52', 1, 'Primer-Simulacro-Nacional-2023', '9c9fd63554e1b969aaab813b78dd9652.jpg', 4, 'Mario', 'Captura de pantalla (270).png'),
	(28, 'CONVOCATORIA ASPIRANTES A NUEVO INGRESO', 15, 11, '<p><strong><span style="font-size:26px">LES COMPARTIMOS LA CONVOCATORIA OFICIAL PARA ASPIRANTES A NUEVO INGRESO&nbsp;<br />\r\nSEMESTRE AGOSTO-DICIEMBRE 2023</span></strong></p>\r\n\r\n<p style="text-align:center"><strong><span style="font-size:26px"><input alt="" src="https://i.imgur.com/jsySzJn.jpeg" style="width: 720px; height: 931px;" type="image" /></span></strong></p>\r\n\r\n<p style="text-align:center"><strong><span style="font-size:26px"><input alt="" src="https://i.imgur.com/Fw2KTJc.jpeg" style="width: 720px; height: 931px;" type="image" /></span></strong></p>\r\n\r\n<p style="text-align:center"><strong><span style="font-size:26px"><input alt="" src="https://i.imgur.com/XpMaeCV.jpeg" style="width: 720px; height: 931px;" type="image" /><input alt="" src="https://i.imgur.com/doL9EG5.jpeg" style="width: 720px; height: 931px;" type="image" /></span></strong></p>\r\n', '2023-04-10 22:37:46', '2023-04-17 23:04:48', 1, 'CONVOCATORIA-ASPIRANTES-A-NUEVO-INGRESO', '0408e7b260ba084e250090a83718ff65.jpg', 2, 'Dax', 'rodrigo.jpeg'),
	(29, '#ComunidadTecNM La bioÃ©tica debe estar presente en la cotidianidad de la vida.', 15, 12, '<p><strong><span style="font-size:26px">#ComunidadTecNM La bio&eacute;tica debe estar presente en la cotidianidad de la vida.</span></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:20px">La bio&eacute;tica es una disciplina que se ocupa de estudiar las implicaciones &eacute;ticas y morales de los avances cient&iacute;ficos y tecnol&oacute;gicos en el &aacute;mbito de la salud y la biolog&iacute;a. Se trata de una rama de la &eacute;tica que se enfoca en la toma de decisiones relacionadas con temas como la experimentaci&oacute;n con seres humanos, la clonaci&oacute;n, la manipulaci&oacute;n gen&eacute;tica, el aborto, la eutanasia y la muerte asistida, entre otros.</span></p>\r\n\r\n<p style="text-align:center"><span style="font-size:20px"><input alt="" src="https://www.anahuac.mx/mexico/EscuelasyFacultades/bioetica//sites/default/files/gbb-uploads/Dia_mundial_Bioetica_mundo1-zmk8su.png" style="height:491px; width:730px" type="image" /></span></p>\r\n\r\n<p><span style="font-size:20px">La bio&eacute;tica se preocupa por analizar y resolver los conflictos &eacute;ticos que surgen en la relaci&oacute;n entre la ciencia, la tecnolog&iacute;a y la sociedad, buscando siempre garantizar el respeto a la dignidad y los derechos de las personas involucradas en los procesos m&eacute;dicos y biol&oacute;gicos.</span></p>\r\n\r\n<p><span style="font-size:20px"><input alt="" src="https://www.uanl.mx/wp-content/uploads/2022/06/bioetica.jpeg" style="height:270px; width:480px" type="image" /></span></p>\r\n\r\n<p><span style="font-size:20px">Para ello, la bio&eacute;tica utiliza diferentes herramientas, como la reflexi&oacute;n &eacute;tica, la deliberaci&oacute;n y el di&aacute;logo interdisciplinario, y se apoya en principios &eacute;ticos fundamentales como la autonom&iacute;a, la beneficencia, la no maleficencia y la justicia.</span></p>\r\n', '2023-04-10 22:41:51', '2023-04-17 23:04:44', 1, '#ComunidadTecNM-La-bioÃ©tica-debe-estar-presente-en-la-cotidianidad-de-la-vida.', 'b9d8cb3c6e8ad5995546c5e5ec0a19a6.jpg', 1, 'operador', 'javier.jpg'),
	(30, 'La direcciÃ³n del Instituto TecnolÃ³gico de Villahermosa travÃ©s de la SubdirecciÃ³n AcadÃ©mica en coordinaciÃ³n con el departamento de GestiÃ³n TecnolÃ³gica y VinculaciÃ³n, el Instituto Mexicano de la Propiedad Intelectual (IMPI) y el Consejo de Ciencia y TecnologÃ­a del Estado de Tabasco (CCYTET)', 18, 19, '<p><span style="font-size:28px"><strong>#TecNMCampusVillahermosaInforma | La direcci&oacute;n del Instituto Tecnol&oacute;gico de Villahermosa trav&eacute;s de la Subdirecci&oacute;n Acad&eacute;mica en coordinaci&oacute;n con el departamento de Gesti&oacute;n Tecnol&oacute;gica y Vinculaci&oacute;n, el Instituto Mexicano de la Propiedad Intelectual (IMPI) y el Consejo de Ciencia y Tecnolog&iacute;a del Estado de Tabasco (CCYTET)</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:22px">llevaron a cabo la pl&aacute;tica &ldquo;Protege tu creatividad: Conoce el sistema de propiedad industrial en M&eacute;xico&rdquo;, en la Sala Magna del Centro de Incubaci&oacute;n de este Instituto.<br />\r\nLa pl&aacute;tica fue impartida por la Lic. Ana Mar&iacute;a Monserrat P&eacute;rez Calder&oacute;n, especialista del IMPI, y estuvo dirigida a docentes, investigadores y estudiantes. La actividad se realiz&oacute; el pasado jueves 30 de marzo en punto de las 14:00 horas.</span></p>\r\n\r\n<p><span style="font-size:22px"><input alt="" src="https://i.imgur.com/lEgIgDU.jpeg" style="width: 720px; height: 481px;" type="image" /><br />\r\nDurante la reuni&oacute;n, se abordaron temas como las generalidades de la propiedad intelectual, la protecci&oacute;n de la propiedad industrial, qu&eacute; es el IMPI y los servicios que ofrece a la poblaci&oacute;n. </span></p>\r\n\r\n<p><input alt="" src="https://i.imgur.com/0m0Q0V1.jpeg" style="width: 480px; height: 321px;" type="image" /><input alt="" src="https://i.imgur.com/D1nQVGI.jpeg" style="width: 480px; height: 326px;" type="image" /></p>\r\n\r\n<p><span style="font-size:22px">La pl&aacute;tica result&oacute; de gran inter&eacute;s para los asistentes, quienes pudieron conocer los principales conceptos relacionados con la propiedad intelectual y la importancia de proteger la creatividad y las invenciones.</span></p>\r\n\r\n<p><span style="font-size:22px"><input alt="" src="https://i.imgur.com/EE11plu.jpeg" style="width: 480px; height: 321px;" type="image" /><input alt="" src="https://i.imgur.com/gQJ1UvL.jpeg" style="width: 480px; height: 346px;" type="image" /><br />\r\n#TodosSomosTecNM<br />\r\n#OrgulloJaguar</span></p>\r\n', '2023-04-10 22:46:18', '2023-04-17 23:05:00', 1, 'La-direcciÃ³n-del-Instituto-TecnolÃ³gico-de-Villahermosa-travÃ©s-de-la-SubdirecciÃ³n-AcadÃ©mica-en-coordinaciÃ³n-con-el-departamento-de-GestiÃ³n-TecnolÃ³gica-y-VinculaciÃ³n,-el-Instituto-Mexicano-de-la-Propiedad-Intelectual-(IMPI)-y-el-Consejo-de-Ciencia-y-TecnologÃ­a-del-Estado-de-Tabasco-(CCYTET)', 'a6bf5377d4912da1062d71e19054e1eb.jpg', 2, 'Dax', 'rodrigo.jpeg'),
	(31, 'Semillero Dual', 15, 10, '<p><kbd><span style="color:#ffffff"><span style="font-size:24px"><strong><span style="background-color:#4e5f70">#TecNMCampusVillahermosaInforma&nbsp;&quot;Semillero Dual&quot;</span></strong></span></span></kbd></p>\r\n\r\n<hr />\r\n<h3 style="color:#aaaaaa; font-style:italic"><cite><tt><span style="font-size:22px"><span style="color:#000000">&nbsp;</span><kbd><span style="color:#ffffff"><span style="background-color:#e74c3c">El d&iacute;a 30 de marzo de 2023</span></span><span style="color:#000000"><span style="background-color:#e74c3c">,</span> </span></kbd></span></tt></cite></h3>\r\n\r\n<h3 style="color:#aaaaaa; font-style:italic"><span style="color:#ffffff"><small><cite><tt><span style="font-size:22px"><kbd>la comunidad estudiantil del </kbd></span></tt></cite></small></span></h3>\r\n\r\n<h3 style="color:#aaaaaa; font-style:italic"><span style="color:#ffffff"><small><cite><tt><span style="font-size:22px"><kbd>Instituto Tecnol&oacute;gico de Villahermosa,&nbsp; &nbsp; &nbsp; &nbsp;</kbd></span></tt></cite></small></span></h3>\r\n\r\n<h3 style="color:#aaaaaa; font-style:italic"><span style="color:#ffffff"><small><cite><tt><span style="font-size:22px"><kbd>inscrita en el 6to. Semestre durante&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</kbd></span></tt></cite></small></span></h3>\r\n\r\n<h3 style="color:#aaaaaa; font-style:italic"><span style="color:#ffffff"><small><cite><tt><span style="font-size:22px"><kbd>el periodo enero-junio 2023, y con un </kbd></span></tt></cite></small></span></h3>\r\n\r\n<h3 style="color:#aaaaaa; font-style:italic"><span style="color:#ffffff"><small><cite><tt><span style="font-size:22px"><kbd>promedio mayor a 80 en el semestre </kbd></span></tt></cite></small></span></h3>\r\n\r\n<h3 style="color:#aaaaaa; font-style:italic"><span style="color:#ffffff"><small><cite><tt><span style="font-size:22px"><kbd>inmediato anterior al 5to. Semestre, </kbd></span></tt></cite></small></span></h3>\r\n\r\n<h3 style="color:#aaaaaa; font-style:italic"><span style="color:#ffffff"><small><cite><tt><span style="font-size:22px"><kbd>tuvo la oportunidad de participar </kbd></span></tt></cite></small></span></h3>\r\n\r\n<h3 style="color:#aaaaaa; font-style:italic"><span style="color:#ffffff"><small><cite><tt><span style="font-size:22px"><kbd>en la reuni&oacute;n denominada &quot;Semillero Dual&quot;.<img alt="smiley" height="23" src="http://localhost/notidax/admin/ckeditor/plugins/smiley/images/regular_smile.png" title="smiley" width="23" /><img alt="yes" height="23" src="http://localhost/notidax/admin/ckeditor/plugins/smiley/images/thumbs_up.png" title="yes" width="23" /></kbd></span></tt></cite></small></span></h3>\r\n\r\n<p><br />\r\n<span style="font-size:22px">La pl&aacute;tica fue impartida por Roc&iacute;o de los &Aacute;ngeles Moreno Esquivel, Coordinadora Institucional del Modelo de Educaci&oacute;n dual del ITVH, y tuvo lugar en el auditorio del Centro de Informaci&oacute;n de esta instituci&oacute;n. El objetivo principal de la reuni&oacute;n fue proporcionar a los estudiantes informaci&oacute;n relevante sobre el modelo de educaci&oacute;n dual que se imparte en el instituto.</span></p>\r\n\r\n<p style="text-align:center"><span style="font-size:22px"><input alt="" src="https://i.imgur.com/qs9yxYw.jpeg" style="height:481px; width:720px" type="image" /><br />\r\nLa reuni&oacute;n fue organizada por la Subdirecci&oacute;n Acad&eacute;mica en coordinaci&oacute;n con la Divisi&oacute;n de Estudios Profesionales de esta casa de estudios. Durante la reuni&oacute;n, los estudiantes pudieron conocer en detalle las caracter&iacute;sticas del modelo de educaci&oacute;n dual, su funcionamiento y los beneficios que ofrece para su formaci&oacute;n acad&eacute;mica y profesional.</span></p>\r\n\r\n<p style="text-align:center"><span style="font-size:22px"><input alt="" src="https://i.imgur.com/5PAedSD.jpeg" style="height:481px; width:720px" type="image" /><br />\r\n#OrgulloJaguar #TodosSomosTecNM</span></p>\r\n', '2023-04-10 22:49:15', '2023-04-17 23:05:03', 1, 'Semillero-Dual', '9b699e04cbfcb1697a756fe85d5b4eca.jpg', 2, 'Dax', 'rodrigo.jpeg');

-- Volcando estructura para tabla notidax.tblsubcategory
CREATE TABLE IF NOT EXISTS `tblsubcategory` (
  `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryId` int(11) DEFAULT NULL,
  `Subcategory` varchar(255) DEFAULT NULL,
  `SubCatDescription` mediumtext,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL,
  PRIMARY KEY (`SubCategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla notidax.tblsubcategory: ~14 rows (aproximadamente)
INSERT INTO `tblsubcategory` (`SubCategoryId`, `CategoryId`, `Subcategory`, `SubCatDescription`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
	(10, 15, 'Avisos', 'Avisos importantes', '2023-04-10 21:07:52', NULL, 1),
	(11, 15, 'Convocatorias', 'Convocatorias del momento', '2023-04-10 21:08:40', NULL, 1),
	(12, 15, 'Eventos y actividades', 'Eventos del tec', '2023-04-10 21:09:06', NULL, 1),
	(13, 16, 'Cursos', 'Inscripciones a cursos', '2023-04-10 21:09:38', NULL, 1),
	(14, 16, 'Anuncios de examenes', 'anuncios', '2023-04-10 21:10:22', NULL, 1),
	(15, 17, 'Deportes', 'Deportes', '2023-04-10 21:10:47', NULL, 1),
	(16, 17, 'Clubes', 'Unete a clubes disponibles', '2023-04-10 21:11:09', NULL, 1),
	(17, 17, 'Charlas y conferencias', 'Charlas y conferencias', '2023-04-10 21:11:35', NULL, 1),
	(18, 17, 'Actividades culturales', 'Actividades culturales', '2023-04-10 21:11:56', NULL, 1),
	(19, 18, 'Cambios y mejoras en la administraciÃ³n universitaria', 'Cambios y mejoras en la administraciÃ³n universitaria', '2023-04-10 21:13:34', NULL, 1),
	(20, 18, 'Logros y reconocimientos de la universidad', 'Logros y reconocimientos de la universidad', '2023-04-10 21:13:55', NULL, 1),
	(21, 18, 'Historias de Ã©xito de estudiantes', 'Historias de Ã©xito de estudiantes', '2023-04-10 21:14:24', NULL, 1),
	(22, 18, 'Oportunidades de voluntariado y empleo', 'Oportunidades de voluntariado y empleo', '2023-04-10 21:14:36', NULL, 1),
	(23, 19, 'ReseÃ±as de libros y pelÃ­culas', 'ReseÃ±as de libros y pelÃ­culas', '2023-04-10 21:14:53', NULL, 1);

-- Volcando estructura para tabla notidax.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Is_Active` int(1) DEFAULT NULL,
  `rol` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `rol` (`rol`),
  CONSTRAINT `FK_usuarios_roles` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla notidax.usuarios: ~6 rows (aproximadamente)
INSERT INTO `usuarios` (`idUsuario`, `userName`, `password`, `Is_Active`, `rol`, `imagen`) VALUES
	(1, 'operador', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, 'javier.jpg'),
	(2, 'Dax', 'pass1234', 1, 0, 'rodrigo.jpeg'),
	(4, 'Marios', '202cb962ac59075b964b07152d234b70', 1, 0, 'Captura de pantalla (270).png'),
	(9, 'Therfa', '1c5ebf66bb653ff16e50736b33ebbe91', 1, 0, 'rodrigo.jpeg'),
	(14, 'pepe', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0, 'perfil.png'),
	(15, 'Therfa', '1c5ebf66bb653ff16e50736b33ebbe91', 1, 0, 'perfil.png');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

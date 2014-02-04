CREATE DATABASE `tasks` /*!40100 DEFAULT CHARACTER SET latin1 */;

CREATE TABLE `listas` (
  `IDLista` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(80) NOT NULL,
  `IDUser` int(11) NOT NULL,
  PRIMARY KEY (`IDLista`),
  KEY `listas_ibfk_1` (`IDUser`),
  CONSTRAINT `listas_ibfk_1` FOREIGN KEY (`IDUser`) REFERENCES `usuarios` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `tarefas` (
  `IDTask` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(80) NOT NULL,
  `Concluida` tinyint(1) NOT NULL DEFAULT '0',
  `IDList` int(11) DEFAULT NULL,
  `Data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IDTask`),
  KEY `fk_tarefas_1` (`IDList`),
  CONSTRAINT `fk_tarefas_1` FOREIGN KEY (`IDList`) REFERENCES `listas` (`IDLista`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(80) NOT NULL,
  `Login` varchar(20) NOT NULL,
  `Senha` varchar(32) NOT NULL,
  `Email` varchar(120) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


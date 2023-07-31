
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `crudDB_organizacoes`
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `organizacoes`
--

DROP TABLE IF EXISTS `organizacoes`;
CREATE TABLE IF NOT EXISTS `organizacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `OrganizationId` varchar(50) NOT NULL,
  `Name` varchar(80) NOT NULL,
  `Website` varchar(80) NOT NULL,
  `Country` varchar(80)  NOT NULL,
  `Description` varchar(100)  NOT NULL,
  `Founded` int(11) NOT NULL,
  `Industry` varchar(80) NOT NULL,
  `Numberofemployees` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;
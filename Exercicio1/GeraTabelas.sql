
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `crudDB_Usuarios`
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;



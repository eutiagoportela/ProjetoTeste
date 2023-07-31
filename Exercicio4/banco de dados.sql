

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- Banco de dados: `bdescola`
--

-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(256) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `creditos` decimal(10,2) DEFAULT '0.00',
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
-- senha inicial 123456 criptografada para usuario e admin e estudante

INSERT INTO `usuarios` (`nome`, `email`, `senha`, `data_cadastro`, `creditos`, `admin`) VALUES ('Tiago Portela', 'teste@hotmail.com', '$2y$10$W2SvvJdWnHR6nOGzsmrwPuThQgCk4FrqmyQPtPUATz4jJBS8smmDG', now(), '1500.00', 0);
INSERT INTO `usuarios` (`nome`, `email`, `senha`, `data_cadastro`, `creditos`, `admin`) VALUES ('ADMIN', 'admin@gmail.com', '$2y$10$4tE6sIjvt6VVdwCN099t8eCJzNVvjNIw.1WAZr2ME27xcqoPSxraa', now(), '100.00', 1);
INSERT INTO `usuarios` (`nome`, `email`, `senha`, `data_cadastro`, `creditos`, `admin`) VALUES ('Estudante', 'estudante@gmail.com', '$2y$10$4tE6sIjvt6VVdwCN099t8eCJzNVvjNIw.1WAZr2ME27xcqoPSxraa', now(), '1000.00', 2);
COMMIT;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descricao_curta` varchar(100) NOT NULL,
  `conteudo` longtext NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(140) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `titulo`, `descricao_curta`, `conteudo`, `data_cadastro`, `preco`, `imagem`) VALUES
(1, 'Curso .NET', 'Aula de .NET', 'Aula  1\r\n<iframe width="560" height="315" src="https://www.youtube.com/embed/r6AcjjNvI8w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>\r\n\r\nAula 2\r\n<iframe width="560" height="315" src="https://www.youtube.com/embed/ftLxe7BLzQU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>\r\n\r\nAula 3\r\n<iframe width="560" height="315" src="https://www.youtube.com/embed/nMBpGJfCthk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>', now(), '150.00', 'upload/6032a8149ce06.jpg');

INSERT INTO `cursos` (`id`, `titulo`, `descricao_curta`, `conteudo`, `data_cadastro`, `preco`, `imagem`) VALUES
(2, 'Curso Android', 'Aula de Android', 'Aula  1\r\n<iframe width="560" height="315" src="https://www.youtube.com/embed/oYPS9oY60Zk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>\r\n\r\nAula 2\r\n<iframe width="560" height="315" src="https://www.youtube.com/embed/ic1iBpGQGSQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>', now(), '250.00', 'upload/6032a8149ce06.jpg');

INSERT INTO `cursos` (`id`, `titulo`, `descricao_curta`, `conteudo`, `data_cadastro`, `preco`, `imagem`) VALUES
(3, 'Curso Java', 'Aula de Java', 'Aula  1\r\n<iframe width="560" height="315" src="https://www.youtube.com/embed/X8AnVQ-GqLU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>\r\n\r\nAula 2\r\n<iframe width="560" height="315" src="https://www.youtube.com/embed/rUTKomc2gG8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>\r\n\r\nAula 3\r\n<iframe width="560" height="315" src="https://www.youtube.com/embed/FdePtO5JSd0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>\r\n\r\nAula 4\r\n<iframe width="560" height="315" src="https://www.youtube.com/embed/OmmJBfcMJA8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>', now(), '100.00', 'upload/6032a8149ce06.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorio`
--

DROP TABLE IF EXISTS `relatorio`;
CREATE TABLE IF NOT EXISTS `relatorio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `data_compra` datetime NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_usuario`) REFERENCES usuarios(id)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `relatorio` - simulando compra do curso 3 Android para usuario 2
--

INSERT INTO `relatorio` (`id`, `id_usuario`, `id_curso`, `valor`, `data_compra`) VALUES
(2, 2, 3, '15', now());

-- --------------------------------------------------------
--
-- Estrutura da tabela `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_usuario`) REFERENCES usuarios(id)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
--
-- --------------------------------------------------------





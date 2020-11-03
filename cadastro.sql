-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 03-Nov-2020 às 14:51
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadastro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `id_log` int(5) NOT NULL,
  `ID_PESSOAS` int(5) NOT NULL,
  `NOME_LOG` varchar(200) NOT NULL,
  `EMAIL_LOG` varchar(150) NOT NULL,
  `CPF_LOG` varchar(15) DEFAULT NULL,
  `TEL_LOG` varchar(11) DEFAULT NULL,
  `ALTERADO` date DEFAULT NULL,
  `DELETADO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `log`
--

INSERT INTO `log` (`id_log`, `ID_PESSOAS`, `NOME_LOG`, `EMAIL_LOG`, `CPF_LOG`, `TEL_LOG`, `ALTERADO`, `DELETADO`) VALUES
(1, 10, 'anderson carneiros', 'anderson@hotmail', '036.297.541-81', '', '2020-11-03', '2020-11-02'),
(2, 10, 'anderson santos', 'anderson@hotmail', '036.297.541-81', '', '2020-11-03', '2020-11-02'),
(3, 10, 'anderson carneiro', 'anderson@kbum', '036.297.541-81', '', '2020-11-03', '2020-11-02'),
(4, 10, 'anderson carneiro', 'anderson@kbum', '036.297.541-81', '62982391269', '2020-11-03', '2020-11-02'),
(5, 10, 'anderson carneiro', 'anderson@gmail.com', '036.297.541-81', '', '2020-11-03', '0000-00-00'),
(6, 10, 'anderson carneiro', 'anderson@gmail.com', '036.297.541-81', '62982391269', '2020-11-03', '0000-00-00'),
(7, 7, 'anderson', 'robotko@hotmail.com', '', '', '2020-11-03', '0000-00-00'),
(8, 13, 'marcos silva', 'marcos@silva.com', '23368514925', '62982391265', NULL, '2020-11-03'),
(9, 10, 'anderson carneiro', 'anderson@gmail.com', '036.297.541-81', '62991199773', NULL, '2020-11-03');

-- --------------------------------------------------------

--
-- Estrutura da tabela `PESSOAS`
--

CREATE TABLE `PESSOAS` (
  `ID_PESSOAS` int(5) NOT NULL,
  `NOME_PESSOAS` varchar(400) NOT NULL,
  `EMAIL_PESSOAS` varchar(150) NOT NULL,
  `CPF_PESSOAS` varchar(15) DEFAULT NULL,
  `TEL_PESSOAS` varchar(11) DEFAULT NULL,
  `INSERIDO` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela para cadastro de pessoas';

--
-- Extraindo dados da tabela `PESSOAS`
--

INSERT INTO `PESSOAS` (`ID_PESSOAS`, `NOME_PESSOAS`, `EMAIL_PESSOAS`, `CPF_PESSOAS`, `TEL_PESSOAS`, `INSERIDO`) VALUES
(15, 'anderson', 'anderson@gmail.com', '03629754180', '6232482576', NULL),
(16, 'tadeu', 'tadeu@gmail.com', '065795435618', NULL, NULL),
(26, 'marcos', 'marcus@gmail.com', '03624684180', NULL, '2020-11-03'),
(27, 'joana', 'joana@gmail.com', '03046754180', NULL, '2020-11-03'),
(28, 'andressa', 'andressa@gmail.com', '03629754325', '6245876523', '2020-11-03'),
(29, 'boby', 'boby@gmail.com', '48729754180', NULL, '2020-11-03'),
(30, 'antonia', 'antonia@gmail.com', '03923754180', NULL, '2020-11-03'),
(31, 'matheus', 'matheus@gmail.com', '03731754180', NULL, '2020-11-03'),
(32, 'carla', 'carla@gmail.com', '03629759510', NULL, '2020-11-03'),
(33, 'kamila', 'kamila@gmail.com', '12829754180', NULL, '2020-11-03'),
(34, 'rita', 'rita@gmail.com', '0362435680', NULL, '2020-11-03'),
(35, 'camilla', 'camilla@gmail.com', '0362434682', NULL, '2020-11-03');

--
-- Acionadores `PESSOAS`
--
DELIMITER $$
CREATE TRIGGER `log_alteracao` AFTER UPDATE ON `PESSOAS` FOR EACH ROW IF NEW.NOME_PESSOAS <> OLD.NOME_PESSOAS OR NEW.EMAIL_PESSOAS <> OLD.EMAIL_PESSOAS OR NEW.CPF_PESSOAS <> OLD.CPF_PESSOAS OR NEW.TEL_PESSOAS <> OLD.TEL_PESSOAS THEN
   INSERT INTO log VALUES (NULL,OLD.ID_PESSOAS,OLD.NOME_PESSOAS,OLD.EMAIL_PESSOAS,OLD.CPF_PESSOAS,OLD.TEL_PESSOAS,NOW());
   END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_delete` AFTER DELETE ON `PESSOAS` FOR EACH ROW INSERT INTO log 
(ID_LOG,ID_PESSOAS,NOME_LOG,EMAIL_LOG,CPF_LOG,TEL_LOG,ALTERADO,DELETADO) VALUES (NULL,OLD.ID_PESSOAS,OLD.NOME_PESSOAS,OLD.EMAIL_PESSOAS,OLD.CPF_PESSOAS,OLD.TEL_PESSOAS,NULL,NOW())
$$
DELIMITER ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Índices para tabela `PESSOAS`
--
ALTER TABLE `PESSOAS`
  ADD PRIMARY KEY (`ID_PESSOAS`),
  ADD UNIQUE KEY `CPF_PESSOAS` (`CPF_PESSOAS`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `PESSOAS`
--
ALTER TABLE `PESSOAS`
  MODIFY `ID_PESSOAS` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

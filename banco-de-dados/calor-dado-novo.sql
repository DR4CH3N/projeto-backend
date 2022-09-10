-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Set-2022 às 14:56
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `calor-dado-novo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastros`
--

CREATE TABLE `cadastros` (
  `id` int(11) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `endereco` varchar(20) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `complemento` varchar(20) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastros`
--

INSERT INTO `cadastros` (`id`, `telefone`, `endereco`, `cep`, `cidade`, `numero`, `bairro`, `complemento`, `usuario_id`) VALUES
(14, '(19) 69520-059', 'Rua David Livingston', '03801-050', 'São Paulo', '1', 'Parque Boturussu', '', 2),
(15, '(19) 69520-059', 'Rua David Livingston', '03801-050', 'São Paulo', '1', 'Parque Boturussu', '', 2),
(16, '(19) 6952-0059', 'Rua Professor José d', '03801-010', 'São Paulo', '1', 'Parque Boturussu', '', 2),
(17, '(19) 6952-0059', 'Rua Professor José d', '03801-010', 'São Paulo', '1', 'Parque Boturussu', '', 2),
(18, '(19) 6952-0059', 'Rua David Livingston', '03801-050', 'São Paulo', '1', 'Parque Boturussu', '', 2),
(19, '(19) 6952-0059', 'Rua David Livingston', '03801-050', 'São Paulo', '1', 'Parque Boturussu', '', 2),
(20, '(19) 6952-0059', 'Rua David Livingston', '03801-050', 'São Paulo', '1', 'Parque Boturussu', '', 2),
(21, '(19) 69520-059', 'Rua David Livingston', '03801-050', 'São Paulo', '1', 'Parque Boturussu', '', 3),
(22, '', 'Rua David Livingston', '03801-050', 'São Paulo', '1', 'Parque Boturussu', '', 3),
(23, '(19) 69520-059', 'Rua Professor José d', '03801-010', 'São Paulo', '', 'Parque Boturussu', '', 3),
(24, '', 'Rua Professor José d', '03801-010', 'São Paulo', '', 'Parque Boturussu', '', 3),
(25, '(19) 69520-059', 'Rua Professor José d', '03801-010', 'São Paulo', '', 'Parque Boturussu', '', 2),
(26, '', 'Rua David Livingston', '03801-050', 'São Paulo', '1', 'Parque Boturussu', '', 2),
(27, '', 'Rua David Livingston', '03801-050', 'São Paulo', '1', 'Parque Boturussu', '', 2),
(28, '(19) 69520-059', 'Rua David Livingston', '03801-050', 'São Paulo', '', 'Parque Boturussu', '', 2),
(29, '(19) 69520-059', 'Rua David Livingston', '03801-050', 'São Paulo', '', 'Parque Boturussu', '', 2),
(30, '(19) 69520-059', 'Rua David Livingston', '03801-050', 'São Paulo', '', 'Parque Boturussu', '', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `doacoes`
--

CREATE TABLE `doacoes` (
  `id` int(11) NOT NULL,
  `roupas` int(11) NOT NULL,
  `calcados` int(11) NOT NULL,
  `cobertores` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `pix` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `doacoes`
--

INSERT INTO `doacoes` (`id`, `roupas`, `calcados`, `cobertores`, `usuario_id`, `pix`) VALUES
(14, 0, 0, 0, 2, ''),
(15, 0, 0, 0, 2, ''),
(16, 1, 0, 1, 2, ''),
(17, 1, 0, 1, 2, ''),
(18, 1, 0, 0, 2, ''),
(19, 1, 0, 1, 2, ''),
(20, 1, 0, 1, 2, ''),
(21, 0, 0, 0, 3, ''),
(22, 0, 0, 0, 3, ''),
(23, 0, 0, 0, 3, ''),
(24, 0, 0, 0, 3, ''),
(25, 0, 0, 0, 2, ''),
(26, 0, 0, 1, 2, ''),
(27, 0, 0, 1, 2, ''),
(28, 1, 0, 1, 2, ''),
(29, 1, 1, 1, 2, ''),
(30, 1, 1, 1, 2, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` enum('admin','usuario') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tipo`) VALUES
(1, 'rafa', 'rafa@gmail.com', '$2y$10$oR10HntgYGNGkrIAk84ZGuscmpmHcj5zOiqjWy.ZmQ0DEuOaXhjFC', 'admin'),
(2, 'gi', 'gi@gmail.com', '$2y$10$pLC8zucg9R01/DT9rtwsH.5QrKwXwgPjJGG33OddYhC03FImTGnbW', 'usuario'),
(3, 'juca', 'juca@gmail.com', '$2y$10$7.XTeljGR4Gbf52FL6s77ObIUPOdZXbu30Q3NmxU3oOGwDLL87wpG', 'usuario');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastros`
--
ALTER TABLE `cadastros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `doacoes`
--
ALTER TABLE `doacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastros`
--
ALTER TABLE `cadastros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `doacoes`
--
ALTER TABLE `doacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cadastros`
--
ALTER TABLE `cadastros`
  ADD CONSTRAINT `cadastros_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `doacoes`
--
ALTER TABLE `doacoes`
  ADD CONSTRAINT `doacoes_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

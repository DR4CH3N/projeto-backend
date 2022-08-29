-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Ago-2022 às 16:56
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `calor-dado`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `email`, `senha`) VALUES
(1, 'matheus@gmail.com', '$2y$10$IEDUAeC3tpo6RTFuCJg06OS8rBdeKcOWmh.G8ikocslm6hckagc/K'),
(2, 'Antônio', '$2y$10$kRRC9fXuHtny239KqDaJo.kL/HirUb9fm7bzwjoIWGCt24/GmPpdO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id` int(11) NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `complemento` varchar(30) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id`, `endereco`, `cep`, `cidade`, `numero`, `complemento`, `bairro`, `usuario_id`) VALUES
(5, 'Rua nove de julho', '08505-00', 'Ferraz de Vasconcelos', '1000', '', '', 2),
(6, 'Rua nove de novembro', '0800-000', 'São Paulo', '1500', '', '', 1),
(9, 'Rua da 25 de março', '08505-00', 'São Paulo', '0000', '900/915', 'josefina', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `doacoes`
--

CREATE TABLE `doacoes` (
  `id` int(11) NOT NULL,
  `doacao` set('roupas','cobertores','calcados') NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `doacoes`
--

INSERT INTO `doacoes` (`id`, `doacao`, `Quantidade`, `usuario_id`) VALUES
(8, 'calcados', 2, 1),
(9, 'roupas,cobertores', 10, 2),
(10, 'roupas', 4, 2),
(11, 'roupas,cobertores,calcados', 6, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `Tipo` enum('admin','usuario') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `Tipo`) VALUES
(1, 'Matheus', 'matheus123@gmail.com', '$2y$10$Ij1ovHGmnFgJ.0y1J4/A6.6wTewS44W42e7e59.bZYzG5u0OIkmte', 'admin'),
(2, 'Lucas', 'lucas@gmail.com', '$2y$10$GTzS/heiBjX0ZU8qEcei5OKuRpFYlvLkG/aUyypAmSu/KoPyU6GUS', 'admin'),
(3, 'Thiago', 'thiago@gmail.com', '$2a$12$4rbzN3NAyyY67ScgEOS1Tu6fPPSlV.2w1iniJTlIoVkrszKdt0o2.', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cadastro_usuarios` (`usuario_id`) USING BTREE;

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `doacoes`
--
ALTER TABLE `doacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD CONSTRAINT `fk_contato_meu_perfil_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `doacoes`
--
ALTER TABLE `doacoes`
  ADD CONSTRAINT `doacoes_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

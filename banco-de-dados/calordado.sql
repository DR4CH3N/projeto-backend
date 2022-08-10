-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Ago-2022 às 15:55
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `calordado`
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
-- Estrutura da tabela `contato_meu_perfil`
--

CREATE TABLE `contato_meu_perfil` (
  `id` int(11) NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `numero_casa` varchar(5) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contato_meu_perfil`
--

INSERT INTO `contato_meu_perfil` (`id`, `endereco`, `cep`, `cidade`, `numero_casa`, `usuario_id`) VALUES
(5, 'Rua nove de julho', '08505-00', 'Ferraz de Vasconcelos', '1000', 2),
(6, 'Rua nove de novembro', '0800-000', 'São Paulo', '1500', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `quero_doar`
--

CREATE TABLE `quero_doar` (
  `id` int(11) NOT NULL,
  `doacao` enum('roupas','cobertores','calcados') NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `quero_doar`
--

INSERT INTO `quero_doar` (`id`, `doacao`, `usuario_id`) VALUES
(1, 'roupas', 1),
(2, 'cobertores', 2),
(3, 'calcados', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Matheus', 'matheus123@gmail.com', '$2y$10$Ij1ovHGmnFgJ.0y1J4/A6.6wTewS44W42e7e59.bZYzG5u0OIkmte'),
(2, 'Lucas', 'lucas@gmail.com', '$2y$10$GTzS/heiBjX0ZU8qEcei5OKuRpFYlvLkG/aUyypAmSu/KoPyU6GUS');

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
-- Índices para tabela `contato_meu_perfil`
--
ALTER TABLE `contato_meu_perfil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contato_meu_perfil_usuarios` (`usuario_id`);

--
-- Índices para tabela `quero_doar`
--
ALTER TABLE `quero_doar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_quero_doar_usuarios` (`usuario_id`);

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
-- AUTO_INCREMENT de tabela `contato_meu_perfil`
--
ALTER TABLE `contato_meu_perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `quero_doar`
--
ALTER TABLE `quero_doar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `contato_meu_perfil`
--
ALTER TABLE `contato_meu_perfil`
  ADD CONSTRAINT `fk_contato_meu_perfil_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `quero_doar`
--
ALTER TABLE `quero_doar`
  ADD CONSTRAINT `fk_quero_doar_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

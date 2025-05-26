-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 14/05/2025 às 13:16
-- Versão do servidor: 8.0.41-0ubuntu0.22.04.1
-- Versão do PHP: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `AvMangas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Avaliação`
--

CREATE TABLE `Avaliação` (
  `id_avaliacao` int NOT NULL,
  `título` varchar(255) NOT NULL,
  `descrição` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Avaliação_has_Mangá`
--

CREATE TABLE `Avaliação_has_Mangá` (
  `Avaliação_id_avaliacao` int NOT NULL,
  `Mangá_id_manga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Categoria`
--

CREATE TABLE `Categoria` (
  `id_categoria` int NOT NULL,
  `gênero` varchar(255) NOT NULL,
  `classif_indicativa` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `Categoria`
--

INSERT INTO `Categoria` (`id_categoria`, `gênero`, `classif_indicativa`) VALUES
(1, 'Terror', '16'),
(2, 'Shounen', '12'),
(3, 'Shoujo', '12'),
(4, 'Seinen', '18'),
(5, 'Josei', '16'),
(6, 'Mistério', '14'),
(7, 'Romance', '14'),
(8, 'Drama', '12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Mangá`
--

CREATE TABLE `Mangá` (
  `id_manga` int NOT NULL,
  `editora` varchar(255) NOT NULL,
  `título` varchar(255) NOT NULL,
  `autor` varchar(45) NOT NULL,
  `id_categoria` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Usuário`
--

CREATE TABLE `Usuário` (
  `id_usuario` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `idade` int NOT NULL,
  `Avaliação_id_avaliacao` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `Avaliação`
--
ALTER TABLE `Avaliação`
  ADD PRIMARY KEY (`id_avaliacao`);

--
-- Índices de tabela `Avaliação_has_Mangá`
--
ALTER TABLE `Avaliação_has_Mangá`
  ADD PRIMARY KEY (`Avaliação_id_avaliacao`,`Mangá_id_manga`),
  ADD KEY `fk_Avaliação_has_Mangá_Mangá1_idx` (`Mangá_id_manga`),
  ADD KEY `fk_Avaliação_has_Mangá_Avaliação1_idx` (`Avaliação_id_avaliacao`);

--
-- Índices de tabela `Categoria`
--
ALTER TABLE `Categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `Mangá`
--
ALTER TABLE `Mangá`
  ADD PRIMARY KEY (`id_manga`),
  ADD KEY `fk_Mangá_Categoria_idx` (`id_categoria`);

--
-- Índices de tabela `Usuário`
--
ALTER TABLE `Usuário`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_Usuário_Avaliação1_idx` (`Avaliação_id_avaliacao`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Avaliação`
--
ALTER TABLE `Avaliação`
  MODIFY `id_avaliacao` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Categoria`
--
ALTER TABLE `Categoria`
  MODIFY `id_categoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `Mangá`
--
ALTER TABLE `Mangá`
  MODIFY `id_manga` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Usuário`
--
ALTER TABLE `Usuário`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `Avaliação_has_Mangá`
--
ALTER TABLE `Avaliação_has_Mangá`
  ADD CONSTRAINT `fk_Avaliação_has_Mangá_Avaliação1` FOREIGN KEY (`Avaliação_id_avaliacao`) REFERENCES `Avaliação` (`id_avaliacao`),
  ADD CONSTRAINT `fk_Avaliação_has_Mangá_Mangá1` FOREIGN KEY (`Mangá_id_manga`) REFERENCES `Mangá` (`id_manga`);

--
-- Restrições para tabelas `Mangá`
--
ALTER TABLE `Mangá`
  ADD CONSTRAINT `fk_Mangá_Categoria` FOREIGN KEY (`id_categoria`) REFERENCES `Categoria` (`id_categoria`);

--
-- Restrições para tabelas `Usuário`
--
ALTER TABLE `Usuário`
  ADD CONSTRAINT `fk_Usuário_Avaliação1` FOREIGN KEY (`Avaliação_id_avaliacao`) REFERENCES `Avaliação` (`id_avaliacao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

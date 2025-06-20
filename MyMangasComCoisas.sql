-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 10/06/2025 às 22:55
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
-- Banco de dados: `MyMangas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Avaliacao`
--

CREATE TABLE `Avaliacao` (
  `id_avaliacao` int NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `Usuario_id_usuario` int NOT NULL,
  `Manga_id_manga` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Categoria`
--

CREATE TABLE `Categoria` (
  `id_categoria` int NOT NULL,
  `genero` varchar(255) NOT NULL,
  `classif_indicativa` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `Categoria`
--

INSERT INTO `Categoria` (`id_categoria`, `genero`, `classif_indicativa`) VALUES
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
-- Estrutura para tabela `Manga`
--

CREATE TABLE `Manga` (
  `id_manga` int NOT NULL,
  `editora` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `Categoria_id_categoria` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `Manga`
--

INSERT INTO `Manga` (`id_manga`, `editora`, `titulo`, `autor`, `Categoria_id_categoria`) VALUES
(3, 'JBC', 'Bakuman', 'Lilo', 6),
(4, 'JBC', 'Gen pés descalços', 'Liló', 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Usuario`
--

CREATE TABLE `Usuario` (
  `id_usuario` int NOT NULL,
  `nome` varchar(255) NOT NULL,
  `idade` int NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `Avaliacao`
--
ALTER TABLE `Avaliacao`
  ADD PRIMARY KEY (`id_avaliacao`),
  ADD KEY `fk_Avaliacao_Usuario1_idx` (`Usuario_id_usuario`),
  ADD KEY `fk_Avaliacao_Manga1_idx` (`Manga_id_manga`);

--
-- Índices de tabela `Categoria`
--
ALTER TABLE `Categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `Manga`
--
ALTER TABLE `Manga`
  ADD PRIMARY KEY (`id_manga`),
  ADD KEY `fk_Manga_Categoria_idx` (`Categoria_id_categoria`);

--
-- Índices de tabela `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Avaliacao`
--
ALTER TABLE `Avaliacao`
  MODIFY `id_avaliacao` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Categoria`
--
ALTER TABLE `Categoria`
  MODIFY `id_categoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `Manga`
--
ALTER TABLE `Manga`
  MODIFY `id_manga` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `Avaliacao`
--
ALTER TABLE `Avaliacao`
  ADD CONSTRAINT `fk_Avaliacao_Manga1` FOREIGN KEY (`Manga_id_manga`) REFERENCES `Manga` (`id_manga`),
  ADD CONSTRAINT `fk_Avaliacao_Usuario1` FOREIGN KEY (`Usuario_id_usuario`) REFERENCES `Usuario` (`id_usuario`);

--
-- Restrições para tabelas `Manga`
--
ALTER TABLE `Manga`
  ADD CONSTRAINT `fk_Manga_Categoria` FOREIGN KEY (`Categoria_id_categoria`) REFERENCES `Categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

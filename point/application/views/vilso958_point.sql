-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 30/06/2019 às 14:50
-- Versão do servidor: 5.6.41-84.1
-- Versão do PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vilso958_point`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `areas`
--

CREATE TABLE `areas` (
  `areas_id` int(11) NOT NULL,
  `areas_descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `areas`
--

INSERT INTO `areas` (`areas_id`, `areas_descricao`) VALUES
(1, 'Ciência da Computação'),
(2, 'Ciências Agrárias');

-- --------------------------------------------------------

--
-- Estrutura para tabela `credenciamento`
--

CREATE TABLE `credenciamento` (
  `credenciamento_id` int(11) NOT NULL,
  `credenciamento_eventos_id` int(11) NOT NULL,
  `credenciamento_participante_usuarios_id` int(11) NOT NULL,
  `credenciamento_credenciador_id` int(11) NOT NULL,
  `credenciamento_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `credenciamento`
--

INSERT INTO `credenciamento` (`credenciamento_id`, `credenciamento_eventos_id`, `credenciamento_participante_usuarios_id`, `credenciamento_credenciador_id`, `credenciamento_data`) VALUES
(1, 1, 1, 1, '2019-06-30 16:11:09');

-- --------------------------------------------------------

--
-- Estrutura para tabela `eventos`
--

CREATE TABLE `eventos` (
  `eventos_id` int(11) NOT NULL,
  `eventos_valor` decimal(9,2) NOT NULL,
  `eventos_descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eventos_data_inicial` date NOT NULL,
  `eventos_data_final` date NOT NULL,
  `eventos_horario_inicial` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `eventos_horario_final` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `eventos_info` text COLLATE utf8_unicode_ci NOT NULL,
  `eventos_responsavel_usuarios_id` int(11) NOT NULL,
  `eventos_carga_horaria` int(3) NOT NULL,
  `eventos_vagas` int(5) NOT NULL,
  `eventos_areas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `eventos`
--

INSERT INTO `eventos` (`eventos_id`, `eventos_valor`, `eventos_descricao`, `eventos_data_inicial`, `eventos_data_final`, `eventos_horario_inicial`, `eventos_horario_final`, `eventos_info`, `eventos_responsavel_usuarios_id`, `eventos_carga_horaria`, `eventos_vagas`, `eventos_areas_id`) VALUES
(1, '0.00', 'Hackathon UFG', '2019-06-28', '2019-06-28', '18:00:00', '20:00:00', 'Hackathon', 1, 50, 80, 1),
(2, '90.00', 'Feira de Agricultura', '2019-07-06', '2019-07-06', '08:00:00', '18:00:00', 'teste', 3, 16, 30, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `inscricao`
--

CREATE TABLE `inscricao` (
  `inscricao_id` int(11) NOT NULL,
  `inscricao_eventos_id` int(11) NOT NULL,
  `inscricao_usuarios_id` int(11) NOT NULL,
  `inscricao_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `inscricao`
--

INSERT INTO `inscricao` (`inscricao_id`, `inscricao_eventos_id`, `inscricao_usuarios_id`, `inscricao_data`) VALUES
(1, 1, 1, '2019-06-30 14:16:21'),
(2, 2, 1, '2019-06-30 14:44:27'),
(3, 1, 2, '2019-06-30 16:39:51'),
(4, 1, 5, '2019-06-30 16:39:51'),
(5, 1, 6, '2019-06-30 16:40:16'),
(6, 1, 9, '2019-06-30 16:40:16'),
(7, 1, 8, '2019-06-30 16:40:37'),
(8, 1, 14, '2019-06-30 16:40:37'),
(9, 2, 10, '2019-06-30 16:40:52'),
(10, 2, 13, '2019-06-30 16:40:52'),
(11, 2, 7, '2019-06-30 16:41:09'),
(12, 2, 10, '2019-06-30 16:41:09');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuarios_id` int(11) NOT NULL,
  `usuarios_nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuarios_sobrenome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuarios_nivel_acesso` int(11) NOT NULL,
  `usuarios_cpf` char(14) COLLATE utf8_unicode_ci NOT NULL,
  `usuarios_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuarios_senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuarios_data_nasc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `usuarios_sexo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `usuarios_fone1` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `usuarios_fone2` char(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`usuarios_id`, `usuarios_nome`, `usuarios_sobrenome`, `usuarios_nivel_acesso`, `usuarios_cpf`, `usuarios_email`, `usuarios_senha`, `usuarios_data_nasc`, `usuarios_sexo`, `usuarios_fone1`, `usuarios_fone2`) VALUES
(1, 'Vilson', 'Soares de Siqueira', 0, '956.264.251-87', 'vilsonsoares@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1981-12-03', 'M', '(63) 98474-3380', ''),
(2, 'Vitor', 'Lima', 3, '777.777.777-77', 'vitorlimacir@outlok.com.br', '16f16bb4490a1e00dc110e5699f05b0c', '2000-10-10', 'M', '(99) 99999-9999', ''),
(3, 'Núbia ', 'Vieira Santana', 0, '888.888.888-88', 'nubiasantana01@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2005-06-12', 'F', '(99) 99999-9999', ''),
(4, 'carol', 'vieira', 3, '000.000.000-00', 'carolvieira@gmail.com', '645a8aca5a5b84527c57ee2f153f1946', '0001-01-01', 'F', '(00) 00000-0000', '(00) 0000-0000'),
(5, 'bianca', 'vieira', 3, '090.080.050-00', 'biancavieira@gmail.com', '6f082edeea985b6fcc8cbaeedcfe68f7', '4566-03-12', 'F', '(00) 00000-0000', '(00) 0000-0000'),
(6, 'gabriel', 'vieira', 3, '343.579.000-00', 'gabrielvieira@gmail.com', '4eac6e3cb27438cebb3ab43d05c59e78', '0567-05-31', 'F', '(00) 00000-0556', '(09) 0777-5400'),
(7, 'dalva', 'vieira', 3, '455.667.788-99', 'dalvavieira@gmail.com', '143577167adf173fb7b1fb99350dc44a', '0001-09-09', 'F', '(56) 67889-0000', '(00) 0890-0000'),
(8, 'kassia', 'vieira', 3, '344.557.780-00', 'kassiavieira@gmail.com', '2d78c732aa24b00abda7d78c3fc45402', '0003-02-23', 'F', '(88) 87900-0000', '(90) 9090-0900'),
(9, 'Fernando', 'vieira', 3, '556.600.000-00', 'fernandovieira@gmail.com', '806801c5b44f433573309e66cc9c6247', '0076-06-07', 'F', '(78) 80000-0000', '(55) 5656-5656'),
(10, 'Juliana', 'vieira', 3, '090.909.090-90', 'julianavieira@gmail.com', '2542aea91c747982f7d7672a01b267da', '0065-05-06', 'F', '(98) 09808-0808', '(09) 0909-0909'),
(11, 'Sara', 'vieira', 3, '344.334.343-43', 'saravieira@gmail.com', 'dcca62d22e3719c6e35a37a3ee9452d5', '6868-07-08', 'F', '(86) 89686-8686', '(98) 9808-0080'),
(12, 'Hyago', 'vieira', 3, '989.898.989-89', 'hyagovieira@gmail.com', 'fe20876f97de71b45dd2d78146a56105', '0675-07-06', 'F', '(86) 86987-9898', '(98) 8080-8080'),
(13, 'Tais', 'vieira', 3, '709.707.979-97', 'taisvieira@gmail.com', '44098711b296f2775bfaf6e4103b2b95', '0088-06-08', 'F', '(97) 90909-0909', '(09) 9090-9090'),
(14, 'Julia', 'vieira', 3, '093.000.000-00', 'juliavieira@gmail.com', 'fef3cb93e269c97fff03a745ac316da5', '0444-04-04', 'F', '(55) 55555-5555', '(66) 6666-6666');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`areas_id`);

--
-- Índices de tabela `credenciamento`
--
ALTER TABLE `credenciamento`
  ADD PRIMARY KEY (`credenciamento_id`);

--
-- Índices de tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`eventos_id`),
  ADD KEY `responsavel_evento` (`eventos_responsavel_usuarios_id`);

--
-- Índices de tabela `inscricao`
--
ALTER TABLE `inscricao`
  ADD PRIMARY KEY (`inscricao_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuarios_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `areas`
--
ALTER TABLE `areas`
  MODIFY `areas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `credenciamento`
--
ALTER TABLE `credenciamento`
  MODIFY `credenciamento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `eventos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `inscricao`
--
ALTER TABLE `inscricao`
  MODIFY `inscricao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuarios_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `responsavel_evento` FOREIGN KEY (`eventos_responsavel_usuarios_id`) REFERENCES `usuarios` (`usuarios_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

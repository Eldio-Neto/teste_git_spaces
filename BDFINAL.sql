-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Jul-2017 às 07:46
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epedacinho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `advertencias`
--

CREATE TABLE `advertencias` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `motivo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contratos_idContratos` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atestados`
--

CREATE TABLE `atestados` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_hora` datetime NOT NULL,
  `quantidade_dias` int(11) NOT NULL,
  `CID` int(11) DEFAULT NULL,
  `tipo` enum('Atestado Médico','Atestado de Comparecimento') COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacoes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contratos_idContratos` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contratos`
--

CREATE TABLE `contratos` (
  `id` int(10) UNSIGNED NOT NULL,
  `admissao` date DEFAULT NULL,
  `inicio` date DEFAULT NULL,
  `aviso_previo` date DEFAULT NULL,
  `demissao` date DEFAULT NULL,
  `cod_colibri` int(11) DEFAULT NULL,
  `cod_contabilidade` int(11) DEFAULT NULL,
  `Empresas_idEmpresas` int(10) UNSIGNED DEFAULT NULL,
  `TipoFuncionarios_idTipoFuncionarios` int(10) UNSIGNED DEFAULT NULL,
  `Users_idUsers` int(10) UNSIGNED DEFAULT NULL,
  `observacoes` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contribuicaos`
--

CREATE TABLE `contribuicaos` (
  `id` int(10) UNSIGNED NOT NULL,
  `valor` double(6,2) NOT NULL,
  `data` date DEFAULT NULL,
  `Sindicatos_idSindicatos` int(10) UNSIGNED DEFAULT NULL,
  `Tipo` enum('Sindical','Assistencial') COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contratos_idContratos` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dependentes`
--

CREATE TABLE `dependentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `observacao` longtext COLLATE utf8mb4_unicode_ci,
  `TipoDependentes_idTipoDependentes` int(10) UNSIGNED DEFAULT NULL,
  `Users_idUsers` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eletronicos`
--

CREATE TABLE `eletronicos` (
  `id` int(10) UNSIGNED NOT NULL,
  `Marca` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Modelo` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MAC` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Users_idUsers` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` int(10) UNSIGNED NOT NULL,
  `fantasia` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CNPJ` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razao_social` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviacao` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CEP` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Logradouro` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Bairro` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cidade` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UFs_idUFs` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id` int(10) UNSIGNED NOT NULL,
  `CEP` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Logradouro` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Bairro` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cidade` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UFs_idUFs` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `CEP`, `Logradouro`, `Bairro`, `Cidade`, `UFs_idUFs`, `created_at`, `updated_at`) VALUES
(1, '73.035-093', NULL, NULL, NULL, 2, '2017-07-26 05:45:58', '2017-07-26 05:45:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamentos`
--

CREATE TABLE `equipamentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `Marca` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Modelo` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mac` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Users_idUsers` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado_civils`
--

CREATE TABLE `estado_civils` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `estado_civils`
--

INSERT INTO `estado_civils` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, ' ', '2017-07-26 05:45:57', '2017-07-26 05:45:57'),
(2, 'Solteiro(a)', '2017-07-26 05:45:58', '2017-07-26 05:45:58'),
(3, 'Casado(a)', '2017-07-26 05:45:58', '2017-07-26 05:45:58'),
(4, 'Viúvo(a)', '2017-07-26 05:45:58', '2017-07-26 05:45:58'),
(5, 'Divorciado(a)', '2017-07-26 05:45:58', '2017-07-26 05:45:58'),
(6, 'União Estável', '2017-07-26 05:45:58', '2017-07-26 05:45:58'),
(7, 'Outros', '2017-07-26 05:45:58', '2017-07-26 05:45:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `faltas`
--

CREATE TABLE `faltas` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `motivo` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Contratos_idContratos` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ferias`
--

CREATE TABLE `ferias` (
  `id` int(10) UNSIGNED NOT NULL,
  `inicio_aquisicao` date NOT NULL,
  `termino_aquisicao` date NOT NULL,
  `inicio_gozo` date NOT NULL,
  `termino_gozo` date NOT NULL,
  `observacoes` longtext COLLATE utf8mb4_unicode_ci,
  `Contratos_idContratos` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(175, '2017_07_10_100236_create_estado_civils_table', 1),
(176, '2017_07_10_100322_create_ufs_table', 1),
(177, '2017_07_10_100400_create_enderecos_table', 1),
(178, '2017_07_10_100405_create_password_resets_table', 1),
(179, '2017_07_10_100410_create_users_table', 1),
(180, '2017_07_10_112228_create_tipo_dependentes_table', 1),
(181, '2017_07_10_112734_create_dependentes_table', 1),
(182, '2017_07_10_131801_create_cargos_table', 1),
(183, '2017_07_10_131900_create_empresas_table', 1),
(184, '2017_07_10_131930_create_tipo_funcionarios_table', 1),
(185, '2017_07_10_132026_create_contratos_table', 1),
(186, '2017_07_10_150301_create_salarios_table', 1),
(187, '2017_07_10_151830_create_sindicatos_table', 1),
(188, '2017_07_10_152852_create_contribuicaos_table', 1),
(189, '2017_07_10_195758_create_equipamentos_table', 1),
(190, '2017_07_10_205348_create_ferias_table', 1),
(191, '2017_07_10_205742_create_faltas_table', 1),
(192, '2017_07_10_210432_create_atestados_table', 1),
(193, '2017_07_10_212141_create_advertencias_table', 1),
(194, '2017_07_10_212511_create_suspensaos_table', 1),
(195, '2017_07_16_174238_create_eletronicos_table', 1),
(196, '2017_07_17_110800_create_tipo_solicitacaos_table', 1),
(197, '2017_07_17_115821_create_solicitacaos_table', 1),
(198, '2017_07_25_231058_create_perfils_table', 1),
(199, '2017_07_25_231425_create_permissaos_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfils`
--

CREATE TABLE `perfils` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `perfils`
--

INSERT INTO `perfils` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrador com acesso a todas as funções do sistema', '2017-07-26 05:45:59', '2017-07-26 05:45:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_has_permissaos`
--

CREATE TABLE `perfil_has_permissaos` (
  `id` int(10) UNSIGNED NOT NULL,
  `Perfils_idPerfils` int(10) UNSIGNED NOT NULL,
  `Permissaos_idPermissaos` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissaos`
--

CREATE TABLE `permissaos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `salarios`
--

CREATE TABLE `salarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `salario` double(6,2) NOT NULL,
  `motivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Cargos_idCargos` int(10) UNSIGNED DEFAULT NULL,
  `CBO` int(11) DEFAULT NULL,
  `Contratos_idContratos` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sindicatos`
--

CREATE TABLE `sindicatos` (
  `id` int(10) UNSIGNED NOT NULL,
  `Nome` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacaos`
--

CREATE TABLE `solicitacaos` (
  `id` int(10) UNSIGNED NOT NULL,
  `Users_idUsers` int(10) UNSIGNED DEFAULT NULL,
  `TipoSolicitacaos_idTipoSolicitacaos` int(10) UNSIGNED DEFAULT NULL,
  `status` enum('Pendente','Negado','Aprovado') COLLATE utf8mb4_unicode_ci NOT NULL,
  `resposta` longtext COLLATE utf8mb4_unicode_ci,
  `data_falta` date DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `data_retirada` date DEFAULT NULL,
  `detalhes` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `suspensaos`
--

CREATE TABLE `suspensaos` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `quantidade_dias` int(11) NOT NULL,
  `motivo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contratos_idContratos` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_dependentes`
--

CREATE TABLE `tipo_dependentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tipo_dependentes`
--

INSERT INTO `tipo_dependentes` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Conjugê', '2017-07-26 05:45:58', '2017-07-26 05:45:58'),
(2, 'Filho(a)', '2017-07-26 05:45:58', '2017-07-26 05:45:58'),
(3, 'Afilhado(a)', '2017-07-26 05:45:58', '2017-07-26 05:45:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_funcionarios`
--

CREATE TABLE `tipo_funcionarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tipo_funcionarios`
--

INSERT INTO `tipo_funcionarios` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Contratado', '2017-07-26 05:45:58', '2017-07-26 05:45:58'),
(2, 'Freelancer', '2017-07-26 05:45:58', '2017-07-26 05:45:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_solicitacaos`
--

CREATE TABLE `tipo_solicitacaos` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tipo_solicitacaos`
--

INSERT INTO `tipo_solicitacaos` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Justificativa Falta', '2017-07-26 05:45:58', '2017-07-26 05:45:58'),
(2, 'Adiantamento R$', '2017-07-26 05:45:58', '2017-07-26 05:45:58'),
(3, 'Uniforme', '2017-07-26 05:45:58', '2017-07-26 05:45:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ufs`
--

CREATE TABLE `ufs` (
  `id` int(10) UNSIGNED NOT NULL,
  `Abreviatura` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nome` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ufs`
--

INSERT INTO `ufs` (`id`, `Abreviatura`, `Nome`, `created_at`, `updated_at`) VALUES
(1, ' ', ' ', '2017-07-26 05:45:58', '2017-07-26 05:45:58'),
(2, 'DF', 'Distrito Federal', '2017-07-26 05:45:58', '2017-07-26 05:45:58'),
(3, 'GO', 'Goiânia', '2017-07-26 05:45:58', '2017-07-26 05:45:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EstadoCivils_idEstadoCivils` int(10) UNSIGNED DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `genero` enum('M','F') COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CPF` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RG` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Emissor` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PIS` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo_zona` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo_secao` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CTPS` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CTPS_serie` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CTPS_uf` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CTPS_emissao` date DEFAULT NULL,
  `CNH` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CNH_categoria` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CNH_validade` date DEFAULT NULL,
  `nome_pai` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome_mae` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Enderecos_idEnderecos` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `EstadoCivils_idEstadoCivils`, `data_nascimento`, `genero`, `phone`, `mobile`, `CPF`, `RG`, `Emissor`, `PIS`, `titulo`, `titulo_zona`, `titulo_secao`, `CTPS`, `CTPS_serie`, `CTPS_uf`, `CTPS_emissao`, `CNH`, `CNH_categoria`, `CNH_validade`, `nome_pai`, `nome_mae`, `Enderecos_idEnderecos`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@bratech.com', '$2y$10$0/002afNhLWNZqOH3WgsR.dnbg1zQlPY4h3TTk9cJL3jl59kA53om', 'Administrador', NULL, NULL, NULL, 'M', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-07-26 05:45:59', '2017-07-26 05:45:59', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_has_perfils`
--

CREATE TABLE `user_has_perfils` (
  `id` int(10) UNSIGNED NOT NULL,
  `Users_idUsers` int(10) UNSIGNED NOT NULL,
  `Perfils_idPerfils` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `user_has_perfils`
--

INSERT INTO `user_has_perfils` (`id`, `Users_idUsers`, `Perfils_idPerfils`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-07-26 05:45:59', '2017-07-26 05:45:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertencias`
--
ALTER TABLE `advertencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertencias_contratos_idcontratos_foreign` (`Contratos_idContratos`);

--
-- Indexes for table `atestados`
--
ALTER TABLE `atestados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `atestados_contratos_idcontratos_foreign` (`Contratos_idContratos`);

--
-- Indexes for table `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contratos_empresas_idempresas_foreign` (`Empresas_idEmpresas`),
  ADD KEY `contratos_tipofuncionarios_idtipofuncionarios_foreign` (`TipoFuncionarios_idTipoFuncionarios`),
  ADD KEY `contratos_users_idusers_foreign` (`Users_idUsers`);

--
-- Indexes for table `contribuicaos`
--
ALTER TABLE `contribuicaos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contribuicaos_sindicatos_idsindicatos_foreign` (`Sindicatos_idSindicatos`),
  ADD KEY `contribuicaos_contratos_idcontratos_foreign` (`Contratos_idContratos`);

--
-- Indexes for table `dependentes`
--
ALTER TABLE `dependentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dependentes_tipodependentes_idtipodependentes_foreign` (`TipoDependentes_idTipoDependentes`),
  ADD KEY `dependentes_users_idusers_foreign` (`Users_idUsers`);

--
-- Indexes for table `eletronicos`
--
ALTER TABLE `eletronicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eletronicos_users_idusers_foreign` (`Users_idUsers`);

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresas_ufs_idufs_foreign` (`UFs_idUFs`);

--
-- Indexes for table `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enderecos_ufs_idufs_foreign` (`UFs_idUFs`);

--
-- Indexes for table `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipamentos_users_idusers_foreign` (`Users_idUsers`);

--
-- Indexes for table `estado_civils`
--
ALTER TABLE `estado_civils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faltas`
--
ALTER TABLE `faltas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faltas_contratos_idcontratos_foreign` (`Contratos_idContratos`);

--
-- Indexes for table `ferias`
--
ALTER TABLE `ferias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ferias_contratos_idcontratos_foreign` (`Contratos_idContratos`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `perfils`
--
ALTER TABLE `perfils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perfil_has_permissaos`
--
ALTER TABLE `perfil_has_permissaos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perfil_has_permissaos_perfils_idperfils_foreign` (`Perfils_idPerfils`),
  ADD KEY `perfil_has_permissaos_permissaos_idpermissaos_foreign` (`Permissaos_idPermissaos`);

--
-- Indexes for table `permissaos`
--
ALTER TABLE `permissaos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salarios`
--
ALTER TABLE `salarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salarios_cargos_idcargos_foreign` (`Cargos_idCargos`),
  ADD KEY `salarios_contratos_idcontratos_foreign` (`Contratos_idContratos`);

--
-- Indexes for table `sindicatos`
--
ALTER TABLE `sindicatos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solicitacaos`
--
ALTER TABLE `solicitacaos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solicitacaos_users_idusers_foreign` (`Users_idUsers`),
  ADD KEY `solicitacaos_tiposolicitacaos_idtiposolicitacaos_foreign` (`TipoSolicitacaos_idTipoSolicitacaos`);

--
-- Indexes for table `suspensaos`
--
ALTER TABLE `suspensaos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suspensaos_contratos_idcontratos_foreign` (`Contratos_idContratos`);

--
-- Indexes for table `tipo_dependentes`
--
ALTER TABLE `tipo_dependentes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_funcionarios`
--
ALTER TABLE `tipo_funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_solicitacaos`
--
ALTER TABLE `tipo_solicitacaos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ufs`
--
ALTER TABLE `ufs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_estadocivils_idestadocivils_foreign` (`EstadoCivils_idEstadoCivils`),
  ADD KEY `users_enderecos_idenderecos_foreign` (`Enderecos_idEnderecos`);

--
-- Indexes for table `user_has_perfils`
--
ALTER TABLE `user_has_perfils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_has_perfils_users_idusers_foreign` (`Users_idUsers`),
  ADD KEY `user_has_perfils_perfils_idperfils_foreign` (`Perfils_idPerfils`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertencias`
--
ALTER TABLE `advertencias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `atestados`
--
ALTER TABLE `atestados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contratos`
--
ALTER TABLE `contratos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contribuicaos`
--
ALTER TABLE `contribuicaos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dependentes`
--
ALTER TABLE `dependentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eletronicos`
--
ALTER TABLE `eletronicos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `equipamentos`
--
ALTER TABLE `equipamentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `estado_civils`
--
ALTER TABLE `estado_civils`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `faltas`
--
ALTER TABLE `faltas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ferias`
--
ALTER TABLE `ferias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;
--
-- AUTO_INCREMENT for table `perfils`
--
ALTER TABLE `perfils`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `perfil_has_permissaos`
--
ALTER TABLE `perfil_has_permissaos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissaos`
--
ALTER TABLE `permissaos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salarios`
--
ALTER TABLE `salarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sindicatos`
--
ALTER TABLE `sindicatos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `solicitacaos`
--
ALTER TABLE `solicitacaos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suspensaos`
--
ALTER TABLE `suspensaos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipo_dependentes`
--
ALTER TABLE `tipo_dependentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tipo_funcionarios`
--
ALTER TABLE `tipo_funcionarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tipo_solicitacaos`
--
ALTER TABLE `tipo_solicitacaos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ufs`
--
ALTER TABLE `ufs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_has_perfils`
--
ALTER TABLE `user_has_perfils`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `advertencias`
--
ALTER TABLE `advertencias`
  ADD CONSTRAINT `advertencias_contratos_idcontratos_foreign` FOREIGN KEY (`Contratos_idContratos`) REFERENCES `contratos` (`id`);

--
-- Limitadores para a tabela `atestados`
--
ALTER TABLE `atestados`
  ADD CONSTRAINT `atestados_contratos_idcontratos_foreign` FOREIGN KEY (`Contratos_idContratos`) REFERENCES `contratos` (`id`);

--
-- Limitadores para a tabela `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `contratos_empresas_idempresas_foreign` FOREIGN KEY (`Empresas_idEmpresas`) REFERENCES `empresas` (`id`),
  ADD CONSTRAINT `contratos_tipofuncionarios_idtipofuncionarios_foreign` FOREIGN KEY (`TipoFuncionarios_idTipoFuncionarios`) REFERENCES `tipo_funcionarios` (`id`),
  ADD CONSTRAINT `contratos_users_idusers_foreign` FOREIGN KEY (`Users_idUsers`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `contribuicaos`
--
ALTER TABLE `contribuicaos`
  ADD CONSTRAINT `contribuicaos_contratos_idcontratos_foreign` FOREIGN KEY (`Contratos_idContratos`) REFERENCES `contratos` (`id`),
  ADD CONSTRAINT `contribuicaos_sindicatos_idsindicatos_foreign` FOREIGN KEY (`Sindicatos_idSindicatos`) REFERENCES `sindicatos` (`id`);

--
-- Limitadores para a tabela `dependentes`
--
ALTER TABLE `dependentes`
  ADD CONSTRAINT `dependentes_tipodependentes_idtipodependentes_foreign` FOREIGN KEY (`TipoDependentes_idTipoDependentes`) REFERENCES `tipo_dependentes` (`id`),
  ADD CONSTRAINT `dependentes_users_idusers_foreign` FOREIGN KEY (`Users_idUsers`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `eletronicos`
--
ALTER TABLE `eletronicos`
  ADD CONSTRAINT `eletronicos_users_idusers_foreign` FOREIGN KEY (`Users_idUsers`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `empresas_ufs_idufs_foreign` FOREIGN KEY (`UFs_idUFs`) REFERENCES `ufs` (`id`);

--
-- Limitadores para a tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `enderecos_ufs_idufs_foreign` FOREIGN KEY (`UFs_idUFs`) REFERENCES `ufs` (`id`);

--
-- Limitadores para a tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD CONSTRAINT `equipamentos_users_idusers_foreign` FOREIGN KEY (`Users_idUsers`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `faltas`
--
ALTER TABLE `faltas`
  ADD CONSTRAINT `faltas_contratos_idcontratos_foreign` FOREIGN KEY (`Contratos_idContratos`) REFERENCES `contratos` (`id`);

--
-- Limitadores para a tabela `ferias`
--
ALTER TABLE `ferias`
  ADD CONSTRAINT `ferias_contratos_idcontratos_foreign` FOREIGN KEY (`Contratos_idContratos`) REFERENCES `contratos` (`id`);

--
-- Limitadores para a tabela `perfil_has_permissaos`
--
ALTER TABLE `perfil_has_permissaos`
  ADD CONSTRAINT `perfil_has_permissaos_perfils_idperfils_foreign` FOREIGN KEY (`Perfils_idPerfils`) REFERENCES `perfils` (`id`),
  ADD CONSTRAINT `perfil_has_permissaos_permissaos_idpermissaos_foreign` FOREIGN KEY (`Permissaos_idPermissaos`) REFERENCES `permissaos` (`id`);

--
-- Limitadores para a tabela `salarios`
--
ALTER TABLE `salarios`
  ADD CONSTRAINT `salarios_cargos_idcargos_foreign` FOREIGN KEY (`Cargos_idCargos`) REFERENCES `cargos` (`id`),
  ADD CONSTRAINT `salarios_contratos_idcontratos_foreign` FOREIGN KEY (`Contratos_idContratos`) REFERENCES `contratos` (`id`);

--
-- Limitadores para a tabela `solicitacaos`
--
ALTER TABLE `solicitacaos`
  ADD CONSTRAINT `solicitacaos_tiposolicitacaos_idtiposolicitacaos_foreign` FOREIGN KEY (`TipoSolicitacaos_idTipoSolicitacaos`) REFERENCES `tipo_solicitacaos` (`id`),
  ADD CONSTRAINT `solicitacaos_users_idusers_foreign` FOREIGN KEY (`Users_idUsers`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `suspensaos`
--
ALTER TABLE `suspensaos`
  ADD CONSTRAINT `suspensaos_contratos_idcontratos_foreign` FOREIGN KEY (`Contratos_idContratos`) REFERENCES `contratos` (`id`);

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_enderecos_idenderecos_foreign` FOREIGN KEY (`Enderecos_idEnderecos`) REFERENCES `enderecos` (`id`),
  ADD CONSTRAINT `users_estadocivils_idestadocivils_foreign` FOREIGN KEY (`EstadoCivils_idEstadoCivils`) REFERENCES `estado_civils` (`id`);

--
-- Limitadores para a tabela `user_has_perfils`
--
ALTER TABLE `user_has_perfils`
  ADD CONSTRAINT `user_has_perfils_perfils_idperfils_foreign` FOREIGN KEY (`Perfils_idPerfils`) REFERENCES `perfils` (`id`),
  ADD CONSTRAINT `user_has_perfils_users_idusers_foreign` FOREIGN KEY (`Users_idUsers`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
